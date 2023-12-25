<?php

namespace App\Http\Controllers\User;

use App\Models\Work;
use App\Models\Skill;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DownloadResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Work::where('user_id', Auth::user()->id)->latest()->get();
        $skills = Skill::where('user_id', Auth::user()->id)->latest()->get();
        $educations = Education::where('user_id', Auth::user()->id)->latest()->get();
        view('resume',compact('works','skills','educations'));
        $pdf = PDF::loadView('resume',[
            'works' => $works,
            'skills' => $skills,
            'educations' => $educations,
        ]);
        return $pdf->download('My_Resume.pdf');
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
