<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Backend\General\GenerateUserSession;
use App\Http\Controllers\Controller;
use App\Models\User;
use Generator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('SMS.backend.pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'passwordCreate' => 'required|min:8',
                'password_confirmationCreate' => 'required|same:passwordCreate',
            ]);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => 2,
                'password' => Hash::make($request->input('passwordCreate')),
            ]);
            GenerateUserSession::GenerateSession('User Management','Added new user '.$request->name,auth()->user());
            return back()->with('successToast', 'Successfully added new user');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = User::findOrFail($id);
            return view('SMS.backend.pages.user.show', compact('user'));
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'passwordUpdate' => 'required|min:8',
            'password_confirmationUpdate' => 'required|same:passwordUpdate',
        ]);
        try {
            $user = User::findOrFail($id);
            $user->update([
                'password' => Hash::make($request->input('passwordUpdate')),
            ]);
            GenerateUserSession::GenerateSession('User Management','Updated user '.$user->name,auth()->user());
            return back()->with('successToast', 'Successfully updated user password');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update(['status' => 'offline']);
            GenerateUserSession::GenerateSession('User Management','Logged out user '.$user->name,auth()->user());
            return back()->with('successToast', 'Successfully logged out user');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
        }
    }
}
