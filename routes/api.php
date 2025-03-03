<?php

use App\Http\Controllers\PropertiesAPIController;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/demo1', function(){
    return response()->json([
        'name' => 'Abigail',
        'state' => 'CA',
    ]);
});

// Route::get('/properties', function(){
//     return response()->json (Property::all());
// });

Route::get('/properties', [PropertiesAPIController::class, 'properties'])->name('api.properties_list');
Route::get('properties/datatables', [PropertiesAPIController::class, 'properties_datatables'])->name('properties.datatables');
Route::post('/contact_agent', [PropertiesAPIController::class, 'saveContactAgent'])->name('api.contact_agent');
