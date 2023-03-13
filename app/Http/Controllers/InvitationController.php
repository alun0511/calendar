<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Invitation;

class InvitationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        //
        $user = Auth::user();
        $events = Event::all();
        $invitations = Invitation::all();

        $received = Invitation::where('user_id', $user->id)->get();



        return view('/dashboard', [
            'user' => $user,
            'events' => $events,
            'invitations' => $invitations,
            'received' => $received,
        ]);
    }
}
