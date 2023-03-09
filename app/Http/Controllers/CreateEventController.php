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
            'location_id' => 'required|integer',
        ]);



        $task = new Event();
        $task->user_id = Auth::id('user_id');
        $task->title = $request->input('title');
        $task->start_date = $request->input('start_date');
        $task->end_date = $request->input('end_date');
        $task->location_id = $request->input('location_id');
        $task->accepted = false;
        $task->save();

        return back();
    }
}
