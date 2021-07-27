<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MainController;
use \App\Http\Controllers\FeedBackController;

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

App::setLocale('ru');

Route::get('/', [MainController::class, 'index']);
Route::get('/about', [MainController::class, 'aboutPage']);
Route::get('/category/{id}/', [MainController::class, 'getCategoryById']);
Route::get('/tag/{tag}/', [MainController::class, 'getTag']);
Route::get('/datePosts/{date}/', [MainController::class, 'getDate']);
Route::get('/post/{id}/', [MainController::class, 'showPost']);
Route::get('/feedback', [FeedBackController::class, 'showForm']);
Route::post('/feedback', [FeedBackController::class, 'sendForm']);
