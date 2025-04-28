<?php

use App\Http\Controllers\API\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user',[UserController::class,'index' ])->name('user.index');
Route::post('/user',[UserController::class,'store' ])->name('user.store');
Route::post('/user/{id}',[UserController::class,'update' ])->name('user.update');
Route::post('/user/{id}',[UserController::class,'destroy' ])->name('user.destroy');
