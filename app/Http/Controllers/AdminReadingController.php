<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= User::where('role', 'user')->get();
        return view('admin.user.user', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.add_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData= $request->validate([
            'name'=> 'required|min:5|max:255',
            'username'=> ['required', 'min:5', 'max:255', 'unique:users'], // unique ditabel users
            'email'=> ['required', 'email:dns', 'unique:users'],
            'password'=> ['required', 'min:5', 'max:255'],
        ]);

        User::create($validatedData);
        return redirect()->back();
    }



    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
