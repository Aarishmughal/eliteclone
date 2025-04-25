<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Project;
use App\Models\WorkPackage;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index');
    }
    public function viewAdd()
    {
        return view('projects.add');
    }
    public function add(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            "image" => "nullable|image|mimes:png,jpg,jpeg,webp,svg|max:5120",
            'title' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'card' => 'nullable|url|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'description' => 'nullable|string',
            'reference_number' => 'nullable|string',
            'grant_currency' => 'nullable|string',
            'grant_amount' => 'nullable|numeric',
        ], [
            'title.required' => 'Project title is required',
            'end_date.after' => 'End date must be after start date',
            'grant_amount.float' => 'Grant amount must be a number',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/projects', 'public');
            $validatedData['image'] = $imagePath;
        }
        $project = Project::create([
            'image' => $validatedData['image'] ?? null,
            'title' => $request->title,
            'website' => $request->website,
            'card' => $request->card,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->project_description,
            'reference_number' => $request->reference_number,
            'grant_currency' => $request->grant_currency,
            'grant_amount' => $request->grant_amount,
        ]);
        if ($project) {
            $validatedData = $request->validate([
                'workPackages' => 'nullable|array|max:5',
                'workPackages.*.name' => 'string|max:255',

                'partners' => 'nullable|array|max:5',
                'partners.*.name' => 'string|max:255',
                'partners.*.website' => 'string|max:255',
                'partners.*.country_code' => 'string|max:255',
                'partners.*.type' => 'string|max:255',
                'partners.*.is_associated' => 'boolean|max:255',
            ], [
                'workPackages.max' => 'Total Work Packages Limit Exceeded.',
                'partners.max' => 'Total Partners Limit Exceeded.',
            ]);
            if ($validatedData) {
                $workPackages = $validatedData['workPackages'];
                $index = 1;
                foreach ($workPackages as $workPackage) {
                    WorkPackage::create([
                        'project_id' => $project->id,
                        'name' => $workPackage['name'],
                        // 'number' => $index,
                    ]);
                    $index++;
                }
                $partners = $validatedData['partners'];
                foreach ($partners as $partner) {
                    Partner::create([
                        'project_id' => $project->id,
                        'name' => $partner['name'],
                        'website' => $partner['website'],
                        'country' => $partner['country_code'],
                        'country_code' => $partner['country_code'],
                        'type' => $partner['type'],
                        'is_associated' => $partner['is_associated'],
                    ]);
                }
            }
            return redirect()->route('home')->with('success', 'Project added successfully.');
        } else {
            return back()->with('error', 'Failed to Add Project.');
        }
    }
}