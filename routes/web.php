<?php

use Illuminate\Support\Facades\Route;
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

// Transaction
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
Route::get('/transaction/add',[TransactionController::class, 'create'])->name('add-transaction');
Route::post('/transaction/insert',[TransactionController::class, 'store'])->name('insert-transaction');
Route::get('/transaction/form-edit/{id}',[TransactionController::class, 'edit'])->name('form-edit-transaction');
Route::put('/transaction/update/{id}',[TransactionController::class, 'update'])->name('update-transaction');
Route::get('/transaction/delete/{id}',[TransactionController::class, 'destroy'])->name('delete-transaction');