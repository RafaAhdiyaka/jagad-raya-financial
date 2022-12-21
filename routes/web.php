<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ReportController;

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
    return view('login.login');
});
Route::get('/dasboard', function () {
    return view('layouts.dashboard');
});
Route::get('/dashboardadmin', [DashboardController::class, 'index'])->name('dashboard')->middleware('admin');
Route::get('/dashboardpengguna', [DashboardController::class, 'index'])->name('dashboard')->middleware('pengguna');
Route::get('/report',[ReportController::class,'report']);


// Transaction
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
Route::get('/transaction/add',[TransactionController::class, 'create'])->name('add-transaction');
Route::post('/transaction/insert',[TransactionController::class, 'store'])->name('insert-transaction');
Route::get('/transaction/form-edit/{id}',[TransactionController::class, 'edit'])->name('form-edit-transaction');
Route::put('/transaction/update/{id}',[TransactionController::class, 'update'])->name('update-transaction');
Route::get('/transaction/delete/{id}',[TransactionController::class, 'destroy'])->name('delete-transaction');
Route::get('/transaction/exportpdf',[TransactionController::class, 'exportpdf'])->name('pdf-transaction');

// Pemasukan
Route::get('/income', [IncomeController::class, 'index'])->name('income');
Route::get('/income/add',[IncomeController::class, 'create'])->name('add-income');
Route::post('/income/insert',[IncomeController::class, 'store'])->name('insert-income');
Route::get('/income/form-edit/{id}',[IncomeController::class, 'edit'])->name('form-edit-income');
Route::put('/income/update/{id}',[IncomeController::class, 'update'])->name('update-income');
Route::get('/income/delete/{id}',[IncomeController::class, 'destroy'])->name('delete-income');
Route::get('/income/exportpdf',[IncomeController::class, 'exportpdf'])->name('pdf-income');

// Pengeluaran
Route::get('/outcome', [OutcomeController::class, 'index'])->name('outcome');
Route::get('/outcome/add',[OutcomeController::class, 'create'])->name('add-outcome');
Route::post('/outcome/insert',[OutcomeController::class, 'store'])->name('insert-outcome');
Route::get('/outcome/form-edit/{id}',[OutcomeController::class, 'edit'])->name('form-edit-outcome');
Route::put('/outcome/update/{id}',[OutcomeController::class, 'update'])->name('update-outcome');
Route::get('/outcome/delete/{id}',[OutcomeController::class, 'destroy'])->name('delete-outcome');
Route::get('/outcome/exportpdf',[OutcomeController::class, 'exportpdf'])->name('pdf-outcome');

// Login
route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
route::post('/login',[LoginController::class,'authenticate']);
route::post('/logout',[LoginController::class,'logout']);
route::get('/registrasi',[RegisterController::class,'index'])->name('registrasi');
route::post('/registrasi',[RegisterController::class,'store']);


// searchdate
// Route::get('/filtercategory', [CategoryController::class, 'filter'])->name('filter');
Route::get('/filterincome', [IncomeController::class, 'filter'])->name('filter');
Route::get('/filteroutcome', [OutcomeController::class, 'filter'])->name('filter');
Route::get('/filtertransaction', [TransactionController::class, 'filter'])->name('filter');

//grafik
Route::get('/grafik', [GrafikController::class, 'handleChart']);

//user
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/add',[UserController::class, 'create'])->name('add-user');
Route::post('/user/insert',[UserController::class, 'store'])->name('insert-user');
Route::get('/user/form-edit/{id}',[UserController::class, 'edit'])->name('form-edit-user');
Route::put('/user/update/{id}',[UserController::class, 'update'])->name('update-user');
Route::get('/user/delete/{id}',[UserController::class, 'destroy'])->name('delete-user');


Route::get('/chart', 'ChartController@index');

