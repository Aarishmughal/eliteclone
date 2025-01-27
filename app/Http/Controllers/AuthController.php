<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
        ]);
    }
    public function viewLogin()
    {
        return view("auth.login");
    }
    public function viewRegister()
    {
        return view("auth.register");
    }
    public function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'username' => 'required|string|alpha_num|unique:users,username|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'gender' => 'required|in:male,female',
            'phone' => 'required|numeric|digits_between:10,15',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ], [
            'fname.required' => 'First name is required.',
            'mname.required' => 'Middle name is required.',
            'lname.required' => 'Last name is required.',
            'username.required' => 'Username is required.',
            'username.unique' => 'Username already exists.',
            'email.required' => 'Email address is required.',
            'email.unique' => 'Email address already exists.',
            'gender.required' => 'Gender is required.',
            'phone.required' => 'Phone number is required.',
            'password.required' => 'Password is required.',
            'password.confirmed' => 'Passwords do not match.',
        ]);
        $user = User::create([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'username' => $request->username,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => "+92" . (substr($request->phone, 0, 1) == "0" ? substr($request->phone, 1) : $request->phone),
            'password' => Hash::make($request->password),
            'bio' => $request->bio,
        ]);
        if ($user) {
            return redirect()->route('home')->with('success', 'Account created successfully.');
        } else {
            return back()->with('error', 'Failed to create account.');
        }
    }
}
