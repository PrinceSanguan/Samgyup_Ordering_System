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
Route::get('welcome2', [AdminController::class, 'welcome2'])->name('welcome2');
Route::get('welcome3', [AdminController::class, 'welcome3'])->name('welcome3');
Route::get('welcome4', [AdminController::class, 'welcome4'])->name('welcome4');
Route::get('welcome5', [AdminController::class, 'welcome5'])->name('welcome5');
Route::get('welcome6', [AdminController::class, 'welcome6'])->name('welcome6');

Route::get('admin/pending', [AdminController::class, 'pending'])->name('admin.pending');
Route::post('admin/pending/{orderId}/updateStatus', [AdminController::class, 'updateOrderStatus'])->name('admin.pending.updateStatus');
Route::get('admin/product', [AdminController::class, 'product'])->name('admin.product');
Route::post('admin/product', [AdminController::class, 'addProduct'])->name('admin.add_product');
Route::post('admin/product/{productId}/delete', [AdminController::class, 'deleteProduct']);
Route::post('/', [AdminController::class, 'getOrder']);

Route::get('admin/table1', [AdminController::class, 'table1'])->name('admin.table1');
Route::post('admin/table1/paidorder', [AdminController::class, 'payAllBalances']);
Route::post('admin/table1/addorder', [AdminController::class, 'addOrder'])->name('admin.addOrder');

Route::get('admin/table2', [AdminController::class, 'table2'])->name('admin.table2');
Route::post('admin/table2/paidorder', [AdminController::class, 'payAllBalances2']);
Route::post('admin/table2/addorder', [AdminController::class, 'addOrder2'])->name('admin.addOrder2');

Route::get('admin/table3', [AdminController::class, 'table3'])->name('admin.table3');
Route::post('admin/table3/paidorder', [AdminController::class, 'payAllBalances3']);
Route::post('admin/table3/addorder', [AdminController::class, 'addOrder3'])->name('admin.addOrder3');

Route::get('admin/table4', [AdminController::class, 'table4'])->name('admin.table4');
Route::post('admin/table4/paidorder', [AdminController::class, 'payAllBalances4']);
Route::post('admin/table4/addorder', [AdminController::class, 'addOrder4'])->name('admin.addOrder4');

Route::get('admin/table5', [AdminController::class, 'table5'])->name('admin.table5');
Route::post('admin/table5/paidorder', [AdminController::class, 'payAllBalances5']);
Route::post('admin/table5/addorder', [AdminController::class, 'addOrder5'])->name('admin.addOrder5');

Route::get('admin/table6', [AdminController::class, 'table6'])->name('admin.table6');
Route::post('admin/table6/paidorder', [AdminController::class, 'payAllBalances6']);
Route::post('admin/table6/addorder', [AdminController::class, 'addOrder6'])->name('admin.addOrder6');

Route::get('admin/paid', [AdminController::class, 'paidOrder'])->name('admin.paidOrders');