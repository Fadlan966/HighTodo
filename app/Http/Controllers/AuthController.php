<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view("auth.login");
    }

    public function loginProses(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ],
        [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
        ]);

        $data = array(
            'email' => $request->email,
            'password' => $request->password,
        );

        if(Auth::attempt($data)) {
            return redirect()->route('dashboard')->with('success', 'Login successful');
        } else {
            return redirect()->back()->with('error','Login failed, please check your email and password');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have successfully logged out');
    }
}
