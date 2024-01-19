<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::latest()->paginate(10);
        return view('admin.user', compact('user'));
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
        $user = User::where('name', 'LIKE', '%' . $search . '%')->orWhere('email', 'LIKE', '%' . $search . '%')->paginate(10);
        if (count($user) > 0) {
            return view('admin.user', compact('user'))->with('success', 'Search result for "' . $search . '"');
        } else {
            return redirect()->route('admin.users')->with('message', 'We couldn\'t find "' . $search . '" on this page.');
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
