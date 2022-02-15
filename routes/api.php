<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//auth routes
Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class,'logout']);
Route::get('/btc/wallet/tx/list', [TransactionController::class, 'index'])->middleware(['auth:sanctum']);
Route::post('/btc/wallet/send',[TransactionController::class,'send'])->middleware(['auth:sanctum']);
Route::get('/btc/wallet/recieve',[TransactionController::class,'recieve'])->middleware(['auth:sanctum']);
Route::get('/btc/wallet/tx/status',[TransactionController::class,'tx_status'])->middleware(['auth:sanctum']);
Route::get('/btc/wallet/list',[WalletController::class,'index'])->middleware(['auth:sanctum']);
Route::post('/btc/wallet/create',[WalletController::class,'create'])->middleware(['auth:sanctum']);
Route::get('/btc/wallet/info',[WalletController::class,'show'])->middleware(['auth:sanctum']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

