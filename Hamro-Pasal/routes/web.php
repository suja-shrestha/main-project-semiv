<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Productv2Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;


Auth::routes();


Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home'); // Dashboard for logged in users

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/products', [Productv2Controller::class, 'index'])->name('productv2.index');
    Route::get('/products/create', [Productv2Controller::class, 'create'])->name('productv2.create');
    Route::post('/products', [Productv2Controller::class, 'store'])->name('productv2.store');
    Route::delete('/products/{id}', [Productv2Controller::class, 'destroy'])->name('productv2.destroy');

});
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/about', action: function () {return view('aboutus');})->name('about.us');
Route::get('/homes', action: function (): Factory|View {return view('home');})->name('homes');