<?php

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

// API
Route::get('/getallusers', [App\Http\Controllers\ApiController::class, 'getAllUser'])->name('getAllUser');
Route::get('/getuserbyemail/{email}', [App\Http\Controllers\ApiController::class, 'getUserByEmail'])->name('getUserByEmail');

Route::get('/getallhistory', [App\Http\Controllers\ApiController::class, 'getAllHistory'])->name('getAllHistory');
Route::get('/gethistorybyemail/{email}', [App\Http\Controllers\ApiController::class, 'getHistoryByEmail'])->name('getHistoryByEmail');

Route::put('/transaction/{email}', [App\Http\Controllers\ApiController::class, 'transaction'])->name('transaction');
