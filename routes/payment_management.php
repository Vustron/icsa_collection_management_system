<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentManagementController;

// Payment Management Routes
Route::controller(PaymentManagementController::class)
    ->name("payment_management.")
    ->group(function () {
        Route::get("/", "index")->name("index");
        Route::get("/create", "create")->name("create");
        Route::post("/", "store")->name("store");
        Route::get("/{id}", "show")->name("show");
        Route::get("/{id}/edit", "edit")->name("edit");
        Route::put("/{id}", "update")->name("update");
        Route::delete("/{id}", "destroy")->name("destroy");

        Route::get("/{id}/view/{fee_id}", "view_student_fee")->name(
            "view_student.view_fee"
        );
    });
