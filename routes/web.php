<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletController;

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
    return view('welcome');
});

// btc routes
Route::get('/btc/wallet/tx/list', [TransactionController::class, 'index'])->middleware(['auth'])->name('btc-tx-list');
Route::post('/btc/wallet/send',[TransactionController::class,'send'])->middleware(['auth'])->name('btc-post-send');
Route::get('/btc/wallet/receive/{wallet_name?}/{label?}',[TransactionController::class,'receive'])->middleware(['auth'])->name('btc-receive');
Route::get('/btc/wallet/tx/status',[TransactionController::class,'tx_status'])->middleware(['auth']);
Route::get('/btc/wallet/list',[WalletController::class,'index'])->middleware(['auth']);
Route::post('/btc/wallet/create',[WalletController::class,'create'])->middleware(['auth']);
Route::get('/btc/wallet/info',[WalletController::class,'show'])->middleware(['auth']);
Route::get('/receive',[TransactionController::class,'receive_form'])->middleware(['auth'])->name('receive');
Route::get('/send',[TransactionController::class,'send_form'])->middleware(['auth'])->name('send');
Route::get('/wallet_history',[WalletController::class,'wallet_history'])->middleware(['auth'])->name('history');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
