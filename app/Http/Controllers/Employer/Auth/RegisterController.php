<?php

namespace App\Http\Controllers\Employer\Auth;

use App\Models\Employer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employer.auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'company_name' => 'required|string|max:50',
            'email' => 'required|unique:employers|email',
            'password' => 'required|confirmed|min:8',
        ]);
        $user = Employer::create([
            'name' => $request->input('name'),
            'company_name' => $request->input('company_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        Auth::guard('employer')->login($user);
        Alert::toast('Welcome, ' . Auth::guard('employer')->user()->name, 'success');
        return redirect()->route('employer.home');
    }
}
