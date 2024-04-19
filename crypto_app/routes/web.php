<?php

use App\Http\Controllers\EchangeController;
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

Route::get('/echanges',[EchangeController::class,'index']);

Route::get('/exchanges/{id}', [EchangeController::class, 'show'])->name('exchanges.detail');

