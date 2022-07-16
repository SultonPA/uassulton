<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PengunjungController;
use App\Http\Controllers\API\TransaksiController;
use App\Http\Controllers\API\KaryawanController;
use App\Http\Controllers\API\KamarController;
use App\Http\Controllers\API\Detail_transaksiController;

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
Route::get('password', function () {
     return bcrypt('sulton');
});




//pengunjung
Route::get('/pengunjung', [PengunjungController::class, 'index']);
Route::get('/pengunjung/{id}', [PengunjungController::class, 'show']);
// tambah pengunjung
Route::post('/pengunjung', [PengunjungController::class, 'store']);
//delete
Route::delete('/pengunjung/{id}', [PengunjungController::class, 'destroy']);
Route::patch('/pengunjung/{id}', [PengunjungController::class, 'update']);



//transaksi
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/transaksi/{id}', [TransaksiController::class, 'show']);
//delete
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy']);
//tambah transaksi
Route::post('/transaksi', [TransaksiController::class, 'store']);
Route::patch('/transaksi/{id}', [TransaksiController::class, 'update']);



//karyawan
Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::get('/karyawan/{id}', [KaryawanController::class, 'show']);
//delete
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy']);
//tambah karyawan
Route::post('/karyawan', [KaryawanController::class, 'store']);
Route::patch('/karyawan/{id}', [KaryawanController::class, 'update']);



//kamar
Route::get('/kamar', [KamarController::class, 'index']);
Route::get('/kamar/{id}', [KamarController::class, 'show']);
//delete
Route::delete('/kamar/{id}', [KamarController::class, 'destroy']);
Route::post('/kamar', [KamarController::class, 'store']);
Route::patch('/kamar/{id}', [KamarController::class, 'update']);



//detail
Route::get('/detail', [Detail_transaksiController::class, 'index']);
Route::get('/detail/{id}', [Detail_transaksiController::class, 'show']);
//delete
Route::delete('/detail/{id}', [Detail_transaksiController::class, 'destroy']);
Route::post('/detail', [Detail_transaksiController::class, 'store']);
Route::patch('/detail/{id}', [Detail_transaksiController::class, 'update']);




//jwt
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'login']);
    Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [App\Http\Controllers\AuthController::class, 'me']);

});
