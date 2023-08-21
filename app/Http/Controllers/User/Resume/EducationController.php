<?php

namespace App\Http\Controllers\User\Resume;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::where('user_id', Auth::user()->id)->get();
        return view('user.review_educ', compact('educations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'level_of_education' => 'required|string|max:50',
            'field_of_study' => 'required||string|max:50',
            'school_name' => 'required||string|max:50',
            'start_month' => 'required',
            'start_year' => 'required',
            'end_month' => 'required',
            'end_year' => 'required',
        ]);
        $education = Education::create([
            'user_id' => Auth::user()->id,
            'level_of_education' => $request->input('level_of_education'),
            'field_of_study' => $request->input('field_of_study'),
            'school_name' => $request->input('school_name'),
            'start_month' => $request->input('start_month'),
            'start_year' => $request->input('start_year'),
            'end_month' => $request->input('end_month'),
            'end_year' => $request->input('end_year'),
        ]);
        return redirect()->route('review.education');
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
