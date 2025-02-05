<?php

namespace App\Http\Controllers;

use App\Models\SocialMediaLink;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }
    public function news()
    {
        return view('pages.news');
    }
    public function people()
    {
        $users = User::all();
        $users = $users->sortByDesc('is_admin');
        $socialLinks = SocialMediaLink::all();
        return view('pages.people', compact("users", "socialLinks"));
    }
    public function projects()
    {
        return view('pages.research.projects');
    }
    public function publications()
    {
        return view('pages.research.publications');
    }
    public function topics()
    {
        return view('pages.research.topics');
    }
    public function teaching()
    {
        return view('pages.teaching.teaching_home');
    }
    public function abc()
    {
        return view('pages.teaching.course');
    }
    public function viewWizard()
    {
        return view('pages.wizard');
    }
    public function viewContent()
    {
        return view('pages.content');
    }
}
