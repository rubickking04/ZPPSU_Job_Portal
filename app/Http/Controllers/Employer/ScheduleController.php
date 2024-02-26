<?php

namespace App\Http\Controllers\Employer;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Mail\Employer\ScheduleMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_time' => 'required'
        ]);
        $schedule = Schedule::create([
            'employer_id' => Auth::user()->id,
            'user_id' => $request->input('user_id'),
            'date_time'=> $request->input('date_time'),
        ]);
        $mail = Mail::to($schedule->user->email)->send(new ScheduleMail($schedule));
        Alert::toast('Scheduled successfully', 'success');
        return back()->with('msg', 'Scheduled successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
