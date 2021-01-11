<?php

use Illuminate\Support\Facades\Route;

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
    return view('index/landing');
});

Route::get('/explore', function () {
    return view('user/explore');
});

Route::get('/explorer', function () {
    return view('user/explorer');
});

Route::get('/inbox', function () {
    return view('user/inbox');
});

Route::get('/user/{username}', function () {
    return view('user/user-username');
});

//Logic
//IndexController
//Get Requests from /
Route::get('/register/email/{email}/password/{password}/name/{name}/username/{username}', 'IndexController@Register');

