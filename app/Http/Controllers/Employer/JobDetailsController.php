<?php

namespace App\Http\Controllers\Employer;

use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Employer\ApproveMail;
use Illuminate\Support\Facades\Mail;

class JobDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $applicant = Applicant::with('user.file_resume','user.sched')->withTrashed()->where('job_id', $id)->paginate(10);
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
        $applicant = Applicant::find($id);
        if ($applicant){
            $applicant->jobs->decrement('job_vacancy');
            $mail = Mail::to($applicant->user->email)->send(new ApproveMail($applicant));
            $applicant->delete();
            return back()->with('success', 'Approved successfully.');
        }
    }
}
