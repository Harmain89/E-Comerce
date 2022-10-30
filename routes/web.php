<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;

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

Route::get('/', function() {
    return view('welcome');
});

Route::get('admin', [AdminController::class, 'index']);
// Route::get('adminu', [AdminController::class, 'update_password']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::post('admin/auth_logout', [AdminController::class, 'auth_logout'])->name('admin.auth_logout');

Route::group(['middleware'=>'admin_auth'], function() {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);

    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::get('admin/manage_category', [CategoryController::class, 'manage_category'])->name('admin.manage_category');
    Route::post('admin/category_create', [CategoryController::class, 'create'])->name('admin.category_create');
    Route::post('admin/category_edit', [CategoryController::class, 'edit'])->name('admin.category_edit');
    Route::post('admin/category_delete', [CategoryController::class, 'delete'])->name('admin.category_delete');

    Route::get('admin/coupon', [CouponController::class, 'index']);
    Route::get('admin/manage_coupon', [CouponController::class, 'manage_coupon'])->name('admin.manage_coupon');
    Route::post('admin/coupon_create', [CouponController::class, 'create'])->name('admin.coupon_create');
    Route::post('admin/coupon_edit', [CouponController::class, 'edit'])->name('admin.coupon_edit');
    Route::post('admin/coupon_delete', [CouponController::class, 'delete'])->name('admin.coupon_delete');
});
