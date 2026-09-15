<?php
use App\Http\Controllers\AuthController; use App\Http\Controllers\SaleController; use Illuminate\Support\Facades\Route;
Route::redirect('/', '/sales');
Route::middleware('guest')->group(function(){Route::get('/login',[AuthController::class,'create'])->name('login');Route::post('/login',[AuthController::class,'store'])->name('login.store');});
Route::post('/logout',[AuthController::class,'destroy'])->middleware('auth')->name('logout');
Route::get('/sales',[SaleController::class,'index'])->middleware('auth')->name('sales.index');
Route::post('/sales',[SaleController::class,'store'])->middleware('auth')->name('sales.store');
