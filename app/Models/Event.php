<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Location;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator_id',
        'title',
        'start_date',
        'end_date',
        'location_id',
    ];

    public $timestamps = false;

    public function invitations(): HasMany
    {
        return $this->hasMany(Invitation::class);
    }

    public function invitedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'invitations', 'event_id', 'user_id');
    }

    public function location(): HasOne
    {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }
}
