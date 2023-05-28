<?php

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/product', 'ProductController');

Route::group(['prefix' => 'products'], function() {
    Route::apiResource('{product}/reviews', 'ReviewController');

});
