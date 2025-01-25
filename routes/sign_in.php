<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignInController;

Route::get('/', [SignInController::class, 'index'])->name('sign_in');
Route::post('/', [SignInController::class, 'verify'])->name('sign_in.verify');
