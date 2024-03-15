<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function create()
    {
        return view("auth.register");
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|username|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('frontend.home')->with('success', 'Registration successful. Please login.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function admin()
    {
        return view('frontend.admin');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|username',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check user's role after successful login
            $user = Auth::user();
            if ($user->role == 'admin') {
                // Redirect admins to admin route
                return redirect()->route('backend.master');
            } else {
                // Redirect other users to home route
                return redirect()->intended('/home');
            }
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }
    public function master()
    {
        return view('backend.master');
    }

    public function update(Request $request,$user)
    {
        $user = User::find($user);
        $user->update($request->all());
        return redirect()->route('frontend.dashboard')->with('success','Updated Successfully');

    }
    public function dashboard()
    {

        $users = User::all();
        return view('frontend.dashboard', compact('users'));

    }


}
