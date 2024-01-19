<?php

namespace App\Http\Controllers\Employer;

use App\Charts\EmployerChart;
use App\Models\Job;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applicant = Applicant::with('user')->onlyTrashed()->latest()->paginate(10);
        $applicants = Applicant::where('employer_id', Auth::guard('employer')->user()->id)->withTrashed()->count();
        $jobs = Job::where('user_id', Auth::guard('employer')->user()->id)->count();
        $chart = new EmployerChart;
        $chart->labels(['Jobs', 'Applicants',]);
        $chart->dataset('My system Data', 'doughnut', [$jobs, $applicants])
            ->color(collect([
                'rgba(255, 99, 132)',
                'rgba(255, 159, 64)',
                'rgba(255, 205, 86)',
                'rgba(75, 192, 192)',]
            ))->backgroundColor(collect([
                'rgba(255, 99, 132)',
                'rgba(255, 159, 64)',
                'rgba(255, 205, 86)',
                'rgba(75, 192, 192)',]
            ));
        // dd($applicant);
        return view('employer.home', compact('applicant', 'chart'));
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
