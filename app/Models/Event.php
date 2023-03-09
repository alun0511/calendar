<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator_id',
        'title',
        'start_date',
        'end_date',
        'location_id',
        'accepted',
    ];

    protected $attributes = [
        'location_id' => 1,
        'accepted' => false,
    ];

    public $timestamps = false;
}
