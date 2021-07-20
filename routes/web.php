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
    return view('landing.master');
});

Route::get('/admin', function () {
    return view('admin.home');
});

// Route::get('login', function () {
//     return view('admin.auth.login');
// });

// Route::get('register', function () {
//     return view('admin.auth.register');
// });

// Route::get('password', function () {
//     return view('admin.auth.forget');
// });

Auth::routes(["verify" => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("verified");
