<?php

namespace App\Http\Controllers\User;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post_jobs = Job::latest()->get();
        return view('user.home', compact('post_jobs'));
    }

    /**
     * Display the specified resource.
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $post_jobs = Job::where('job_title', 'LIKE', '%' . $search . '%')->orWhere('job_location', 'LIKE', '%' . $search . '%')->paginate(10);
        if (count($post_jobs) > 0) {
            return view('user.home', compact('post_jobs'))->with('success', 'Search result for "' . $search . '"');
        } else {
            return redirect()->route('user.home')->with('msg', 'We couldn\'t find "' . $search . '" on this page.');
        }
    }
}
