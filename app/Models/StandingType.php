<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandingType extends Model
{
    use HasFactory;

    protected $table = 'standing_types';

    protected $fillable = [
        'name',
        'description',
    ];

    public function tournament()
    {
        return $this->hasMany(Tournament::class);
    }
}