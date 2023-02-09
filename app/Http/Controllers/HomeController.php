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

    public function help()
    {
        return view('main.help');
    }

    public function contact()
    {
        return view('main.contact');
    }
}