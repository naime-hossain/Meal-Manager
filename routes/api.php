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
Route::resource('/members', 'MemberController',['except' => ['create','edit']]);
Route::resource('/bazars', 'BazarController',['except' => ['edit']]);
Route::resource('/periods', 'PeriodController',['except' => ['create']]);
//find bazar of specific user of specific period
Route::get('/periods/{period_id}/{memeber_id}', 'PeriodController@showMemberBazar');
// Route::resource('Admin','AdminController',['only' => ['index']]);
Route::post('register','AdminController@register');
Route::put('user/{id}','AdminController@update');
Route::get('user','AdminController@getuser');
Route::post('login','AdminController@login');
Route::get('logout/{token}','AdminController@logout');

