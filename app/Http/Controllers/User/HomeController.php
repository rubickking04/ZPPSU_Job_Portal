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
}
