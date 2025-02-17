<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\JapaneseWordController;


Route::post('/login', [UserController::class, 'postlogin'])->name('user.postlogin');
Route::post('/register', [UserController::class, 'postregister'])->name('user.postregister');

Route::get('/search-word', [JapaneseWordController::class, 'searchWord']);
Route::get('/example-sentence', [JapaneseWordController::class, 'exampleSentence']);
Route::get('/kanji-detail', [JapaneseWordController::class, 'kanjiDetail']);
