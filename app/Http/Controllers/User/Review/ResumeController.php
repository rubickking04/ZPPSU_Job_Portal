<?php

namespace App\Http\Controllers\User\Review;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Resume;
use App\Models\Skill;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::where('user_id', Auth::user()->id)->get();
        $works = Work::where('user_id', Auth::user()->id)->get();
        $skills = Skill::where('user_id', Auth::user()->id)->get();
        return view('user.review_resume', compact('educations', 'works', 'skills'));
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
