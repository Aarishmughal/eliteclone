<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

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
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'username' => 'required|string|alpha_num|unique:users,username|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'gender' => 'required|in:male,female',
            'phone' => 'required|numeric|digits_between:10,15',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ], [
            'fname.required' => 'First name is required.',
            'lname.required' => 'Last name is required.',
            'username.required' => 'Username is required.',
            'email.required' => 'Email address is required.',
            'gender.required' => 'Gender is required.',
            'phone.required' => 'Phone number is required.',
            'password.required' => 'Password is required.',
            'password.confirmed' => 'Passwords do not match.',
        ]);
    }
}
