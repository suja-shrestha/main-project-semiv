<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Productv2Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

Auth::routes();

// ===================================================================
//     MAIN PUBLIC-FACING AND AUTHENTICATED ROUTES
// ===================================================================

// This is the dashboard for LOGGED IN users
Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');

// This is the public homepage for GUESTS
Route::get('/welcome', [HomeController::class, 'home'])->name('welcome');


// ===================================================================
//     NEW GENDER AND CATEGORY ROUTES (PUBLIC)
// ===================================================================
Route::get('/men', [HomeController::class, 'showMenProducts'])->name('products.men');
Route::get('/women', [HomeController::class, 'showWomenProducts'])->name('products.women');
Route::get('/kids', [HomeController::class, 'showKidsProducts'])->name('products.kids');
Route::get('/category/{category_slug}', [HomeController::class, 'showByCategory'])->name('products.category');


// ===================================================================
//     OTHER PUBLIC ROUTES
// ===================================================================
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/about', function () { return view('aboutus'); })->name('about.us');
Route::get('/contactus', function () { return view('contactus'); })->name('contact.us');


// ===================================================================
//     ADMIN PANEL ROUTES (PROTECTED BY AUTH MIDDLEWARE)
// ===================================================================
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/products', [Productv2Controller::class, 'index'])->name('productv2.index');
    Route::get('/products/create', [Productv2Controller::class, 'create'])->name('productv2.create');
    Route::post('/products', [Productv2Controller::class, 'store'])->name('productv2.store');
    Route::delete('/products/{id}', [Productv2Controller::class, 'destroy'])->name('productv2.destroy');
    Route::get('/products/{product}/edit', [Productv2Controller::class, 'edit'])->name('productv2.edit');
    Route::put('/products/{product}', [Productv2Controller::class, 'update'])->name('productv2.update');
});