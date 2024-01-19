<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->paginate(10);
        return view('admin.job', compact('jobs'));
    }

    /**
     * Search the specified resource.
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $jobs = Job::where('job_title', 'LIKE', '%' . $search . '%')->orWhere('job_type', 'LIKE', '%' . $search . '%')->orWhere('job_status', 'LIKE', '%' . $search . '%')->orWhere('job_salary', 'LIKE', '%' . $search . '%')->paginate(10);
        if (count($jobs) > 0) {
            return view('admin.job', compact('jobs'))->with('success', 'Search result for "' . $search . '"');
        } else {
            return redirect()->route('admin.jobs')->with('message', 'We couldn\'t find "' . $search . '" on this page.');
        }
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
