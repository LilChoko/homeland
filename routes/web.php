<?php

use App\Http\Controllers\HomeLandController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

//RUTAS HOMELAND
Route::get('/', [HomeLandController::class, 'index'])->name('home');
Route::match(['get', 'post'],'/property_details/{property_id}', [HomeLandController::class, 'property_details'])->name('property_details');
Route::get('/buy', [HomeLandController::class, 'buy'])->name('buy');
Route::get('/rent', [HomeLandController::class, 'rent'])->name('rent');
Route::get('/properties/{property_listing_type_id}', [HomeLandController::class, 'properties_listing_type'])->name('property_listing_type');
Route::get('/about', [HomeLandController::class, 'about'])->name('about');
Route::get('/contact', [HomeLandController::class, 'contact'])->name('contact');
Route::get('/login', [HomeLandController::class, 'login'])->name('login');
