<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Athlete extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'athletes';

    protected $fillable = [
        'name',
        'team_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function participant()
    {
        return $this->hasMany(Participant::class);
    }
}