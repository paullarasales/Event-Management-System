<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Criteria;
use App\Models\Contestant;
use App\Models\Grade;

class JudgeDashboardController extends Controller
{
    public function showLoginForm() {
        return view('auth.judge');
    }

    public function judgeLogin(Request $request) {

        $credentials = $request->only('username', 'password');
    
        if (Auth::guard('judge')->attempt($credentials)) {
            return redirect()->intended(route('judge.dashboard'));
        }

        return redirect()->route('judge.loginForm')->with('error', 'Invalid username or password');
    }

    public function dashboard() {
        $judge = Auth::guard('judge')->user();
    
        $event = $judge->event;
    
        // Check if $event is not null
        if (!$event) {
            return redirect()->route('judge.loginForm')->with('error', 'You are not associated with the event');
        }
    
        $criterias = $event->criteria; // Use property, not method
        $contestants = $event->contestants; // Use property, not method
    
        return view('judge.dashboard', compact('event', 'criterias', 'contestants'));
    }

    public function submitGrades(Request $request, Contestant $contestant)
    {
        $request->validate([
            'grades.*' => 'required|numeric|min:0|max:10',
        ]);

        $judge = Auth::guard('judge')->user();
        $event = $judge->event;

        // Create a new grade record for each criteria
        foreach ($event->criteria as $criteria) {
            $grade = new Grade([
                'judge_id' => $judge->id,
                'contestant_id' => $contestant->id,
                'event_id' => $event->id,
                'criteria_id' => $criteria->id,
                'grade' => $request->input("grades.{$criteria->id}"),
            ]);

            $grade->save();
        }

        return redirect()->back()->with('success', 'Grades submitted successfully');
    }
    
}
