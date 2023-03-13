<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use Illuminate\Support\Carbon;

class CreateEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //

        $this->validate($request, [
            'title' => 'required|string|min:3',
            'start_date' => 'required|date|after:yesterday',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required|integer',
        ]);



        $event = new Event();
        $event->user_id = Auth::id('user_id');
        $event->title = $request->input('title');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
        $event->location_id = $request->input('location');
        $event->save();

        return back();
    }
}
