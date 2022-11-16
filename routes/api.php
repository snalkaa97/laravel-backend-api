<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PegawaiController;

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

Route::group(['middleware'=> ['auth:sanctum']], function(){
    // Route::get('/profile', function (Request $request) {
    //     return auth()->user();
    // });
    Route::get('pegawai',[PegawaiController::class, 'index']);
    Route::post('pegawai',[PegawaiController::class, 'store']);
    Route::put('pegawai/{id}',[PegawaiController::class, 'update']);
    Route::delete('pegawai/{id}',[PegawaiController::class, 'destroy']);
    Route::post('/logout',[AuthController::class, 'logout']);
    Route::post('/verify_token',[AuthController::class, 'verify_token']);
});
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);
