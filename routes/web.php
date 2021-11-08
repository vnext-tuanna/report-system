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

###################
# GUEST
###################


Route::get('/client', function () {
        return view('client.index');
});
Route::get('/login', function () {
    return view('client.login');
});
Route::get('/user', function () {
    return view('client.user.index');
});
Route::get('/user/profile', function () {
    return view('client.user.profile');
});

Route::get('/request', function () {
    return view('client.request.index');
});
Route::get('/request/add', function () {
    return view('client.request.add');
})->name('request.add');
Route::get('/report', function () {
    return view('client.report.add');
});
###################
# AUTH
###################
