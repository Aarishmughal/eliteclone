<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\ResearchTopic;
use Illuminate\Http\Request;

class ResearchTopicController extends Controller
{
    public function viewAdd()
    {
        $publications = Publication::all();
        return view('researchTopics.add', compact('publications'));
    }
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'researchTopic_description' => 'required|string',
            'publication_id' => 'exists:publications,id',
        ], [
            'title.required' => 'Research Topic is required.',
            'title.string' => 'Research Topic is invalid.',
            'title.max' => 'Research Topic is invalid.',
            'researchTopic_description.required' => 'Description is required.',
            'publication_id.exists' => 'Selected publication is invalid.',
        ]);
        if ($validatedData) {
            $researchTopic = ResearchTopic::create([
                'title' => $validatedData['title'],
                'description' => $validatedData['researchTopic_description'],
                'publication_id' => $validatedData['publication_id'],
            ]);
        }
    }
}
