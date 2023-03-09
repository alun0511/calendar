<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $events = Event::all();
        $locations = Location::all();

        return view('dashboard', [
            'user' => $user,
            'events' => $events,
            'locations' => $locations,
        ]);
    }
}
