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
        // $request->validate([
        //     'file-resume' => 'required|file',
        // ]);
        $files = File::create([
            'user_id' => Auth::user()->id,
        ]);
        if (request()->hasFile('file-resume')) {
            $filename = request()->file->getClientOriginalName();
            request()->file->storeAs('files', $filename, 'public');
            $files->store(['file-resume' => $filename]);
        }
        return back()->with('success', 'File uploaded successfully.');
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
