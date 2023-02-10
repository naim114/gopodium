<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('main.index');
    }

    public function tournament()
    {
        return view('main.tournament.index');
    }

    public function tournament_schedule()
    {
        return view('main.tournament.schedule');
    }

    public function tournament_result()
    {
        return view('main.tournament.result');
    }

    public function tournament_standing()
    {
        return view('main.tournament.standing');
    }

    public function tournament_team()
    {
        return view('main.tournament.team');
    }

    public function tournament_athlete()
    {
        return view('main.tournament.athlete');
    }

    public function tournament_event()
    {
        return view('main.tournament.event');
    }

    public function tournament_event_result()
    {
        return view('main.tournament.event_result');
    }

    public function help_faq()
    {
        return view('main.help.faq');
    }

    public function help_manual()
    {
        return view('main.help.manual');
    }

    public function contact()
    {
        return view('main.contact');
    }
}