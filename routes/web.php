<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SuccessController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\DashboardSettingsController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/{id}', [HomeController::class, 'detail'])->name('product-detail');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/products', [DashboardProductsController::class, 'index'])->name('dashboard-products');
Route::get('/dashboard/products/{id}', [DashboardProductsController::class, 'detail'])->name('dashboard-products-detail');
Route::get('/dashboard/products/create', [DashboardProductsController::class, 'create'])->name('dashboard-products-create');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/success', [CartController::class, 'success'])->name('success');
Route::get('/register/success', [Auth\RegisteredUserController::class, 'success'])->name('success-registered');
Route::get('/dashboard/transactions', [DashboardTransactionController::class, 'index'])->name('dashboard-transactions');
Route::get('/dashboard/transactions/{id}', [DashboardTransactionController::class, 'detail'])->name('dashboard-transactions-detail');
Route::get('/dashboard/settings', [DashboardSettingsController::class, 'store'])->name('dashboard-settings');
Route::get('/dashboard/account', [DashboardSettingsController::class, 'account'])->name('dashboard-account');

// Hasil generate auth
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
