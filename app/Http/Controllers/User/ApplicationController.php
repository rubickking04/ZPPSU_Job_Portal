<?php

namespace App\Http\Controllers\User;

use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Database\Query\Builder;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applicant = Applicant::withTrashed()->where('user_id','=', Auth::user()->id)->latest()->paginate(10);
        return view('user.history', compact('applicant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd("applied successfully");
        $applicant = Applicant::create([
            'user_id'=> Auth::user()->id,
            'employer_id' => $request->input('employer_id'),
            'job_id' => $request->input('job_id'),
        ]);
        return back()->with('success', 'Application submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Search the specified resource.
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $applicant = Applicant::orWhereHas('jobs', function (Builder $query) use ($search)
        {
            $query->where('job_title','LIKE','%'.$search.'%');
        })->paginate(10);
        if (count($applicant) > 0) {
            return view('user.history', compact('applicant'))->with('success', 'Search result for "' . $search . '"');
        } else {
            return view('user.history', compact('applicant'))->with('msg', 'We couldn\'t find "' . $search . '" on this page.');
        }
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
