<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'events';

    protected $fillable = [
        'name',
        'code',
        'category',
        'round',
        'athlete_per_team_limit',
        'event_type_id',
        'start_at',
        'end_at',
        'tournament_id',
    ];

    protected $dates = [
        'start_at',
        'end_at',
    ];


    public function event_type()
    {
        return $this->belongsTo(EventType::class);
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function participant()
    {
        return $this->hasMany(Participant::class);
    }
}