<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignupController;

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
    if (Auth::check()) {
        return redirect()->route('home');
    } else {
        return view('index');
    }
})->name('index');

Route::view('/pages/article', 'pages.article')->name('article');

Route::get('/pages/donate', function () {
    return view('pages.donate');
})->name('donate');

Route::get('/pages/donate', [DonateController::class, 'show'])->name('donate');
Route::post('/pages/donate', [DonateController::class, 'submit'])->name('donate.submit');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/pages/login', 'AuthController@showLoginForm')->name('login');
Route::post('/logout', 'AuthController@logout')->name('logout');

Route::get('/pages/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/pages/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('/pages/signup', [SignupController::class, 'show'])->name('signup.show');
Route::post('/pages/signup', [SignupController::class, 'register'])->name('signup.register');
