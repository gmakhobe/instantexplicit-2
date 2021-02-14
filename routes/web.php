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

/*

    Start: View

*/

Route::get('/', function () {
    return view('index/landing');
});

// User Profile
Route::get('/user/{username}', 'UserController@Profile')->middleware('IsSessionValid');
Route::post('/user/account/profilepicture', 'UserController@UploadProfilePicture')->middleware('IsSessionValid');
Route::post('/user/account/profilebanner', 'UserController@UploadProfileBanner')->middleware('IsSessionValid');
Route::post('/user/account/profileinfo', 'UserController@UploadProfileInfo')->middleware('IsSessionValid');
Route::post('/user/account/profilepassword', 'UserController@UploadProfilePassword')->middleware('IsSessionValid');\
Route::post('/user/account/profilesubfee', 'UserController@UploadProfileSubFee')->middleware('IsSessionValid');

// User Post
Route::get('/create-post', 'UserController@CreatePost')->middleware('IsSessionValid');
Route::post('/create-post/post', 'UserController@UploadPost')->middleware('IsSessionValid');

// User Profile
Route::get('/explore', 'UserController@Explore')->middleware('IsSessionValid');

// User Profile
Route::get('/explorer', 'UserController@Explorer')->middleware('IsSessionValid');
Route::get('/explorer/search', 'UserController@ExplorerSearch')->middleware('IsSessionValid');

// User Profile
Route::get('/inbox', 'UserController@Inbox')->middleware('IsSessionValid');

// User Posts
Route::post('/post/{username}/comment/{id}', 'UserController@PostComment')->middleware('IsSessionValid');
Route::get('/post/{username}/id/{id}', 'UserController@UploadedPost')->middleware('IsSessionValid');
Route::get('/post/{username}/banana/{id}', 'UserController@UploadBanana')->middleware('IsSessionValid');
Route::get('/post/{username}/peach/{id}', 'UserController@UploadPeach')->middleware('IsSessionValid');

Route::get('/user/follow/{username}', 'UserController@FollowUser')->middleware('IsSessionValid');
Route::get('/user/unfollow/{username}', 'UserController@UnfollowUser')->middleware('IsSessionValid');

/*

    Ebd: View

*/

/*

    Start: API

*/

// Register
Route::get('/register/email/{email}/password/{password}/name/{name}/username/{username}', 'IndexController@Register');

// Login
Route::get('/login/email/{email}/password/{password}', 'IndexController@Login');

// Logout
Route::get('/logout', 'IndexController@Logout');

/*

    End: API

*/
