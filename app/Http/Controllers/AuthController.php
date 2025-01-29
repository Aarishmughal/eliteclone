<?php

namespace App\Http\Controllers;

use App\Models\SocialMediaLink;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'viewWizard',
        ]);
        $this->middleware('auth')->only([
            'logout',
            'viewWizard',
        ]);
    }
    public function viewLogin()
    {
        return view("auth.login");
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:250',
            'password' => 'required',
        ], [
            'email.required' => 'Email address is required.',
            'email.email' => 'Email Address is Invalid.',
            "email.max" => "Email Address is Invalid.",
            'password.required' => 'Password is required.',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with("success", "You have successfully logged in!");
        } else {
            return back()->with(
                "error",
                "Your provided credentials do not match in our records."
            )->onlyInput('email');
        }
    }
    public function viewRegister()
    {
        return view("auth.register");
    }
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'gender' => 'required|in:male,female',
            'phone' => 'required|numeric|digits_between:10,15',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ], [
            'fname.required' => 'First name is required.',
            'mname.required' => 'Middle name is required.',
            'lname.required' => 'Last name is required.',
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
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => "+92" . (substr($request->phone, 0, 1) == "0" ? substr($request->phone, 1) : $request->phone),
            'password' => Hash::make($request->password),
            'bio' => $request->bio,
        ]);
        if ($user) {
            $validatedData = $request->validate([
                'socialMedia' => 'nullable|array|max:5',
                'socialMedia.*.platform' => 'required_with:socialMedia.*.link|string|in:Facebook,LinkedIn,Twitter,Instagram,YouTube,Other',
                'socialMedia.*.link' => 'nullable',
            ], [
                'socialMedia.max' => 'Total Social Media Links Limit Exceeded.',
                'socialMedia.*.platform.in' => 'Invalid Platform Chosen.'
            ]);
            if ($validatedData) {
                $socialMediaLinks = $validatedData['socialMedia'];
                $new_admin = User::where('email', $request->email)->first();
                foreach ($socialMediaLinks as $socialMedia) {
                    SocialMediaLink::create([
                        'user_id' => $new_admin->id,
                        'platform_name' => $socialMedia['platform'],
                        'account_link' => $socialMedia['link'],
                        'account_link' => (substr($socialMedia['link'], 0, 8) == "https://" ? $socialMedia['link'] : "https://" . $socialMedia['link']),
                    ]);
                }
            }
            $credentials = $request->only("email", "password");
            Auth::attempt($credentials);
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Administrator added successfully.');
        } else {
            return back()->with('error', 'Failed to create administrator account.');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("home")->withSuccess("You have successfully logged out!");
    }
}