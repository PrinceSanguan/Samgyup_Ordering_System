<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AdminController::class, 'welcome'])->name('welcome');
Route::get('admin/pending', [AdminController::class, 'pending'])->name('admin.pending');
Route::get('admin/product', [AdminController::class, 'product'])->name('admin.product');
Route::post('admin/product', [AdminController::class, 'addProduct'])->name('admin.add_product');
