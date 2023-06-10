<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('SMS.frontend.auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {


            Auth::user()->status = "online";
            Auth::user()->save();
            /* save last_activity into session */
            $request->session()->regenerate();
            $request->session()->put(Auth::id() . '_last_activity', now());
            return redirect()->intended(route('admin.dashboard.index'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::user()->status = "offline";
        Auth::user()->save();
        $request->session()->put(Auth::id() . '_last_activity', now());
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.index');
    }

}
