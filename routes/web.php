<?php

use Illuminate\Support\Facades\Route;

Route::controller(App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('login', 'viewLogin')->name("login");
    Route::post('login', 'login')->name("login");
    Route::get('register', 'viewRegister')->name("register");
    Route::post('register', 'register')->name("register");
});

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
