<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Models\Location;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function invitedUsers(): BelongsToMany
    {
        // returns the users that are invited to this event
        return $this->belongsToMany(User::class, 'invitations', 'event_id', 'user_id');
    }

    public function location(): HasOne
    {
        // returns the location of this event
        return $this->hasOne(Location::class, 'id', 'location_id');
    }

    public function invitations(): HasMany
    {
        // returns all invitations made for this event
        return $this->HasMany(Invitation::class, 'event_id');
    }

    public function creator(): BelongsTo
    {
        // returns the creator of the event
        return $this->belongsTo(User::class, 'user_id');
    }
}
