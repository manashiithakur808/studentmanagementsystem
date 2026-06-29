<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showForm()
    {
        if (session()->has('user_id')){
            return redirect('/dashboard');
        }
        return view('auth.register');
    }
    public function register(Request $request)
    {

        $request->validate([
            'username' => 'required|min:3|max:50|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'username.required' => 'Username is required.',
            'username.uniques'  => 'This username is already taken.',
            'email.required'    => 'Email address is required.',
            'email.email'       => 'Please enter a valid email.',
            'email.unique'      => 'This email is already registered.',
            'password.required' => 'Password is required.',
            'password.min'      => 'Password must be at least 6 chasracters.',
            'password.confirmed'=> 'Passwords do not match.',
    ]);
    DB::table('users')->insert([
        'name' => $request->username,
        'email'=> $request->email,
        'password'=> Hash::make($request->password),
        'created_at'=> now(),
        'updated_at'=> now(),
    ]);
    return redirect('/login')->with('success', 'Account created! Please login.');
    }
}
