<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentListController;

// Student List Routes
Route::controller(StudentListController::class)
    ->name("student_list.")
    ->group(function () {
        Route::get("/", "index")->name("index");
        Route::get("/{id}/edit", "edit")->name("edit");

        Route::get("/{id}", "show")->name("student.show");
        Route::put("/{id}", "update")->name("update");
        Route::post("/", "store")->name("store");
        Route::delete("/{id}", "destroy")->name("destroy");

        Route::get("/{id}/fees/{fee_id}", "show_fee")->name("show_fee");
        Route::get("/{id}/payment/{payment_id}", "show_payment")->name(
            "show_payment"
        );
        Route::get(
            "/{id}/payment_submission/{payment_id}",
            "show_payment_submission"
        )->name("show_payment_submission");
    });
