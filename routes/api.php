<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TagsController;

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

Route::group(['prefix' => '/news'], function() {
    Route::get('/', [NewsController::class, 'index']);
    Route::get('/{id}', [NewsController::class, 'details'])->where('id', '[0-9]');
    Route::post('/', [NewsController::class, 'create']);
    Route::put('/{id}', [NewsController::class, 'update'])->where('id', '[0-9]');
    Route::delete('/{id}', [NewsController::class, 'delete'])->where('id', '[0-9]');
});

Route::group(['prefix' => '/tags'], function() {
    Route::get('/', [TagsController::class, 'index']);
    Route::get('/{id}', [TagsController::class, 'details'])->where('id', '[0-9]');
    Route::post('/', [TagsController::class, 'create']);
    Route::put('/{id}', [TagsController::class, 'update'])->where('id', '[0-9]');
    Route::delete('/{id}', [TagsController::class, 'delete'])->where('id', '[0-9]');
});