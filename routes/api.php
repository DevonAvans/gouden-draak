<?php

use App\Http\Controllers\CashRegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1/orders', [CashRegisterController::class, 'index'])->name('cashregister.api.index');
Route::post('v1/orders', [CashRegisterController::class, 'store'])->name('cashregister.api.post');
Route::delete('v1/orders', [CashRegisterController::class, 'destroy'])->name('cashregister.api.destroy');
