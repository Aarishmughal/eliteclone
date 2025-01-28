<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function viewAdd()
    {
        return view("people.add");
    }
}
