<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id',
        'accepted',
        'updated',
    ];

    public $timestamps = false;


    public function invited(): BelongsTo
    {
        // returns the invited user of this invitation
        return $this->belongsTo(User::class, 'user_id');
    }

    public function event(): BelongsTo
    {
        // returns the event of this invitation
        return $this->belongsTo(Event::class, 'id', 'event_id');
    }
}
