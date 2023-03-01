<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Event;
use App\Models\EventType;
use App\Models\Participant;
use App\Models\ParticipantItem;
use App\Models\StandingType;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\TournamentType;
use Illuminate\Http\Request;
use App\Providers\UserActivityEvent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TournamentController extends Controller
{
    public function manage()
    {
        $tournaments = has_permission('tournament.all') ? Tournament::all() : Tournament::where('owner_id', Auth::user()->id)->get();

        $count = 1;

        foreach ($tournaments as $tourney) {
            $tourney->end_at = calculate_tournament_detail($tourney, 'end_at');
            $tourney->status = calculate_tournament_detail($tourney, 'status');
        }

        return view('tournament.manage.index', compact('tournaments', 'count'));
    }

    public function index(Request $request)
    {
        $tourney = Tournament::where('id', $request->id)->first();

        // get tournament type
        $type = TournamentType::where('id', $tourney->tournament_type_id)->first();

        // get standing type
        $standings = StandingType::all();

        $tourney->end_at = calculate_tournament_detail($tourney, 'end_at');
        $tourney->status = calculate_tournament_detail($tourney, 'status');
        $tourney->plan = get_plan_detail($tourney->plan_id, 'name');
        $tourney->duration = get_plan_detail($tourney->plan_id, 'duration');
        $tourney->type = $type->name;

        return view('tournament.information.index', compact('tourney', 'standings'));
    }

    public function detail(Request $request)
    {
        $tourney = Tournament::where('id', $request->id)->first();

        // check if code is unique
        $all = Tournament::where('id', '!=', $request->id)->get();

        foreach ($all as $tourney_check) {
            if ($tourney_check->code == $request->code) {
                return back()->with('error', 'Tournament Code already exist. Use another code.');
            }
        }

        Tournament::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'code' => $request->code,
                'organizer' => $request->organizer,
            ]);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Edit tournament detail ' . $tourney->name . ' (id: ' . $tourney->id . ')'));

        return back()->with(
            'success',
            'Tournament ' . $tourney->name . ' successfully edited!'
        );
    }

    public function rule(Request $request)
    {
        $tourney = Tournament::where('id', $request->id)->first();

        Tournament::where('id', $request->id)
            ->update([
                'athlete_individual_event_limit' => $request->athlete_individual_event_limit,
                'athlete_team_event_limit' => $request->athlete_team_event_limit,
                'standing_type_id' => $request->standing_type_id,
                'first_place_point' => $request->first_place_point,
                'second_place_point' => $request->second_place_point,
                'third_place_point' => $request->third_place_point,
                'fourth_place_point' => $request->fourth_place_point,
                'fifth_place_point' => $request->fifth_place_point,
                'sixth_place_point' => $request->sixth_place_point,
                'seventh_place_point' => $request->seventh_place_point,
                'eigth_place_point' => $request->eigth_place_point,
            ]);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Edit tournament rule ' . $tourney->name . ' (id: ' . $tourney->id . ')'));

        return back()->with(
            'success',
            'Tournament ' . $tourney->name . ' successfully edited!'
        );
    }

    public function logo(Request $request)
    {
        $tourney = Tournament::where('id', $request->id)->first();

        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // delete previous logo file (if exist)
        if (isset($tourney->logo_path)) {
            if (File::exists(public_path($tourney->logo_path))) {
                File::delete(public_path($tourney->logo_path));
            }
        }

        // creating name and path for the file
        // time() is current unix timestamp
        $fileName = time() . '_' . $request->file('logo')->getClientOriginalName();

        try {
            $request->logo->move(public_path('upload/tournament/' . $tourney->id . '/logo'), $fileName);

            // updating details in db
            Tournament::where('id', $request->id)
                ->update([
                    'logo_path' => 'upload/tournament/' . $tourney->id . '/logo' . '/' . $fileName,
                ]);
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Edit tournament logo ' . $tourney->name . ' (id: ' . $tourney->id . ')'));

        return back()->with('success', 'Logo successfully updated!');
    }

    /**
     * Team
     */
    public function team(Request $request)
    {
        $tourney = Tournament::find($request->tournament_id);
        $count = 1;

        return view('tournament.team.index', compact('tourney', 'count'));
    }

    public function team_manage(Request $request)
    {
        $tourney = Tournament::find($request->tournament_id);
        $team = Team::find($request->team_id);

        return view('tournament.team.manage.index', compact('tourney', 'team'));
    }

    public function team_add(Request $request)
    {
        $tourney = Tournament::find($request->tournament_id);

        $add = Team::create($request->all());

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Add team ' . $request->name . ' (id: ' . $add->id . ') to Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'));

        return back()->with('success', 'Team successfully added!');
    }

    public function team_detail(Request $request)
    {
        $team = Team::find($request->id);
        $tourney = Tournament::find($team->tournament_id);

        Team::where('id', $request->id)->update([
            'name' => $request->name,
            'category' => $request->category,
        ]);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Edit team detail ' . $request->name . ' (id: ' . $team->id . ') from Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'));

        return back()->with('success', 'Team successfully edited!');
    }

    public function team_logo(Request $request)
    {
        $team = Team::find($request->id);
        $tourney = Tournament::find($team->tournament_id);

        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // delete previous logo file (if exist)
        if (isset($team->logo_path)) {
            if (File::exists(public_path($team->logo_path))) {
                File::delete(public_path($team->logo_path));
            }
        }

        // creating name and path for the file
        // time() is current unix timestamp
        $fileName = time() . '_' . $request->file('logo')->getClientOriginalName();

        $request->logo->move(public_path('upload/tournament/' . $tourney->id . '/team' . '/' . $team->id . '/logo'), $fileName);

        // updating details in db
        Team::where('id', $request->id)
            ->update([
                'logo_path' => 'upload/tournament/' . $tourney->id . '/team' . '/' . $team->id . '/logo' . '/' . $fileName,
            ]);


        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Edit team logo ' . $request->name . ' (id: ' . $team->id . ') from Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'));

        return back()->with('success', 'Team logo successfully edited!');
    }

    public function team_delete(Request $request)
    {
        $team = Team::find($request->id);
        $tourney = Tournament::find($team->tournament_id);

        // delete logo file (if exist)
        if (isset($team->logo_path)) {
            if (File::exists(public_path($team->logo_path))) {
                File::delete(public_path($team->logo_path));
            }
        }

        // soft delete in db
        Team::where('id', $request->id)
            ->delete();

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Delete team ' . $request->name . ' (id: ' . $team->id . ') from Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'));

        return redirect()->route('tournament.team', ['tournament_id' => $tourney->id]);
    }

    public function team_athlete(Request $request)
    {
        $tourney = Tournament::find($request->tournament_id);
        $team = Team::find($request->team_id);
        $count = 1;

        return view('tournament.team.athlete.index', compact('tourney', 'team', 'count'));
    }

    public function team_athlete_add(Request $request)
    {
        $team = Team::find($request->team_id);
        $tourney = Tournament::find($team->tournament_id);

        $add = Athlete::create($request->all());

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Add athlete ' . $request->name . ' (id: ' . $add->id . ') to Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'));

        return back()->with('success', 'Athlete successfully added!');
    }

    public function team_athlete_edit(Request $request)
    {
        $athlete = Athlete::find($request->id);
        $team = Team::find($athlete->team_id);
        $tourney = Tournament::find($team->tournament_id);

        Athlete::where('id', $request->id)->update(['name' => $request->name]);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Add athlete ' . $request->name . ' (id: ' . $athlete->id . ') to Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'));

        return back()->with('success', 'Athlete ' . $request->name . ' successfully edited!');
    }

    public function team_athlete_delete(Request $request)
    {
        $athlete = Athlete::find($request->id);
        $team = Team::find($athlete->team_id);
        $tourney = Tournament::find($team->tournament_id);

        // soft delete in db
        Athlete::where('id', $request->id)
            ->delete();

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Delete athlete ' . $request->name . ' (id: ' . $athlete->id . ') to Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'));

        return back()->with('success', 'Athlete ' . $athlete->name . ' successfully delete!');
    }

    public function team_athlete_schedule_result()
    {
        return view('tournament.team.athlete.schedule_result');
    }

    public function team_event()
    {
        return view('tournament.team.event.index');
    }

    public function team_schedule()
    {
        return view('tournament.team.schedule.index');
    }

    public function team_result()
    {
        return view('tournament.team.result.index');
    }

    /**
     * Event
     */
    public function event(Request $request)
    {
        $tourney = Tournament::find($request->tournament_id);

        $upcoming = array();
        $ongoing = array();
        $finished = array();

        foreach ($tourney->event as $event) {
            $event->status = calculate_status($event);

            if ($event->status == 'upcoming') {
                array_push($upcoming, $event);
            } elseif ($event->status == 'ongoing') {
                array_push($ongoing, $event);
            } elseif ($event->status == 'finished') {
                array_push($finished, $event);
            }
        }

        $types = EventType::all();

        return view('tournament.event.index', compact('tourney', 'upcoming', 'ongoing', 'finished', 'types'));
    }

    public function event_add(Request $request)
    {
        $tourney = Tournament::find($request->tournament_id);

        $add = Event::create($request->all());

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Add Event ' . $request->name . ' (id: ' . $add->id . ') to Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'));

        return back()->with('success', 'Event successfully added!');
    }

    public function event_delete(Request $request)
    {
        $event = Event::find($request->id);
        $tourney = Tournament::find($event->tournament_id);

        // soft delete in db
        Event::where('id', $request->id)
            ->delete();

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Delete event ' . $event->name . ' (id: ' . $event->id . ') from Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'));

        return redirect()->route('tournament.event', ['tournament_id' => $tourney->id])->with('success', 'Event successfully deleted!');
    }

    public function event_edit(Request $request)
    {
        $event = Event::find($request->id);
        $tourney = Tournament::find($event->tournament_id);

        Event::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'code' => $request->code,
                'category' => $request->category,
                'round' => $request->round,
                'championship' => $request->championship,
                'athlete_per_team_limit' => $request->athlete_per_team_limit,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at,
            ]);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Edit Event ' . $event->name . ' (id: ' . $event->id . ') settings of Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'));

        return back()->with('success', 'Event successfully edited!');
    }

    public function event_manage(Request $request)
    {
        $tourney = Tournament::find($request->tournament_id);
        $event = Event::find($request->event_id);
        $participants = Participant::where('event_id', $event->id)->orderBy('score', 'desc')->orderBy('created_at', 'asc')->get();

        $event->status = calculate_status($event);

        return view('tournament.event.participant.manage', compact('tourney', 'event', 'participants'));
    }

    public function event_settings(Request $request)
    {
        $tourney = Tournament::find($request->tournament_id);
        $event = Event::find($request->event_id);
        $types = EventType::all();

        return view('tournament.event.settings.index', compact('tourney', 'event', 'types'));
    }

    public function participant_manage(Request $request)
    {
        if (isset($request->id)) {
            // update
            if (isset($request->athlete_id)) {
                // individual
                $participant = Participant::find($request->id);
                $event = Event::find($participant->event_id);
                $tourney = Tournament::find($event->tournament_id);

                Participant::where('id', $request->id)
                    ->update([
                        'score' => $request->score ?? null,
                        'note' => $request->note ?? null,
                        'athlete_id' => $request->athlete_id,
                        'position' => $request->position,
                    ]);

                // user activity log
                event(new UserActivityEvent(Auth::user(), $request, 'Edit participant athlete ' . $participant->athlete->name . ' (Score: ' . $request->score ?? null . ') of Event ' . $event->name . ' (id: ' . $event->id . ') of Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'));
            } else {
                // team
                $participant = Participant::find($request->id);
                $event = Event::find($participant->event_id);
                $tourney = Tournament::find($event->tournament_id);

                // if update team then delete participant item
                if ($participant->team_id != $request->team_id) {
                    ParticipantItem::where('participant_id', $request->id)->delete();
                }

                Participant::where('id', $request->id)
                    ->update([
                        'score' => $request->score ?? null,
                        'note' => $request->note ?? null,
                        'team_id' => $request->team_id,
                        'position' => $request->position,
                    ]);

                // user activity log
                event(new UserActivityEvent(Auth::user(), $request, 'Edit participant team ' . $participant->team->name . ' (Score: ' . $request->score ?? null . ') of Event ' . $event->name . ' (id: ' . $event->id . ') of Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'));
            }

            return back()->with('success', 'Participant successfully updated!');
        } else {
            // add
            $event = Event::find($request->event_id);
            $tourney = Tournament::find($request->tournament_id);

            Participant::create($request->all());

            if (isset($request->athlete_id)) {
                $athlete = Athlete::find($request->athlete_id);

                // user activity log
                event(new UserActivityEvent(Auth::user(), $request, 'Add participant athlete ' . $athlete->name . ' (id: ' . $athlete->id . ') of Event ' . $event->name . ' (id: ' . $event->id . ') to Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'));
            } else {
                $team = Team::find($request->team_id);

                // user activity log
                event(new UserActivityEvent(Auth::user(), $request, 'Add participant team ' . $team->name . ' (id: ' . $team->id . ') of Event ' . $event->name . ' (id: ' . $event->id . ') to Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'));
            }

            return back()->with('success', 'Participant successfully added!');
        }
    }

    public function participant_delete(Request $request)
    {
        $participant = Participant::find($request->id);
        $event = Event::find($participant->event_id);
        $tourney = Tournament::find($event->tournament_id);

        // delete participant item if exist
        if (isset($participant->team_id)) {
            ParticipantItem::where('participant_id', $request->id)->delete();
        }

        // soft delete in db
        Participant::where('id', $request->id)
            ->delete();

        if (isset($participant->team_id)) {
            // user activity log
            event(new UserActivityEvent(
                Auth::user(),
                $request,
                'Delete participant team' . $participant->team->name . ' (Score: ' . $participant->score ?? null . ') of Event ' . $event->name . ' (id: ' . $event->id . ') of Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'
            ));
        } else {
            // user activity log
            event(new UserActivityEvent(
                Auth::user(),
                $request,
                'Delete participant athlete' . $participant->athlete->name . ' (Score: ' . $participant->score ?? null . ') of Event ' . $event->name . ' (id: ' . $event->id . ') of Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'
            ));
        }

        return back()->with('success', 'Participant successfully deleted!');
    }

    public function participant_item_add(Request $request)
    {
        $participant = Participant::find($request->participant_id);
        $event = Event::find($participant->event_id);
        $tourney = Tournament::find($event->tournament_id);

        $participant_item = ParticipantItem::create($request->all());

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Add ' . $participant_item->athlete->name . ' to participant team ' . $participant->team->name . ' (Score: ' . $request->score ?? null . ') of Event ' . $event->name . ' (id: ' . $event->id . ') of Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'));

        return back()->with('success', 'Participant athlete successfully added!');
    }

    public function participant_item_delete(Request $request)
    {
        $participant_item = ParticipantItem::find($request->id);
        $participant = Participant::find($participant_item->participant_id);
        $event = Event::find($participant->event_id);
        $tourney = Tournament::find($event->tournament_id);

        // soft delete in db
        ParticipantItem::where('id', $request->id)
            ->delete();

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Delete ' . $participant_item->athlete->name . ' from participant team ' . $participant->team->name . ' (Score: ' . $request->score ?? null . ') of Event ' . $event->name . ' (id: ' . $event->id . ') of Tournament ' . $tourney->name . ' (id: ' . $tourney->id . ')'));

        return back()->with('success', 'Participant athlete successfully deleted!');
    }

    // schedule
    public function schedule(Request $request)
    {
        $tourney = Tournament::find($request->tournament_id);
        $events = Event::where('tournament_id', $request->tournament_id)->orderBy('created_at', 'desc')->get();

        return view('tournament.schedule.index', compact('tourney', 'events'));
    }

    // result
    public function result(Request $request)
    {
        $tourney = Tournament::find($request->tournament_id);
        $events = Event::where('tournament_id', $request->tournament_id)->orderBy('created_at', 'asc')->get();

        foreach ($events as $key =>  $event) {
            $event->status = calculate_status($event);

            if ($event->status != 'finished') {
                $events->forget($key);
            }
        }

        return view('tournament.result.index', compact('tourney', 'events'));
    }

    public function result_event(Request $request)
    {
        $tourney = Tournament::find($request->tournament_id);
        $event = Event::find($request->event_id);
        $action = true;
        $participants = Participant::where('event_id', $event->id)->orderBy('score', 'desc')->orderBy('created_at', 'asc')->get();

        return view('tournament.result.event', compact('tourney', 'event', 'action', 'participants'));
    }

    // standing
    public function standing(Request $request)
    {
        $tourney = Tournament::find($request->tournament_id);

        // TODO for heat count by event (index) & matchup count by participant (position attribute)
        // TODO @ heats event, add is championship event feature
        // TODO @ matchup event, add position feature
        return view('tournament.standing.index', compact('tourney'));
    }
}