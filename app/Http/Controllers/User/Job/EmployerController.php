<?php

namespace App\Http\Controllers\User\Job;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.jobs.create_employer_account');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'company_name' => 'required|string|max:50',
            'number_of_employees' => 'required|string|max:50',
            'phone_number' => 'required|string',
        ]);
        $employee = Employee::create([
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'company_name' => $request->input('company_name'),
            'number_of_employees' => $request->input('number_of_employees'),
            'phone_number' => $request->input('phone_number'),
        ]);
        Alert::toast('Employee Account created Successfully','success');
        return redirect()->back();
        // dd($employee);
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
