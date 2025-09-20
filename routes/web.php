<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AdminController::class,'index'])->name('index');
Route::get('/tc',[AdminController::class,'tc'])->name('tc');
Route::get('/privacy',[AdminController::class,'privacy'])->name('privacy');
