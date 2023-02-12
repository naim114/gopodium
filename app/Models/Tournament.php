<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournament extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tournaments';

    protected $fillable = [
        'name',
        'code',
        'organizer',
        'logo_path',
        'athlete_individual_event_limit',
        'athlete_team_event_limit',
        'first_place_point',
        'second_place_point',
        'third_place_point',
        'fourth_place_point',
        'fifth_place_point',
        'sixth_place_point',
        'seventh_place_point',
        'eigth_place_point',
    ];

    protected $dates = [
        'start_at',
    ];
}
