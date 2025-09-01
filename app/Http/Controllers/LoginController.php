<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Dummy authentication logic for demonstration purposes
        if ($credentials['username'] === 'admin' && $credentials['password'] === 'password') {
            // Authentication passed, redirect to patient list
            return redirect()->route('patients.index');
        } else {
            // Authentication failed, redirect back with error
            return redirect()->back()->withErrors(['Invalid credentials'])->withInput();
        }
    }
}
