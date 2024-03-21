<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/view-post', [App\Http\Controllers\PostController::class, 'viewPost']);

Route::get('/create-post', [App\Http\Controllers\PostController::class, 'getCreatePost']);
Route::post('/create-post', [App\Http\Controllers\PostController::class, 'postCreatePost'])->name('create-post');

Route::get('/view-all-posts', [App\Http\Controllers\PostController::class, 'viewAllPosts']);
Route::get('/view-post/{id}', [App\Http\Controllers\PostController::class, 'viewPost'])->name('view-post');

Route::get('/tests', [App\Http\Controllers\PostController::class, 'tests']);

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index']);

Route::redirect('/here', '/there', 301);
