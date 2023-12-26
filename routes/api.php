<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HouseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Project;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/projects/{project:slug}', function(Project $project){
    return $project;
});

Route::get('/projects/{project:slug}/apartments-avg-price', [ProjectController::class, 'avgPriceToApartments']);

Route::apiResource('apartments', ApartmentController::class);
