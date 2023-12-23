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
        $jobs = Job::with('applicants')->where('user_id', Auth::user()->id)->get();
        // dd($jobs);
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
        $post_jobs = Job::find($id);
        $title = $post_jobs->job_title;
        $location = $post_jobs->job_location;
        $comp_name = $post_jobs->employer->company_name;
        $status = $post_jobs->job_status;
        $salary = $post_jobs->job_salary;
        $type = $post_jobs->job_type;
        $sd = $post_jobs->job_start_date;
        $ed = $post_jobs->job_end_date;
        $date = $post_jobs->created_at;
        $description = $post_jobs->job_description;
        return view('employer.jobs.job_details',compact('title','location','comp_name','status','salary','type','sd','ed','date','description'));
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
