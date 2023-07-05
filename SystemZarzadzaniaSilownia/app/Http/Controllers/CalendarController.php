<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $events = Events::all(); // get all events
        return view('sites/exerciseCalendar',compact('events'));
    }
    // Create 0r Update event in database
    public function manageEvents(Request $request)
    {
        $id = $request->get('id','');
        if($id) { // if id exist in request object than need to update events
            $events = Events::find($id);
        } else { // if id doesn't exist than create new event
            $events = new Events();
        }
        $events->title = $request->get('title');
        $events->start = $request->get('start');
        $events->end = $request->get('end');
        $events->save();
        return response()->json(array('success' => true), 200);
    }
    // Create 0r Update event in database
    public function deleteEvents(Request $request,$id)
    {
        Events::find($id)->delete();
        return response()->json(array('success' => true), 200);
    }
}
