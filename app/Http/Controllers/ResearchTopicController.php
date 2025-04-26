<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class ResearchTopicController extends Controller
{
    public function viewAdd()
    {
        $publications = Publication::all();
        return view('researchTopics.add', compact('publications'));
    }
}
