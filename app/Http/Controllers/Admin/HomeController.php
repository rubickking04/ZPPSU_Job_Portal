<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\User;
use App\Models\Employer;
use App\Models\Applicant;
use App\Charts\AdminChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::latest()->paginate(10);
        $chart = new AdminChart;
        $users = User::all()->count();
        $employers = Employer::all()->count();
        $jobs = Job::all()->count();
        $applicants = Applicant::onlyTrashed()->count();
        $chart->labels(['Employees', 'Employer', 'Jobs', 'Applicants',]);
        $chart->dataset('My stores Data', 'doughnut', [$users, $employers, $jobs, $applicants])
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
        // dd($user);
        return view('admin.home', compact('user', 'chart'));
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
