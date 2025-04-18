<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function viewAdd()
    {
        return view('publications.add');
    }
    public function add(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'year' => 'required|date|max:255',
            'doi' => 'required|url|max:255',
            'iris' => 'required|url|max:255',
            'author' => 'required|array|max:5|min:1',
            'journal.*' => 'required|string|max:255',
        ], [
            'title.required' => 'Publication Title is required.',
            'type.required' => 'Publication Type is required.',
            'year.required' => 'Publication Year is required.',
            'doi.required' => 'Publication DOI URL is required.',
            'iris.required' => 'Publication IRIS URL is required.',
            'author.required' => 'Atleast 1 Author is required.',
            'author.min' => 'Atleast 1 Author is required.',
            'journal.*.required' => 'This Journal Information is required.',
        ]);
        // $project = Project::create([
        //     'image' => $validatedData['image'] ?? null,
        //     'title' => $request->title,
        //     'website' => $request->website,
        //     'card' => $request->card,
        //     'start_date' => $request->start_date,
        //     'end_date' => $request->end_date,
        //     'description' => $request->project_description,
        //     'reference_number' => $request->reference_number,
        //     'grant_currency' => $request->grant_currency,
        //     'grant_amount' => $request->grant_amount,
        // ]);
        dd($request->all());
    }
}
