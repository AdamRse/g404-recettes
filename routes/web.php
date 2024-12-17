<?php

use App\Http\Controllers\RecettesController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     //return view('welcome');
// });
Route::get('/', [RecettesController::class, 'index']);
Route::get('/receipes', [RecettesController::class, 'list']);
Route::post('/registerComment', [RecettesController::class, 'register']);
