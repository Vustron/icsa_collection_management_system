<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminManagerController;

Route::controller(AdminManagerController::class)
    ->name("admin_manager.")
    ->group(function () {
        Route::get("/", "index")->name("index");
        Route::get("/create", "create")->name("create");
        Route::post("/", "store")->name("store");
        Route::get("/{id}", "show")->name("show");
        Route::get("/{id}/edit", "edit")->name("edit");
        Route::put("/{id}", "update")->name("update");
        Route::delete("/{id}", "destroy")->name("destroy");
        Route::post("/new_role", "new_admin_role")->name("new_admin_role");
        Route::post("/update_admin_detail", "update_admin_details")->name("update_admin_details");
    });
