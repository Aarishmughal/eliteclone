<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name("home");
Route::get("/news", function () {
    return view('pages.news');
})->name("news");
Route::get("/people", function () {
    return view('pages.people');
})->name("people");
Route::get("/research", function () {
    return view('pages.research');
})->name("research");
