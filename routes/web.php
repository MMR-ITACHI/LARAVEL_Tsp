<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Route::get('/app', function () {
//     return view('backend.admin_dashboard');
// });

//Admin

Route::middleware('guest:admin')->prefix('admin')->group( function () {

    Route::get('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'login'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'check_user']);

    

});

Route::middleware('auth:admin')->prefix('admin')->group( function () {

    Route::post('logout', [App\Http\Controllers\Auth\Admin\LoginController::class, 'logout'])->name('admin.logout');

    Route::view('/dashboard','backend.admin_dashboard');

});



//Doctor

Route::middleware('guest:doctor')->prefix('doctor')->group( function () {

    Route::get('login', [App\Http\Controllers\Auth\Doctor\LoginController::class, 'login'])->name('doctor.login');
    Route::post('login', [App\Http\Controllers\Auth\Doctor\LoginController::class, 'check_user']);

    

});

Route::middleware('auth:doctor')->prefix('doctor')->group( function () {

    Route::post('logout', [App\Http\Controllers\Auth\Doctor\LoginController::class, 'logout'])->name('doctor.logout');

    Route::view('/dashboard','backend.doctor_dashboard');

});