<?php
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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('home');
});
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/post-login', [AuthController::class, 'postlogin']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/post-register', [AuthController::class, 'postregister']);
Route::get('/logout', [AuthController::class, 'logout']);

// Memastikan route di dalam grup hanya dapat diakses jika user sudah login sebagai admin
Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit']);
    Route::post('/barang/{id}/update', [BarangController::class, 'update']);
    Route::get('/barang/{id}/delete', [BarangController::class, 'delete']);

    Route::post('/users/create', [UserController::class, 'create']);
    Route::get('/users/{id}/edit', [UserController::class, 'edit']);
    Route::post('/users/{id}/update', [UserController::class, 'update']);
    Route::get('/users/{id}/delete', [UserController::class, 'delete']);

    
    
});

// Memastikan route di dalam grup hanya dapat diakses jika user sudah login sebagai admin atau pengguna
Route::middleware(['auth', 'checkRole:admin,pengguna'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/barangs', [BarangController::class, 'index']);
    Route::get('/barang/{id}/detail', [BarangController::class, 'detail']);
    Route::post('/barang/create', [BarangController::class, 'create']);

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}/detail', [UserController::class, 'detail']);
});
