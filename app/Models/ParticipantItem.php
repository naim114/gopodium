<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParticipantItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'participant_items';

    protected $fillable = [
        'participant_id',
        'athlete_id',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }
}