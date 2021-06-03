<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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

//------------------------------------admin------------------------------------------------//
//admin akses fitur list pengguna
Route::get('redirects/listpengguna',[AdminController::class,'listpengguna']);
Route::put('redirects/listpengguna',[AdminController::class,'updatepengguna']);
Route::delete('redirects/listpengguna',[AdminController::class,'destroypengguna']);
//admin akses fitur list order
Route::get('redirects/listorder',[AdminController::class,'listorder']);
Route::put('redirects/listorder',[AdminController::class,'updateorder']);
Route::delete('redirects/listorder',[AdminController::class,'destroyorder']);
//admin akses fitur list pembayaran
Route::get('redirects/listpembayaran',[AdminController::class,'listpembayaran']);
Route::delete('redirects/listpembayaran',[AdminController::class,'destroypembayaran']);

//------------------------------------user------------------------------------------------//