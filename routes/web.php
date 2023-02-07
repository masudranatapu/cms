<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
// admin
use App\Http\Controllers\PhotoController;
// user
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\UserDashboardController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('about', [HomeController::class, 'about'])->name('frontend.about');
Route::get('contact', [HomeController::class, 'contact'])->name('frontend.contact');


Route::get('blogs', [HomeController::class, 'blogs'])->name('frontend.blogs');
Route::get('blogs/details/{slug}', [HomeController::class, 'blogsDetails'])->name('frontend.blogs.details');
Route::get('disclaimer', [HomeController::class, 'disclaimer'])->name('frontend.disclaimer');



Route::get('faq', [HomeController::class, 'faq'])->name('faq');
Route::get('privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('terms-condition', [HomeController::class, 'termsCondition'])->name('terms-condition');
Route::post('user-register', [HomeController::class, 'userRegister'])->name('user-register');


Auth::routes();

Route::group(['as' => 'user.', 'prefix' => 'user', 'middleware' => ['auth']], function () {

    Route::get('/profile', [UserDashboardController::class, 'index'])->name('dashboard');

});


