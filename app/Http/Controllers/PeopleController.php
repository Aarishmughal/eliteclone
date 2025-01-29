<?php

namespace App\Http\Controllers;

use App\Models\SocialMediaLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PeopleController extends Controller
{
    public function index()
    {
        $users = User::all();
        $socialLinks = SocialMediaLink::all();
        return view("people.index", compact("users", "socialLinks"));
    }
    public function viewAdd()
    {
        return view("people.add");
    }
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            "image" => "nullable|image|mimes:png,jpg,jpeg,webp,svg|max:5120",
            'fname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'gender' => 'required|in:male,female',
            'phone' => 'required|numeric|digits_between:10,15',
        ], [
            'image.image' => 'Image must be a valid image.',
            'image.mimes' => 'Image must be a valid image.',
            'image.max' => 'Image size must be less than 5MB.',
            'fname.required' => 'First name is required.',
            'mname.required' => 'Middle name is required.',
            'lname.required' => 'Last name is required.',
            'email.required' => 'Email address is required.',
            'email.unique' => 'Email address already exists.',
            'gender.required' => 'Gender is required.',
            'phone.required' => 'Phone number is required.',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }
        $user = User::create([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'image' => $validatedData['image'] ?? null,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => "+92" . (substr($request->phone, 0, 1) == "0" ? substr($request->phone, 1) : $request->phone),
            'bio' => $request->bio,
            'is_admin' => false
        ]);
        if ($user) {
            $validatedData = $request->validate([
                'socialMedia' => 'nullable|array|max:5',
                'socialMedia.*.platform' => 'required_with:socialMedia.*.link|string|in:Facebook,LinkedIn,Twitter,Instagram,YouTube,Other',
                'socialMedia.*.link' => 'nullable|url',
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
            return redirect()->route('home')->with('success', 'Person added successfully.');
        } else {
            return back()->with('error', 'Failed to Add Person.');
        }
    }
}
