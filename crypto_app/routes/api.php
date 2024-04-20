<?php

use App\Http\Controllers\Api\AssetController;
use App\Http\Controllers\EchangeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->group(function () {
    Route::get('/assets', [AssetController::class, 'index']);
    Route::get('/exchanges', [EchangeController::class, 'getExchanges']);
    //detail page
    Route::get('/exchanges/{id}', [EchangeController::class, 'detail']);

    Route::get('/markets', [MarketController::class, 'index']);
});




