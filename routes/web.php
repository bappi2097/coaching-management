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
Route::group([], function () {
    Route::get("login", [\App\Http\Controllers\Auth\LoginController::class, "showLoginForm"])->name("login");
    Route::post("login", [\App\Http\Controllers\Auth\LoginController::class, "login"]);
    Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, "logout"])->name('logout')->middleware('auth');
    Route::group(["prefix" => "password", "as" => "password."], function () {
        Route::get("reset", [\App\Http\Controllers\Auth\ForgotPasswordController::class, "showLinkRequestForm"])->name("request");
        Route::post("email", [\App\Http\Controllers\Auth\ForgotPasswordController::class, "sendResetLinkEmail"])->name("email");
        Route::get("reset/{token}", [\App\Http\Controllers\Auth\ResetPasswordController::class, "showResetForm"])->name("reset");
        Route::post("reset", [\App\Http\Controllers\Auth\ResetPasswordController::class, "reset"])->name("update");
    });
});

/* -------------------------------------------------------------------------- */
/*                                Officer Route                               */
/* -------------------------------------------------------------------------- */
Route::group(["prefix" => "officer", "as" => "officer.", "middleware" => ["auth", "role:officer"]], function () {
    Route::get('dashboard', [\App\Http\Controllers\Officer\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [\App\Http\Controllers\Officer\ProfileController::class, 'profile'])->name('profile');
    Route::post('/update-profile', [\App\Http\Controllers\Officer\ProfileController::class, 'updateProfile'])->name('update-profile');
    Route::post('/update-password', [\App\Http\Controllers\Officer\ProfileController::class, 'updatePassword'])->name('update-password');
    Route::group(["prefix" => "teachers", "as" => "teachers."], function () {
        Route::get("/", [\App\Http\Controllers\Officer\TeacherController::class, "index"])->name('index');
        Route::get("/create", [\App\Http\Controllers\Officer\TeacherController::class, "create"])->name('create');
        Route::post("/", [\App\Http\Controllers\Officer\TeacherController::class, "store"])->name('store');
        Route::get("/{teacher}", [\App\Http\Controllers\Officer\TeacherController::class, "show"])->name('show');
        Route::get("/{teacher}/edit", [\App\Http\Controllers\Officer\TeacherController::class, "edit"])->name('edit');
        Route::put("/{teacher}", [\App\Http\Controllers\Officer\TeacherController::class, "update"])->name('update');
        Route::put("/{teacher}/password", [\App\Http\Controllers\Officer\TeacherController::class, "updatePassword"])->name('update-password');
        Route::delete("/{teacher}", [\App\Http\Controllers\Officer\TeacherController::class, "destroy"])->name('destroy');
    });
    Route::group(["prefix" => "students", "as" => "students."], function () {
        Route::get("/", [\App\Http\Controllers\Officer\StudentController::class, "index"])->name('index');
        Route::get("/create", [\App\Http\Controllers\Officer\StudentController::class, "create"])->name('create');
        Route::post("/", [\App\Http\Controllers\Officer\StudentController::class, "store"])->name('store');
        Route::get("/{student}", [\App\Http\Controllers\Officer\StudentController::class, "show"])->name('show');
        Route::get("/{student}/edit", [\App\Http\Controllers\Officer\StudentController::class, "edit"])->name('edit');
        Route::put("/{student}", [\App\Http\Controllers\Officer\StudentController::class, "update"])->name('update');
        Route::put("/{student}/password", [\App\Http\Controllers\Officer\StudentController::class, "updatePassword"])->name('update-password');
        Route::delete("/{student}", [\App\Http\Controllers\Officer\StudentController::class, "destroy"])->name('destroy');
    });
});

/* -------------------------------------------------------------------------- */
/*                                Teacher Route                               */
/* -------------------------------------------------------------------------- */
Route::group(["prefix" => "teacher", "as" => "teacher.", "middleware" => ["auth", "role:teacher"]], function () {
    // 
});

/* -------------------------------------------------------------------------- */
/*                                Student Route                               */
/* -------------------------------------------------------------------------- */
Route::group(["prefix" => "student", "as" => "student.", "middleware" => ["auth", "role:student"]], function () {
    // 
});

/* -------------------------------------------------------------------------- */
/*                               Guardian Route                               */
/* -------------------------------------------------------------------------- */
Route::group(["prefix" => "guardian", "as" => "guardian.", "middleware" => ["auth", "role:guardian"]], function () {
    // 
});

// Route::get('/admin', function () {
//     return view('admin.home');
// });

// Route::get('login', function () {
//     return view('admin.auth.login');
// });

// Route::get('register', function () {
//     return view('admin.auth.register');
// });

// Route::get('password', function () {
//     return view('admin.auth.forget');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
