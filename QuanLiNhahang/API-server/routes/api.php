<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TableController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\BillController;
use App\Http\Controllers\Api\BillInfoController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoleController;




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
    Route::post('create', [TableController::Class,'create']);
    Route::post('update', [TableController::Class,'update']);
    Route::post('delete', [TableController::Class,'delete']);
    Route::get('show', [TableController::Class,'show']);


});


Route::prefix('food')->group(function () {
    Route::get('list', [FoodController::Class,'getAll']);
    Route::post('create', [FoodController::Class,'create']);
    Route::post('update', [FoodController::Class,'update']);
    Route::post('delete', [FoodController::Class,'delete']);
    Route::get('show', [FoodController::Class,'show']);


});

Route::prefix('category')->group(function () {
    Route::get('list', [CategoryController::Class,'getAll']);
    Route::post('create', [CategoryController::Class,'create']);
    Route::post('update', [CategoryController::Class,'update']);
    Route::post('delete', [CategoryController::Class,'delete']);
    Route::get('GetByStatus', [CategoryController::Class,'GetByStatus']);


});
Route::prefix('bill')->group(function () {
    Route::get('list', [BillController::Class,'getAll']);
    Route::get('create', [BillController::Class,'create']);
    Route::get('update', [BillController::Class,'update']);
    Route::delete('delete', [BillController::Class,'delete']);
    Route::get('show', [BillController::Class,'show']);


});

Route::prefix('BillInfo')->group(function () {
    Route::get('list', [BillInfoController::Class,'getAll']);
    Route::post('create', [BillInfoController::Class,'create']);
    Route::post('update', [BillInfoController::Class,'update']);
    Route::post('delete', [BillInfoController::Class,'delete']);
    Route::post('show', [BillInfoController::Class,'show']);
    Route::post('CreateOrUpdate', [BillInfoController::Class,'CreateOrUpdate']);

});
Route::prefix('users')->group(function () {
    Route::get('list', [UserController::Class,'getAll']);
    Route::post('create', [UserController::Class,'create']);
    Route::post('update', [UserController::Class,'update']);
    Route::post('delete', [UserController::Class,'delete']);
    Route::get('show', [UserController::Class,'show']);


});
Route::prefix('role')->group(function () {
    Route::get('list', [RoleController::Class,'getAll']);

});
