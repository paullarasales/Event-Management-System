<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    
        if (!$event) {
            return redirect()->route('judge.loginForm')->with('error', 'You are not associated with the event');
        }
    
        $criterias = $event->criteria;
        $contestants = $event->contestants;
    
        return view('judge.dashboard', compact('event', 'criterias', 'contestants'));
    }

    public function submitGrades(Request $request, Contestant $contestant) {
        $judge = Auth::guard('judge')->user();
        $event = $judge->event;
    
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
    
        // Debugging
        $grades = Grade::where('contestant_id', $contestant->id)->pluck('grade')->toArray();
        Log::info('Grades:', $grades);
    
        
        $grades = array_filter($grades, function ($grade) {
            return $grade !== null && $grade > 0;
        });
    
        // Debugging
        Log::info('Filtered Grades:', $grades);
    
        $averageGrade = count($grades) > 0 ? array_sum($grades) / count($grades) : 0;
    
        // Debugging
        Log::info('Calculated Average: ' . $averageGrade);
    
        $contestant->update([
            'calculated_average' => $averageGrade,
        ]);
    
        // Debugging
        $updatedContestant = Contestant::find($contestant->id);
        Log::info('Updated Contestant:', $updatedContestant->toArray());
    
        return redirect()->back()->with('success', 'Grades submitted successfully');
    }

    public function logout() {
        Auth::guard('judge')->logout();
        return redirect()->route('judge.loginForm');
    }

    
}
