<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\TrainingsController::class, 'index']);
Route::get('/addtraining', [\App\Http\Controllers\TrainingsController::class, 'createtraining']);
Route::post('/addtraining', [\App\Http\Controllers\TrainingsController::class, 'addtraining']);
Route::get('/addexercise', [\App\Http\Controllers\ExerciseController::class, 'addexercises']);
