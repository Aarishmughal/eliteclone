<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Project;
use App\Models\Publication;
use App\Models\SocialMediaLink;
use App\Models\User;
use App\Models\WorkPackage;
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
        $projects = Project::all();
        $workPackages = WorkPackage::all();
        $partners = Partner::all();
        return view('pages.research.projects', compact("projects", "workPackages", "partners"));
    }
    public function projectFetch($id)
    {
        $project = Project::find($id);
        $workPackages = WorkPackage::where('project_id', $id)->get();
        $partners = Partner::where('project_id', $id)->get();
        return view('pages.research.projectFetch', compact("project", "workPackages", "partners"));
    }
    public function publications()
    {
        $publications = Publication::all();
        $publicationsByYear = $publications->sortByDesc('year');
        $publicationsByType = $publications->sortByDesc('type');
        return view('pages.research.publications', compact("publicationsByYear", "publicationsByType"));
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
