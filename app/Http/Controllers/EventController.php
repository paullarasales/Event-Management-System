<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Judge;
use App\Models\Contestant;
use App\Models\Criteria;

class EventController extends Controller
{
    public function index() {
    // Logic to fetch and display a list of events
    // For example:
        $events = Event::all();
        return view('committee.committee-panel', ['events' => $events]);
    }

    public function create(Request $request) {
        // dd($request->all());
        $event = new Event;
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->start_date = $request->input('start_date');
        $event->location = $request->input('location');
        $event->save();

        $judges = [];
        foreach ($request->input('username') as $index => $judgename) {
            $judge = new Judge([
                'username' => $judgename,
                'password' => $request->input("password.$index"),
            ]);
            $judges[] = $judge;
            $event->judges()->save($judge);
        }

        foreach ($request->input("criteria") as $index => $criteria) {
            $criteriaModel = new Criteria([
                'event_id' => $event->id,
                'criteria' => $criteria,
                'points' => $request->input("points.$index"),
            ]);
            $judge->criteria()->save($criteriaModel);
        }

        
        // Save Contestants
        $contestants = [];
        foreach ($request->input('fullname') as $contestantname) {
            $contestants[] = new Contestant([
                'fullname' => $contestantname,
            ]);
        }
        $event->contestants()->saveMany($contestants);

        return redirect()->route('committee.event');
    }

    public function destroy($eventId)
{
    $event = Event::find($eventId);

    if ($event) {
        $event->delete();
        return redirect()->route('committee.committee-panel')->with('success', 'Event Deleted Successfully');
    } else {
        return redirect()->route('committee.committee-panel')->with('error', 'Event Not Found');
    }
}


    public function show($event) {
        $event = Event::findOrFail($event);
        return view('events.show', compact('event'));
    }
    
}