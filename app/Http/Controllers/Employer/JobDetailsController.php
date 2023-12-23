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
        $applicant = Applicant::with('user.file_resume')->where('job_id', $id)->get();
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
    public function destroy(string $id)
    {
        //
    }
}
