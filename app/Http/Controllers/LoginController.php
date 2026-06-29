<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showForm()
    {
        if (session()->has('user_id')){
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password'=> 'required',
        ], [
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email.',
            'password.required'=> 'Password is required.',
    
        ]);

        $user = DB::table('users')->where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) 
            {
                session([
                    'user_id' => $user->id,
                    'username'=> $user->name,
                    'email'=> $user->email,
                ]);
                return redirect('/dashboard');
            }
            return back()->with('error', 'Invalid email or password.')->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login')->with('success', 'You have been logged out.');
    }
}
