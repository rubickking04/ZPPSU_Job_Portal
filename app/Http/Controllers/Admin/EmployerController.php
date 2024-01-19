<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employer = Employer::latest()->paginate(10);
        return view('admin.employer', compact('employer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Search the specified resource.
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $employer = Employer::where('name', 'LIKE', '%' . $search . '%')->orWhere('email', 'LIKE', '%' . $search . '%')->orWhere('company_name', 'LIKE', '%' . $search . '%')->paginate(10);
        if (count($employer) > 0) {
            return view('admin.employer', compact('employer'))->with('success', 'Search result for "' . $search . '"');
        } else {
            return redirect()->route('admin.employers')->with('message', 'We couldn\'t find "' . $search . '" on this page.');
        }
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
