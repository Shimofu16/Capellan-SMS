<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\General\GenerateUserSession;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function changePassword()
    {
        return view('SMS.backend.pages.profile.change-password.index');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|max:10',
            'confirm_password' => 'required|min:8|max:10|same:new_password',
        ]);
        if (Auth::user()) {
            if (password_verify($request->current_password, Auth::user()->password)) {
                Auth::user()->update([
                    'password' => Hash::make(
                        $request->new_password
                    )
                ]);
                GenerateUserSession::GenerateSession('Account Management','Change Password',Auth::user());
                return redirect()->back()->with('successToast', 'Password updated successfully.');
            } else {
                return redirect()->back()->with('infoAlert', 'The old password you entered does not match our records. Please try again with the correct old password.');
            }
        }
    }
}
