<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;

Route::get("/", [SignInController::class, "index"])->name("signin");
Route::post("/signin", [SignInController::class, "verify"])->name("signin.verify");

Route::get("/signup", [SignUpController::class, "index"])->name("signup");
Route::post("/signup", [SignUpController::class, "store"])->name(
    "signup.store"
);

Route::post("/logout", [SignInController::class, "logout"])->name("logout");