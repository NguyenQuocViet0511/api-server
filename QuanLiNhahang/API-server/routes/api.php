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
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\MaterialBillController;
use App\Http\Controllers\Api\MaterialBillInfoController;

use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\HistoryInventoryController;



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
    Route::get('list', [TableController::class,'getAll']);
    Route::post('create', [TableController::class,'create']);
    Route::post('updateMoveTable', [TableController::class,'updateMoveTable']);
    Route::post('update', [TableController::class,'update']);
    Route::post('delete', [TableController::class,'delete']);
    Route::get('show', [TableController::class,'show']);


});


Route::prefix('food')->group(function () {
    Route::get('list', [FoodController::class,'getAll']);
    Route::post('create', [FoodController::class,'create']);
    Route::post('update', [FoodController::class,'update']);
    Route::post('delete', [FoodController::class,'delete']);
    Route::get('show', [FoodController::class,'show']);


});

Route::prefix('category')->group(function () {
    Route::get('list', [CategoryController::class,'getAll']);
    Route::post('create', [CategoryController::class,'create']);
    Route::post('update', [CategoryController::class,'update']);
    Route::post('delete', [CategoryController::class,'delete']);
    Route::get('GetByStatus', [CategoryController::class,'GetByStatus']);


});
Route::prefix('bill')->group(function () {
    Route::get('list', [BillController::class,'getAll']);
    Route::post('create', [BillController::class,'create']);
    Route::post('update', [BillController::class,'update']);
    Route::delete('delete', [BillController::class,'delete']);
    Route::get('show', [BillController::class,'show']);
    Route::get('GetBillOut', [BillController::class,'GetBillOut']);
    Route::post('GetBillByDate', [BillController::class,'GetBillByDate']);
    Route::post('GetStartAndEnd', [BillController::class,'GetStartAndEnd']);
    Route::get('GetToday', [BillController::class,'GetToday']);




});

Route::prefix('BillInfo')->group(function () {
    Route::get('list', [BillInfoController::class,'getAll']);
    Route::post('create', [BillInfoController::class,'create']);
    Route::post('update', [BillInfoController::class,'update']);
    Route::post('delete', [BillInfoController::class,'delete']);
    Route::post('show', [BillInfoController::class,'show']);
    Route::post('CreateOrUpdate', [BillInfoController::class,'CreateOrUpdate']);
    Route::post('GetJoinBill', [BillInfoController::class,'GetJoinBill']);
    Route::post('GetBillByID', [BillInfoController::class,'GetBillByID']);



});
Route::prefix('users')->group(function () {
    Route::get('list', [UserController::class,'getAll']);
    Route::post('create', [UserController::class,'create']);
    Route::post('update', [UserController::class,'update']);
    Route::post('delete', [UserController::class,'delete']);
    Route::post('login', [UserController::class,'login']);
    Route::post('changePassword', [UserController::class,'changePassword']);



});
Route::prefix('role')->group(function () {
    Route::get('list', [RoleController::class,'getAll']);

});
Route::prefix('material')->group(function () {
    Route::get('list', [MaterialController::class,'getAll']);
    Route::post('create', [MaterialController::class,'create']);
    Route::post('update', [MaterialController::class,'update']);
    Route::post('delete', [MaterialController::class,'delete']);

});
Route::prefix('materialbill')->group(function () {
    Route::get('list', [MaterialBillController::class,'getAll']);
    Route::post('create', [MaterialBillController::class,'create']);
    Route::post('update', [MaterialBillController::class,'update']);
    Route::post('delete', [MaterialBillController::class,'delete']);
    Route::get('show', [MaterialBillController::class,'show']);


});
Route::prefix('materialbillinfo')->group(function () {
    Route::get('list', [MaterialBillInfoController::class,'getAll']);
    Route::post('create', [MaterialBillInfoController::class,'create']);
    Route::post('update', [MaterialBillInfoController::class,'update']);
    Route::post('delete', [MaterialBillInfoController::class,'delete']);
    Route::post('CreateOrUpdate', [MaterialBillInfoController::class,'CreateOrUpdate']);
    Route::post('show', [MaterialBillInfoController::class,'show']);


});
Route::prefix('inventory')->group(function () {
    Route::get('list', [InventoryController::class,'getAll']);
    Route::get('create', [InventoryController::class,'create']);
    Route::post('update', [InventoryController::class,'update']);
    Route::post('delete', [InventoryController::class,'delete']);
    Route::get('CreateOrUpdate', [InventoryController::class,'CreateOrUpdate']);
    Route::post('show', [InventoryController::class,'show']);


});
Route::prefix('historyinventory')->group(function () {
    Route::get('list', [HistoryInventoryController::class,'Gethistory']);
    Route::get('create', [HistoryInventoryController::class,'create']);
    Route::post('update', [HistoryInventoryController::class,'update']);
    Route::post('delete', [HistoryInventoryController::class,'delete']);
    Route::get('CreateOrUpdate', [HistoryInventoryController::class,'CreateOrUpdate']);
    Route::get('all', [HistoryInventoryController::class,'getAll']);


});
