<?php

namespace App\Http\Controllers\Employer;

use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $applicant = Applicant::with('user.file_resume')->withTrashed()->where('job_id', $id)->paginate(10);
        // dd($applicant);
        return view('employer.jobs.job_details', compact('applicant'));
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
    public function soft_destroy(string $id)
    {
        $applicant = Applicant::find($id)->delete();
        return back()->with('success', 'Approved successfully.');
    }
}
