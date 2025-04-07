<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/story/{id}', [HomeController::class, 'showDetails'])->name('story.details');
Route::get('/story/{storyName}/{chapterNumber}', [HomeController::class, 'showChapter'])->name('story.chapter');
Route::post('/story/{storyName}/comment/{chapterNumber?}', [HomeController::class, 'storeComment'])->name('comment.save');

//Tìm kiếm
Route::get('/category/{id}', [SearchController::class, 'showCategory'])->name('category.show');
Route::get('/search', [SearchController::class, 'showSearch'])->name('search.show');

Route::resource('authors', App\Http\Controllers\AuthorController::class);
Route::resource('categories', App\Http\Controllers\CategoryController::class);
Route::resource('chapters', App\Http\Controllers\ChapterController::class);
Route::resource('comments', App\Http\Controllers\CommentController::class);
Route::resource('favorites', App\Http\Controllers\FavoriteController::class);
Route::resource('stories', App\Http\Controllers\StoryController::class);
Route::resource('views', App\Http\Controllers\ViewController::class);

//Đăng nhập đăng ký
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
