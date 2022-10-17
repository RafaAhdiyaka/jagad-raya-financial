<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', function () {
    return view('layouts.main');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');




// Transaction
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
Route::get('/transaction/add',[TransactionController::class, 'create'])->name('add-transaction');
Route::post('/transaction/insert',[TransactionController::class, 'store'])->name('insert-transaction');
Route::get('/transaction/form-edit/{id}',[TransactionController::class, 'edit'])->name('form-edit-transaction');
Route::put('/transaction/update/{id}',[TransactionController::class, 'update'])->name('update-transaction');
Route::get('/transaction/delete/{id}',[TransactionController::class, 'destroy'])->name('delete-transaction');

// Pemasukan
Route::get('/income', [IncomeController::class, 'index'])->name('income');
Route::get('/income/add',[IncomeController::class, 'create'])->name('add-income');
Route::post('/income/insert',[IncomeController::class, 'store'])->name('insert-income');
Route::get('/income/form-edit/{id}',[IncomeController::class, 'edit'])->name('form-edit-income');
Route::put('/income/update/{id}',[IncomeController::class, 'update'])->name('update-income');
Route::get('/income/delete/{id}',[IncomeController::class, 'destroy'])->name('delete-income');

// Kategori
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/add',[CategoryController::class, 'create'])->name('add-category');
Route::post('/category/insert',[CategoryController::class, 'store'])->name('insert-category');
Route::get('/category/form-edit/{id}',[CategoryController::class, 'edit'])->name('form-edit-category');
Route::put('/category/update/{id}',[CategoryController::class, 'update'])->name('update-category');
Route::get('/category/delete/{id}',[CategoryController::class, 'destroy'])->name('delete-category');