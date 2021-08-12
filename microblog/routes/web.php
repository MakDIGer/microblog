<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MainController;
use \App\Http\Controllers\FeedBackController;
use \App\Http\Controllers\AdminFeedBacksController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\AdminRecordsController;
use \App\Http\Controllers\LoginController;

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


Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showForm'])->name('login');
    Route::post('/login', [LoginController::class, 'authentication']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware(['auth'])->group(function () {
        Route::get('/', [AdminRecordsController::class, 'getRecords'])->name('admin-main');
        Route::get('/records', [AdminRecordsController::class, 'getRecords'])->name('admin-records');
        Route::get('/records/search/', [AdminRecordsController::class, 'getRecordsSearch'])->name('admin-search');
        Route::get('/record/new', [AdminRecordsController::class, 'newRecordShow'])->name('new-record');
        Route::get('/record/edit/{id}', [AdminRecordsController::class, 'editRecordShow'])->name('edit-record');
        Route::post('/record/edit/{id}', [AdminRecordsController::class, 'editRecord']);
        Route::get('/record/delete/{id}', [AdminRecordsController::class, 'deleteRecord'])->name('delete-record');
        Route::post('/records', [AdminRecordsController::class, 'newRecord'])->name('new-record-add');
        Route::get('/categories', [AdminController::class, 'getCategories'])->name('admin-categories');
        Route::get('/category/new', [AdminController::class, 'newCategoryShow'])->name('new-category');
        Route::post('/categories', [AdminController::class, 'newCategory'])->name('new-category-add');
        Route::get('/category/edit/{id}', [AdminController::class, 'editCategoryShow'])->name('edit-category');
        Route::post('/category/edit/{id}', [AdminController::class, 'editCategory']);
        Route::get('/category/delete/{id}', [AdminController::class, 'deleteCategory'])->name('delete-category');
        Route::get('/feedbacks', [AdminFeedBacksController::class, 'getFeedbacks'])->name('admin-feedbacks');
    });
});
