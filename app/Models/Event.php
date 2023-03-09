<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Location;

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
        'accepted' => false,
    ];

    public $timestamps = false;

    public function location(): HasOne
    {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }
}
