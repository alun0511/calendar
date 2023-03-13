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


        return view('invitations', [
            'user' => $user,
            'events' => $events,
            'invitations' => $invitations,
        ]);
    }
    public function showReceivedEvents()
    {
        // Get the logged-in user
        $user = auth()->user();

        // Get the user's received invitations
        $receivedInvitations = $user->receivedInvitations;

        // Get the associated events for the received invitations
        $receivedEvents = $receivedInvitations->map(function ($invitation) {
            return $invitation->event;
        });

        // Pass the received events to the view
        return view('received-events', [
            'events' => $receivedEvents
        ]);
    }
}
