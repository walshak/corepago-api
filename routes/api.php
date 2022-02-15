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
Route::get('/btc/wallet/tx/list', [TransactionController::class, 'index']);
Route::post('/btc/wallet/send',[TransactionController::class,'send']);
Route::get('/btc/wallet/recieve',[TransactionController::class,'recieve']);
Route::get('/btc/wallet/tx/status',[TransactionController::class,'tx_status']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

