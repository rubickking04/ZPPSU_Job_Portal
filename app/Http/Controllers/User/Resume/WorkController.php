<?php

namespace App\Http\Controllers\User\Resume;

use App\Models\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.work');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string|max:50',
            'company_name' => 'required||string|max:50',
            'location' => 'required||string|max:50',
            'start_month' => 'required',
            'start_year' => 'required',
            'end_month' => 'required',
            'end_year' => 'required',
        ]);
        $work = Work::create([
            'user_id' => Auth::user()->id,
            'job_title' => $request->input('job_title'),
            'company_name' => $request->input('company_name'),
            'location' => $request->input('location'),
            'start_month' => $request->input('start_month'),
            'start_year' => $request->input('start_year'),
            'end_month' => $request->input('end_month'),
            'end_year' => $request->input('end_year'),
        ]);
        return redirect()->route('review.work')->with('success', 'Added successfully.');
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
