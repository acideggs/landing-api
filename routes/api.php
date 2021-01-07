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

// Route::post('register', 'UserController@register');
// Route::post('login', 'UserController@login');
// Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

Route::group([

	'middleware' => 'api',
	'prefix' => 'auth'

], function ($router) {

	Route::post('login', 'AuthController@login');
	Route::post('logout', 'AuthController@logout');
	Route::post('refresh', 'AuthController@refresh');
	Route::post('me', 'AuthController@me');

});

Route::group(['middleware' => ['auth','api']], function () {

	// Line for roles
	Route::get('/role-all', 'RoleController@index');
	Route::post('/role', 'RoleController@store');
	Route::get('/role/{id}', 'RoleController@show');
	Route::put('/role/{id}', 'RoleController@update');
	Route::delete('/role/{id}', 'RoleController@destroy');
});

// Line for services
Route::get('/service-all', 'ServiceController@index');
Route::post('/service', 'ServiceController@store');
Route::get('/service/{id}', 'ServiceController@show');
Route::put('/service/{id}', 'ServiceController@update');
Route::delete('/service/{id}', 'ServiceController@destroy');

// Line for testimonials
Route::get('/testimonial-all', 'TestimonialController@index');
Route::post('/testimonial', 'TestimonialController@store');
Route::get('/testimonial/{id}', 'TestimonialController@show');
Route::put('/testimonial/{id}', 'TestimonialController@update');
Route::delete('/testimonial/{id}', 'TestimonialController@destroy');

// Line for why us
Route::get('/why-us-all', 'WhyUsController@index');
Route::post('/why-us', 'WhyUsController@store');
Route::get('/why-us/{id}', 'WhyUsController@show');
Route::put('/why-us/{id}', 'WhyUsController@update');
Route::delete('/why-us/{id}', 'WhyUsController@destroy');