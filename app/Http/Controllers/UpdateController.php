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

        $invitations = Invitation::all();

        $invite = $invite::find($id);

        $event_id = $invitations->where('id', $invite->id)->value('event_id');
        $user_id = $invitations->where('id', $invite->id)->value('user_id');


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
