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
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}