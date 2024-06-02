<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\BankController::class, 'account'])->name('index');
Route::get('/deposit', [App\Http\Controllers\BankController::class, 'deposit'])->name('bank.deposit');
Route::get('/withdraw', [App\Http\Controllers\BankController::class, 'withdraw'])->name('bank.withdraw');

Route::post('/deposit-store', [App\Http\Controllers\BankController::class, 'depositStore'])->name('bank.deposit.store');
Route::post('/withdraw-store', [App\Http\Controllers\BankController::class, 'withdrawStore'])->name('bank.withdraw.store');

