<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\TranslationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', [AuthController::class,'login']);
Route::middleware('auth:api')->group(function () {
    Route::resource('/translation', TranslationController::class);
});
