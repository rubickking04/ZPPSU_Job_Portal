<?php

namespace App\Http\Controllers\Employer;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::where('user_id', Auth::user()->id)->get();
        return view('employer.jobs.job', compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $request->validate([
            'job_title' => 'required|string|max:50',
            'job_location' => 'required|string|max:50',
            'job_type' => 'required|string|max:50',
            'job_salary' => 'required|string|max:50',
            'job_status' => 'required|string|max:50',
            'job_description' => 'required|string|max:1000',
            'job_start_date' => 'required|string|max:50',
            'job_end_date' => 'required|string|max:50',
        ]);
        $jobs = Job::find($id);
        $jobs->job_title = $request->input('job_title');
        $jobs->job_location = $request->input('job_location');
        $jobs->job_type = $request->input('job_type');
        $jobs->job_salary = $request->input('job_salary');
        $jobs->job_status = $request->input('job_status');
        $jobs->job_description = $request->input('job_description');
        $jobs->job_start_date = $request->input('job_start_date');
        $jobs->job_end_date = $request->input('job_end_date');
        $jobs->save();
        return back()->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jobs = Job::find($id)->delete();
        return back()->with('success', 'Deleted successfully.');
    }
}
