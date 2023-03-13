<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Invite;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $users = User::All();
        $events = Event::all();
        $locations = Location::all();
        $invitations = Invite::all();

        return view('dashboard', [
            'user' => $user,
            'users' => $users,
            'events' => $events,
            'locations' => $locations,
            'invites' => $invitations
        ]);
    }
}
