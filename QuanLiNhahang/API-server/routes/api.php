<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TableController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\BillController;
use App\Http\Controllers\Api\BillInfoController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('tables')->group(function () {
    Route::get('list', [TableController::Class,'getAll']);
    Route::get('create', [TableController::Class,'create']);
    Route::post('update', [TableController::Class,'update']);
    Route::delete('delete', [TableController::Class,'delete']);
    Route::post('show', [TableController::Class,'show']);


});


Route::prefix('food')->group(function () {
    Route::get('list', [FoodController::Class,'getAll']);
    Route::get('create', [FoodController::Class,'create']);
    Route::get('update', [FoodController::Class,'update']);
    Route::get('delete', [FoodController::Class,'delete']);
    Route::post('show', [FoodController::Class,'show']);


});

Route::prefix('category')->group(function () {
    Route::get('list', [CategoryController::Class,'getAll']);
    Route::get('create', [CategoryController::Class,'create']);
    Route::get('update', [CategoryController::Class,'update']);
    Route::delete('delete', [CategoryController::Class,'delete']);
    Route::post('show', [CategoryController::Class,'show']);


});
Route::prefix('bill')->group(function () {
    Route::get('list', [BillController::Class,'getAll']);
    Route::get('create', [BillController::Class,'create']);
    Route::get('update', [BillController::Class,'update']);
    Route::delete('delete', [BillController::Class,'delete']);
    Route::post('show', [BillController::Class,'show']);


});

Route::prefix('BillInfo')->group(function () {
    Route::get('list', [BillInfoController::Class,'getAll']);
    Route::get('create', [BillInfoController::Class,'create']);
    Route::get('update', [BillInfoController::Class,'update']);
    Route::delete('delete', [BillInfoController::Class,'delete']);
    Route::post('show', [BillInfoController::Class,'show']);


});
