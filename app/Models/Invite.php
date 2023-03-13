<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invite extends Model
{
    use HasFactory;

    protected $table = 'invitations';

    public $timestamps = false;

    protected $fillable = [
        'event_id',
        'user_id'
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
