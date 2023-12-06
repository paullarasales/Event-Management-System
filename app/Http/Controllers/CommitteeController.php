<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Judge;
use App\Models\Contestant;
use App\Models\Event;
use App\Models\User;

class CommitteeController extends Controller
{
    public function cancel() {
        return redirect()->route('admin.committee');
    }

    public function showEvent() {

        return view('committee.committee-event');
    }

    public function createEvent() {
        $judges = Judge::all();
        $contestants = Contestant::all();
        $events = Event::all();

        return view('committee.committee-event', compact(['judges', 'contestants', 'events']));
    }

}
