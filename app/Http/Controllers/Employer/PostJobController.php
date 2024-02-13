<?php

namespace App\Http\Controllers\Employer;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PostJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employer.jobs.post_job');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string|max:50',
            'job_location' => 'required|string|max:50',
            'job_type' => 'required|string|max:50',
            'job_salary' => 'required|string|max:50',
            'job_status' => 'required|string|max:50',
            'job_description' => 'required|string',
            'job_vacancy' => 'required|string',
            'job_end_date' => 'required|string|max:50',
        ]);
        $post_job = Job::create([
            'user_id' => Auth::guard('employer')->user()->id,
            'job_title' => $request->job_title,
            'job_location' => $request->job_location,
            'job_type' => $request->job_type,
            'job_salary' => $request->job_salary,
            'job_status' => $request->job_status,
            'job_description' => $request->job_description,
            'job_vacancy' => $request->job_vacancy,
            'job_end_date' => $request->job_end_date,
        ]);
        // dd($post_job);
        Alert::toast('Job created successfully' ,'success');
        return redirect()->route('employer.jobs');
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
