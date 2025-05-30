<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ResearchTopicController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'index')->name("home");
    Route::get('/news', 'news')->name("news");
    Route::get('/people', 'people')->name("people");
    Route::get('/research/projects', 'projects')->name("projects");
    Route::get('/research/projects/{id}', 'projectFetch')->name("projects.fetch");
    Route::get('/research/publications', 'publications')->name("publications");
    Route::get('/research/topics', 'topics')->name("topics");
    Route::get('/teaching', 'teaching')->name("teaching");
    Route::get('/teaching/abc', 'abc')->name("abc");
});

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
        Route::post('logout', 'logout')->name("logout");
    });
    Route::controller(SiteController::class)->group(function () {
        Route::get('/admin/wizard', 'viewWizard')->name("wizard");
        Route::get('/admin/content', 'viewContent')->name("content");
    });

    // Controller Routes: People
    Route::controller(PeopleController::class)->group(function () {
        Route::get('admin/people', 'index')->name("people.index");
        Route::get('admin/people/add', 'viewAdd')->name("people.viewAdd");
        Route::post('admin/people/add', 'add')->name("people.add");
        Route::get('admin/people/edit/{id}', 'viewEdit')->name("people.viewEdit");
        Route::post('admin/people/edit/{id}', 'edit')->name("people.edit");
        Route::post('admin/people/delete/{id}', 'delete')->name("people.delete");
    });

    // Controller Routes: Project
    Route::controller(ProjectController::class)->group(function () {
        Route::get('admin/projects', 'index')->name("projects.index");
        Route::get('admin/projects/add', 'viewAdd')->name("projects.viewAdd");
        Route::post('admin/projects/add', 'add')->name("projects.add");
        Route::get('admin/projects/edit/{id}', 'viewEdit')->name("projects.viewEdit");
        Route::post('admin/projects/edit/{id}', 'edit')->name("projects.edit");
        Route::post('admin/projects/delete/{id}', 'delete')->name("projects.delete");
    });

    // Controller Routes: Publication
    Route::controller(PublicationController::class)->group(function () {
        Route::get('admin/publications', 'index')->name("publications.index");
        Route::get('admin/publications/add', 'viewAdd')->name("publications.viewAdd");
        Route::post('admin/publications/add', 'add')->name("publications.add");
        Route::get('admin/publications/edit/{id}', 'viewEdit')->name("publications.viewEdit");
        Route::post('admin/publications/edit/{id}', 'edit')->name("publications.edit");
        Route::post('admin/publications/delete/{id}', 'delete')->name("publications.delete");
    });
    // Controller Routes: Research Topic
    Route::controller(ResearchTopicController::class)->group(function () {
        Route::get('admin/researchTopics', 'index')->name("researchTopics.index");
        Route::get('admin/researchTopics/add', 'viewAdd')->name("researchTopics.viewAdd");
        Route::post('admin/researchTopics/add', 'add')->name("researchTopics.add");
        Route::get('admin/researchTopics/edit/{id}', 'viewEdit')->name("researchTopics.viewEdit");
        Route::post('admin/researchTopics/edit/{id}', 'edit')->name("researchTopics.edit");
        Route::post('admin/researchTopics/delete/{id}', 'delete')->name("researchTopics.delete");
    });
});
