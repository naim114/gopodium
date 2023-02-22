<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'teams';

    protected $fillable = [
        'name',
        'category',
        'logo_path',
        'tournament_id',
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function athlete()
    {
        return $this->hasMany(Athlete::class);
    }

    public function participant()
    {
        return $this->hasMany(Participant::class);
    }
}