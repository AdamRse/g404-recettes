<?php

use App\Http\Controllers\RecettesController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     //return view('welcome');
// });
Route::get('/', [RecettesController::class, 'index']);
Route::get('/recipe/{id}', [RecettesController::class, 'show']);
Route::get('/recipes', [RecettesController::class, 'list']);
Route::post('/registerComment', [RecettesController::class, 'register']);
