<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Judge;
use App\Models\Event;
use App\Models\Contestant;

class Admincontroller extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth()->user()->usertype;
            
            if ($usertype == 'committee') {
                $events = Event::all();

                return view('committee.committee-panel', ['events' => $events]);
            } else if ($usertype == 'admin') {
                $users = User::all();

                return view('admin.adminpanel', ['users' => $users]); // Pass user data to the view
            }
        }

        return redirect()->route('login');
    }

    public function create(Request $request) {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'position' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);


        User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'position' => $request->input('position'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('committee.create');
    }

    

    public function contestant() {
        return view('admin.contestant');
    }

    public function committee() {
        return view('admin.committee');
    }
    
    public function event() {
        return view('admin.event');
    }
}
