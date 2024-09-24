<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'index'])->name('news.feed');
Route::resource('articles', ArticleController::class);