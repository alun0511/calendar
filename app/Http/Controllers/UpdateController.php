<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;
use App\Models\Event;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function __invoke(Invitation $invite, Request $request, Event $event)
    {

        $events = Event::all();

        $invitations = Invitation::all();

        // $event_id = $events->where('id', $invite->event_id)->value('id');
        // $invitations->where('id', $invite->id)->value('event_id');

        $event_id = Invitation::find();
        $user_id = $invitations->where('id', $invite->id)->value('user_id');



        if ($request->input('accept')) {
            $invite->event_id = $event_id;
            $invite->user_id = $user_id;
            $invite->accepted = true;
            $invite->updated = true;
            $invite->save();
        } elseif ($request->input('decline')) {
            $invite->event_id = $event_id;
            $invite->user_id = $user_id;
            $invite->accepted = false;
            $invite->updated = true;
            $invite->save();
        }
        return redirect()->intended('dashboard');
    }
}
