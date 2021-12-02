<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Password;
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

Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/single', AboutController::class);
Route::get('/secret', [HomeController::class, 'secret'])
  ->name('secret')
  ->middleware('can:home.secret');

Route::resource('posts', PostController::class);

// AUTH
Route::resource('login', LoginController::class)->only('index', 'store');
Route::resource('register', RegisterController::class)->only('index', 'store');

Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::prefix('/password')->middleware('auth')->name('password.')->group(function () {
  Route::get('/reset', [ResetPasswordController::class, 'request'])->name('request');
  Route::get('/reset/{token}', [ResetPasswordController::class, 'reset'])->name('reset');
  Route::post('/reset', [ResetPasswordController::class, 'update'])->name('update');
  Route::post('/email', [ResetPasswordController::class, 'email'])->name('email');
});
