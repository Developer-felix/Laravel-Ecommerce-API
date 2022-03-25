<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/products',ProductController::class);

Route::group(['prefix'=>'products'],function(){
    Route::apiResource('/{products}/reviews',ReviewController::class);
});