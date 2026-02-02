<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
        public function loginForm(){
            return view("login");
        }

   public function login(Request $request)
{
    // Validate form input
    $credentials = $request->validate([
        "email"=> "required|email",
        "password" => 'required',
    ]);

    // Hardcoded test account
    $testEmail = 'student@example.com';
    $testPassword = 'password';

    // Check if input matches the test account exactly
    if ($credentials['email'] === $testEmail && $credentials['password'] === $testPassword) {

        // Make sure the test user exists in database
        $user = \App\Models\User::firstOrCreate(
            ['email' => $testEmail],
            [
                'name' => 'Test Student',
                'password' => Hash::make($testPassword),
            ]
        );

        // Log in the user
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('students.index')
                         ->with('success', 'Logged in as Test Account!');
    }

    // If not matching, return error
    return back()->withErrors(['email' => 'Login failed. Please use the test account credentials.']);
}


    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
