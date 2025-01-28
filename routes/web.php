<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeopleController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('pages.home');
})->name("home");

Route::get('/news', function () {
    return view('pages.news');
})->name("news");

Route::get('/people', function () {
    return view('pages.people');
})->name("people");

Route::get('/research', function () {
    return view('pages.research');
})->name("research");

// Guest Only Routes
Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('register', 'viewRegister')->name("register");
        Route::post('register', 'store')->name("store");
        Route::get('login', 'viewLogin')->name("login");
        Route::post('login', 'authenticate')->name("authenticate");
    });
});

// Admin Only Routes
Route::middleware('auth', 'admin')->group(function () {
    // General Routes
    Route::controller(AuthController::class)->group(function () {
        Route::get('/admin/wizard', 'viewWizard')->name("wizard");
        Route::post('logout', 'logout')->name("logout");
    });
    // Controller Routes: People
    Route::controller(PeopleController::class)->group(function () {
        Route::get('admin/people/add', 'viewAdd')->name("people.viewAdd");
        Route::post('admin/people/add', 'add')->name("people.add");
    });
});
