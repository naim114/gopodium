<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function manage()
    {
        return view('tournament.manage.index');
    }

    public function index()
    {
        return view('tournament.information.index');
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
