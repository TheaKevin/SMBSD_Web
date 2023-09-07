<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LoginController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'loginID' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'loginID' => 'The provided credentials do not match our records.',
        ])->onlyInput('loginID');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function GantiPassword(Request $request)
    {
        $request->validate([
            'Password_gantipassword' => 'required|min:8',
            'NewPassword' => 'required|min:8|confirmed',
            'NewPassword_confirmation' => 'required|min:8'
        ]);

        if (Hash::check($request->NewPassword, auth()->user()->password)) {
            return redirect()->back()->with('gantiPasswordError', 'Password baru anda sama dengan password lama!');
        } elseif (Hash::check($request->Password_gantipassword, auth()->user()->password)) {
            User::where('id', Auth::user()->id)->update(['password' => bcrypt($request->NewPassword)]);

            return redirect("/");
        } else {
            return redirect()->back()->with('gantiPasswordError', 'Password salah!');
        }
    }
}
