<?php

namespace App\Http\Controllers\User;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file_resume' =>'required'
        ]);
        if (request()->hasFile('file_resume')) {
            $file = $request->file('file_resume');
            $filename = $file->getClientOriginalName();
            request()->file('file_resume')->storeAs('files/tmp/', $filename, 'public');
            return back()->with('success', 'File uploaded successfully.');
        }
        return back()->with('success', 'File uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function tmpUpload(Request $request)
    {
        if (request()->hasFile('file_resume')) {
            $file = $request->file('file_resume');
            $filename = $file->getClientOriginalName();
            request()->file('file_resume')->storeAs('files/tmp/', $filename, 'public');
            File::create([
                'user_id' => Auth::user()->id,
                'file_resume' => $filename
            ]);
            return $filename;
        }
        return '';
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
