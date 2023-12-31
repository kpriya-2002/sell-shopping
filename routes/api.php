<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Employee and login
Route::post('/login','AuthController@login');
Route::post('/register','AuthController@register');

//Category
Route::post('/addCategory','Categorycontroller@addCategory');
Route::post('/updateCategory','Categorycontroller@updateCategory');
Route::post('/listAllCategory','Categorycontroller@listAllCategory');

// product
Route::post('/addProduct','Categorycontroller@addProduct');
Route::post('/ListProduct','Categorycontroller@ListProduct');
