<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\JapaneseWordController;
use App\Http\Controllers\Api\CoursesApiController;
use App\Http\Controllers\Api\LessonApiController;



Route::post('/login', [UserController::class, 'postlogin'])->name('user.postlogin');
Route::post('/register', [UserController::class, 'postregister'])->name('user.postregister');
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/profile/{id}', [UserController::class, 'profile']);

Route::get('/search-word', [JapaneseWordController::class, 'searchWord']);
Route::get('/example-sentence', [JapaneseWordController::class, 'exampleSentence']);
Route::get('/kanji-detail', [JapaneseWordController::class, 'kanjiDetail']);

Route::get('/courses', [CoursesApiController::class, 'index']);
Route::get('/courses/{id}/lessons', [CoursesApiController::class, 'CoursesID']);
Route::get('/courses_user/{id}', [CoursesApiController::class, 'GetAllCoursesUser']);
// Route::get('/lesson/{id}', [LessonApiController::class, 'lessocnID']);
Route::post('/courses/bookcourses', [CoursesApiController::class, 'Bookcourses']);
Route::post('/lesson/lessonUser', [LessonApiController::class, 'lessonUser']);

