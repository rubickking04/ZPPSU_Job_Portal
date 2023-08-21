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
        return redirect()->route('review.education')->with('success', 'Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $educations = Education::find($id);
        foreach ( $educations as $education) {
            $id = $educations->id;
            $level_of_educ = $educations->level_of_education;
            $fos = $educations->field_of_study;
            $school =  $educations->school_name;
            $sm = $educations->start_month;
            $sy = $educations->start_year;
            $em = $educations->end_month;
            $ey = $educations->end_year;
        }
        return view('user.edit_educ', compact('level_of_educ', 'fos','school','sm','sy','em','ey','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
        $education = Education::find($id);
        $education->level_of_education = $request->input('level_of_education');
        $education->field_of_study = $request->input('field_of_study');
        $education->school_name = $request->input('school_name');
        $education->start_month = $request->input('start_month');
        $education->start_year = $request->input('start_year');
        $education->end_month = $request->input('end_month');
        $education->end_year = $request->input('end_year');
        $education->save();
        return redirect()->route('review.education')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = Education::find($id)->delete();
        return back()->with('success', 'Deleted successfully.');
    }
}
