<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
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
        // dd($title);
        return view('user.job',compact('title','location','comp_name','status','salary','type','sd','ed','date'));
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
