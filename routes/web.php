<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

/*
 *  Authetication Routes
 */
Route::post('/api/v1/authenticate', 'LoginController@index');
Route::get('/api/v1/logout', 'DashboardController@logout');
Route::post('/api/v1/forgotPassword', 'LoginController@forgotPassword');
Route::post('/api/v1/register', 'RegisterController@register');
Route::get('resetpassword/{token}', 'LoginController@resetPassword');
Route::post('','LoginController@resetPasswordCompleted');

