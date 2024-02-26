<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\Employee\WelcomeMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
        return view('user.auth.register');
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
            'email' => 'required|unique:users|email',
            'phone_number' => 'required|string|max:50',
            'id_number' => 'required|string|max:50',
            'address' => 'required|string|max:50',
            'password' => 'required|confirmed|min:8',
        ]);
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'id_number' => $request->input('id_number'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'password' => Hash::make($request->input('password')),
        ]);
        $mail = Mail::to($user['email'])->send(new WelcomeMail($user));
        Auth::login($user);
        // Alert::toast('Welcome, ' . Auth::user()->name, 'success');
        return redirect()->route('user.home');
    }
}
