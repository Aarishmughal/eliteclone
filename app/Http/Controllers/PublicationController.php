<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Journal;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index()
    {
        return view('publications.index');
    }
    public function viewAdd()
    {
        return view('publications.add');
    }
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'year' => 'required|date|max:255',
            'doi' => 'required|url|max:255',
            'iris' => 'required|url|max:255',
            'authors' => 'required|array|max:5|min:1',
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
        if ($validatedData) {
            $publication = Publication::create([
                'title' => $request->title,
                'type' => $request->type,
                'year' => $request->year,
                'doi' => $request->doi,
                'iris' => $request->iris,
            ]);
            if ($publication) {
                foreach ($request->authors as $author) {
                    $author = Author::create([
                        'first_name' => $author['fname'],
                        'middle_name' => $author['mname'],
                        'last_name' => $author['lname'],
                        'publication_id' => $publication->id,
                    ]);
                }
                if ($author) {
                    $journal = Journal::create([
                        'name' => $request->journal['name'],
                        'edition' => $request->journal['edition'],
                        'volume' => $request->journal['volume'],
                        'page_number' => $request->journal['page'],
                        'publication_id' => $publication->id,
                    ]);
                    if ($journal) {
                        return redirect()->route('home')->with('success', 'Publication added successfully.');
                    } else {
                        return redirect()->back()->with('error', 'Failed to add journal information.');
                    }
                } else {
                    return redirect()->back()->with('error', 'Failed to add author.');
                }
            } else {
                return redirect()->back()->with('error', 'Failed to add publication.');
            }
        } else {
            return redirect()->back()->with('error', 'Failed to add publication.');
        }
    }
}
