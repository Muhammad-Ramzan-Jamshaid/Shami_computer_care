<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // --- Admin Auth ---
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

        // Admin verification: check password and also check if it's the admin email seeded
        if ($user && $user->email === 'admin@shamipc.com' && Hash::check($request->password, $user->password)) {
            session(['admin_logged_in' => true, 'admin_user' => $user->name]);
            return redirect('/admin/dashboard')->with('success', 'Welcome back, Admin!');
        }

        return back()->with('error', 'Invalid admin email address or password. Please try again.')->withInput();
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_user']);
        return redirect('/admin/login')->with('success', 'Logged out successfully.');
    }

    // --- Regular User Auth ---
    public function showRegister()
    {
        if (session()->has('user_logged_in')) {
            return redirect('/');
        }
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        session([
            'user_logged_in' => true,
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email
        ]);

        return redirect('/')->with('success', 'Account registered successfully! Welcome to Shami Computer Care.');
    }

    public function showUserLogin()
    {
        if (session()->has('user_logged_in')) {
            return redirect('/');
        }
        return view('auth.login');
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'user_logged_in' => true,
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email
            ]);
            return redirect('/')->with('success', 'Logged in successfully! Welcome back.');
        }

        return back()->with('error', 'Invalid email or password. Please try again.')->withInput();
    }

    public function userLogout()
    {
        session()->forget(['user_logged_in', 'user_id', 'user_name', 'user_email']);
        return redirect('/')->with('success', 'Logged out successfully.');
    }

    public function userDashboard()
    {
        if (!session()->has('user_logged_in')) {
            return redirect('/login')->with('error', 'Please login to access your dashboard.');
        }
        return view('dashboard');
    }
}
