<?php


use API\LoginController;
use Api\LogoutController;
use API\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/products', 'ProductController');

Route::group(['prefix' => 'products'], function() {
    Route::apiResource('{product}/reviews', 'ReviewController');

});
Route::post('/register','RegisterController@register');
Route::post('/login','LoginController@login');
Route::middleware('auth:api')-> post('logout','LogoutController@logout');
