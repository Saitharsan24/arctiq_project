<?php

use App\Http\Resources\v1\ProductCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\SupplierController;
use App\Http\Controllers\Api\V1\ProductController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//api V1 url
Route::group(['prefix' => 'v1','namespace' => 'App\Http\Controllers\Api\V1'],function(){
    Route::apiResource('suppliers',SupplierController::class);
    Route::apiResource('products',ProductController::class);
    Route::post('products/bulk',['uses' => 'ProductController@bulkStore']);
});