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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/test', [\App\Http\Controllers\TestController::class, 'index']);
});
Route::get('/dashboard', function () {
    return view('admin.home');
});
Route::get('/report', function () {
    return view('admin.report');
});
Route::get('/request', function () {
    return view('admin.request');
});
Route::get('/division', function () {
    return view('admin.division');
});
Route::get('/skill', function () {
    return view('admin.skill');
});
Route::get('/user', function () {
    return view('admin.user');
});

###################
# AUTH
###################
