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
}