<?php

namespace App\Http\Controllers\User;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $file = File::where('user_id', Auth::user()->id)->get();
        if ($file->count() >0) {
            $work = Work::where('user_id', Auth::user()->id)->get();
            $educ = Education::where('user_id', Auth::user()->id)->get();
            $skill = Skill::where('user_id', Auth::user()->id)->get();
            foreach ($file as $files ) {
                $resume = $files->file_resume;
                $date = $files->created_at;
            }
            return view('user.profile', compact('file', 'work', 'educ', 'skill','resume','date'));
        }
        $work = Work::where('user_id', Auth::user()->id)->get();
        $educ = Education::where('user_id', Auth::user()->id)->get();
        $skill = Skill::where('user_id', Auth::user()->id)->get();
        // dd($resume);
        return view('user.profile', compact('file', 'work', 'educ', 'skill'));
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
