<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/role-all', 'RoleController@index');
Route::post('/role', 'RoleController@store');
Route::get('/role/{id}', 'RoleController@show');
Route::put('/role/{id}', 'RoleController@update');
Route::delete('/role/{id}', 'RoleController@destroy');
