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




    public function inviter(): BelongsTo
    {
        $inviter = Event::join('users', 'users.id', '=', 'events.user_id')->get();
        return $this->belongsTo(User::class, 'event_id');
    }

    public function invited(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'id', 'event_id');
    }
}
