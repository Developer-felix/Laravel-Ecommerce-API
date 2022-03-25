<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/v1/products',ProductController::class);

Route::group(['prefix'=>'v1/products'],function(){
    Route::apiResource('/{products}/reviews',ReviewController::class);
});
