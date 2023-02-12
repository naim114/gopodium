<?php

namespace App\Http\Controllers;

use App\Models\StandingType;
use App\Models\Tournament;
use App\Models\TournamentType;
use Illuminate\Http\Request;
use App\Providers\UserActivityEvent;
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
    public function team()
    {
        return view('tournament.team.index');
    }

    public function team_manage()
    {
        return view('tournament.team.manage.index');
    }

    public function team_athlete()
    {
        return view('tournament.team.athlete.index');
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
    public function event()
    {
        return view('tournament.event.index');
    }

    public function event_manage()
    {
        return view('tournament.event.participant.manage');
    }

    public function event_settings()
    {
        return view('tournament.event.settings.index');
    }

    public function event_add()
    {
    }

    public function event_delete()
    {
    }

    // schedule
    public function schedule()
    {
        return view('tournament.schedule.index');
    }

    // result
    public function result()
    {
        return view('tournament.result.index');
    }

    public function result_event()
    {
        return view('tournament.result.event');
    }

    // standing
    public function standing()
    {
        return view('tournament.standing.index');
    }
}