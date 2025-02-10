<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;

Route::get("/", [SignInController::class, "index"])->name("signin");
Route::post("/signin", [SignInController::class, "verify"])->name(
    "signin.verify"
);

Route::get("/signup", [SignUpController::class, "index"])->name("signup");
Route::post("/signup", [SignUpController::class, "store"])->name(
    "signup.store"
);

Route::get("forgot_password", [
    SignInController::class,
    "forgot_password",
])->name("forgot_password");
Route::post("forgot_password/verify_email", [
    SignInController::class,
    "verify_email",
])->name("forgot_password.verify_email");
Route::post("forgot_password/verify_code", [
    SignInController::class,
    "verify_code",
])->name("forgot_password.verify_code");
Route::post("forgot_password/change_password", [
    SignInController::class,
    "change_password",
])->name("forgot_password.change_password");

Route::post("/logout", [SignInController::class, "logout"])->name("logout");
