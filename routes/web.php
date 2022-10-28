<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

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
});
