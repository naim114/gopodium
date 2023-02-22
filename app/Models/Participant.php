<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'participants';

    protected $fillable = [
        'score',
        'note',
        'event_id',
        'athlete_id',
        'team_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function item()
    {
        return $this->hasMany(ParticipantItem::class);
    }
}