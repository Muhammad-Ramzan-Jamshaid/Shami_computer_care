<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session()->has('admin_logged_in')) {
            return redirect('/admin/dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['admin_logged_in' => true, 'admin_user' => $user->name]);
            return redirect('/admin/dashboard')->with('success', 'Welcome back, Admin!');
        }

        return back()->with('error', 'Invalid email address or password. Please try again.')->withInput();
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_user']);
        return redirect('/admin/login')->with('success', 'Logged out successfully.');
    }
}
