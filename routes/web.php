<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
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
    return view('index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// admin/pengguna login
Route::get('redirects',[IndexController::class,'index']);
//admin akses fitur list pengguna
Route::get('redirects/listpengguna',[IndexController::class,'listpengguna']);
Route::put('redirects/listpengguna',[IndexController::class,'updatepengguna']);
Route::delete('redirects/listpengguna',[IndexController::class,'destroypengguna']);
//admin akses fitur list order
Route::get('redirects/listorder',[IndexController::class,'listorder']);
Route::put('redirects/listorder',[IndexController::class,'updateorder']);
Route::delete('redirects/listorder',[IndexController::class,'destroyorder']);
//admin akses fitur list pembayaran
Route::get('redirects/listpembayaran',[IndexController::class,'listpembayaran']);
Route::delete('redirects/listpembayaran',[IndexController::class,'destroypembayaran']);