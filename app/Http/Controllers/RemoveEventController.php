<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RemoveEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Event $event, Participant $participants)
    {
        DB::table('events')->where('id', $event->id)->delete();
        $event->remove();
        $participants->remove();
    }
}
