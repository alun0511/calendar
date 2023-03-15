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

    public function __invoke(Invitation $invite, Request $request, $id)
    {
        // Handles updates of existing invites so that users can accept or decline

        // Saves all invites made to user_id of $id
        $invite = $invite::find($id);

        // Conditional update for corresponding submit buttons of the form in invitations.blade.php
        // $invite->updated will return true in both instances to see if the question of accept/decline has been answered or not
        // $invite->accepted shows what the answer was.

        if ($request->input('accept')) {
            $invite->event_id = $invite->event_id;
            $invite->user_id = $invite->user_id;
            $invite->accepted = true;
            $invite->updated = true;
            $invite->save();
        } elseif ($request->input('decline')) {
            $invite->event_id = $invite->event_id;
            $invite->user_id = $invite->user_id;
            $invite->accepted = false;
            $invite->updated = true;
            $invite->save();
        }
        return redirect()->intended('dashboard');
    }
}
