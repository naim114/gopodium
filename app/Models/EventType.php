<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'event_types';

    protected $fillable = [
        'name',
        'description',
        'type',
    ];

    public function event()
    {
        return $this->hasMany(Event::class);
    }
}