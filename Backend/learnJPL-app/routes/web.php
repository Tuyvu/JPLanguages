<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\LessonsController;
use App\Http\Controllers\Admin\TestsController;
use App\Http\Controllers\Admin\CustomerController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/logon', [AdminController::class, 'logon'])->name('logon');
Route::post('/logon', [AdminController::class, 'postlogon'])->name('postlogon');
Route::get('/logoutadmin', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/admim', [AdminController::class, 'index'])->name('admin.index');

Route::prefix('admin')->middleware(AdminMiddleware::class)->group(function () {
    
    Route::resource('courses', CoursesController::class);
    Route::get('/courses-trash', [CoursesController::class, 'restore'])->name('courses.restore');
    Route::get('/courses-trash/{id}', [CoursesController::class, 'restore_id'])->name('courses.restore_id');
    Route::get('/courses-foredelete/{id}', [CoursesController::class, 'foredelete'])->name('courses.foredelete');
    
    Route::resource('lessons', LessonsController::class);
    Route::get('/lessons-trash', [LessonsController::class, 'restore'])->name('lessons.restore');
    Route::get('/lessons-trash/{id}', [LessonsController::class, 'restore_id'])->name('lessons.restore_id');
    Route::get('/lessons-foredelete/{id}', [LessonsController::class, 'foredelete'])->name('lessons.foredelete');

    Route::resource('tests', TestsController::class);
    Route::get('/tests-trash', [TestsController::class, 'restore'])->name('tests.restore');
    Route::get('/tests-trash/{id}', [TestsController::class, 'restore_id'])->name('tests.restore_id');
    Route::get('/tests-foredelete/{id}', [TestsController::class, 'foredelete'])->name('tests.foredelete');

    Route::get('/customer', [CustomerController::class, 'getAllCustomer'])->name('customer.index');
    
});