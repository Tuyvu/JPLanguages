<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\AdminController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/logon', [AdminController::class, 'logon'])->name('logon');
Route::post('/logon', [AdminController::class, 'postlogon'])->name('postlogon');
Route::get('/logoutadmin', [AdminController::class, 'logout'])->name('admin.logout');

// Route::prefix('admin')->middleware(AdminMiddleware::class)->group(function () {
//     Route::get('/', [AdminController::class, 'index'])->name('admin.index');
//     Route::get('/uploadimage', [AdminController::class, 'uploadimage'])->name('admin.uploadimages');
//     Route::post('/uploadimage', [AdminController::class, 'postuploadimage'])->name('admin.postuploadimage');
    
//     Route::resource('category', CategoryController::class);
//     Route::get('/category-trash', [CategoryController::class, 'restore'])->name('category.restore');
//     Route::get('/category-trash/{id}', [CategoryController::class, 'restore_id'])->name('category.restore_id');
//     Route::get('/category-foredelete/{id}', [CategoryController::class, 'foredelete'])->name('category.foredelete');
    
//     Route::get('/customer', [AdminController::class, 'customer'])->name('admin.customer');
//     Route::get('/order', [OrderController::class, 'getAllOrder'])->name('admin.order');
//     Route::get('/orderconfirm', [OrderController::class, 'getAllOrdercomfirm'])->name('admin.ordercomfirm');
//     Route::get('/order/{order}', [OrderController::class, 'confirmOrder'])->name('order.confirm');
//     Route::get('/orderback/{id}', [OrderController::class, 'finishOrder'])->name('order.finishOrder');

//     Route::get('/shipall', [OrderController::class, 'getAllOrdership'])->name('admin.ordership');
//     Route::get('/shipconfim', [OrderController::class, 'getAllshipcomfirm'])->name('order.getAllshipcomfirm');
//     Route::get('/shipoder/{order}', [OrderController::class, 'confirmOrdership'])->name('order.confirmship');
//     Route::get('/ship/{id}', [OrderController::class, 'finishOrdership'])->name('order.finishOrdership');

//     Route::resource('product', ProductController::class);
//     Route::get('/product-trash', [ProductController::class, 'restore'])->name('product.restore');
//     Route::get('/product-trash/{id}', [ProductController::class, 'restore_id'])->name('product.restore_id');
//     Route::get('/product-foredelete/{id}', [ProductController::class, 'foredelete'])->name('product.foredelete');
// });