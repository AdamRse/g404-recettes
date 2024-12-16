<?php

use App\Http\Controllers\RecettesController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     //return view('welcome');
// });
Route::get('/', [RecettesController::class, 'index']);
