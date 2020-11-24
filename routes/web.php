<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingsController;

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

Route::get('/', [TrainingsController::class, 'index']);
Route::get('/addtraining', [TrainingsController::class, 'createtraining']);
Route::post('/addtraining', [TrainingsController::class, 'addtraining']);
Route::get('/showtraining/{training_id}', [TrainingsController::class, 'show']);

Route::get('/addexercise', [\App\Http\Controllers\ExerciseController::class, 'addexercises']);
