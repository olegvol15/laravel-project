<?php

use App\Http\Controllers\mainController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\AdminReviewController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [mainController::class, 'index'])->name('home'); 
Route::get('/contacts', [mainController::class, 'contacts']);
Route::post('/contacts', [mainController::class, 'sendMail']);
Route::get('/register', [StudentController::class, 'create'])->name('register.form');
Route::post('/register', [StudentController::class, 'store'])->name('register.submit');
Route::get('/confirmation', [StudentController::class, 'confirmation'])->name('register.confirmation');
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/reviews', [ReviewController::class, 'store']);

Route::get('/category/{id}', [mainController::class, 'category'])->name('category.show');
Route::get('/movie/{id}', [mainController::class, 'movie'])->name('movie.show');

//CRUD

Route::prefix('admin')->middleware('auth', 'admin')->name('admin.')->group(function () {
  Route::resource('categories', CategoryController::class);
  Route::resource('actors', ActorController::class);
  Route::resource('movies', MovieController::class);
  Route::resource('reviews', AdminReviewController::class);
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
