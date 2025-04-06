<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/story/{id}', [HomeController::class, 'showDetails'])->name('story.details');
Route::post('/story/{id}/review', [HomeController::class, 'storeReview'])->name('story.review');

Route::resource('authors', App\Http\Controllers\AuthorController::class);
Route::resource('categories', App\Http\Controllers\CategoryController::class);
Route::resource('chapters', App\Http\Controllers\ChapterController::class);
Route::resource('comments', App\Http\Controllers\CommentController::class);
Route::resource('favorites', App\Http\Controllers\FavoriteController::class);
Route::resource('stories', App\Http\Controllers\StoryController::class);
Route::resource('views', App\Http\Controllers\ViewController::class);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('promote-to-author', [AuthController::class, 'promoteToAuthor'])->middleware('auth:sanctum');
