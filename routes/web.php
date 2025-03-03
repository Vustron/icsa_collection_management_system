<?php

use Illuminate\Support\Facades\Route;

Route::prefix("iccms")->group(function () {
    Route::middleware("guest")->group(function () {
        require base_path("routes/auth.php");
    });

    Route::middleware("auth")->group(function () {
        Route::prefix("dashboard")->group(base_path("routes/dashboard.php"));
        Route::prefix("student_list")->group(
            base_path("routes/student_list.php")
        );
        Route::prefix("transaction")->group(
            base_path("routes/transaction.php")
        );
        Route::prefix("calendar")->group(base_path("routes/calendar.php"));
        Route::prefix("feedback")->group(base_path("routes/feedback.php"));
        Route::prefix("my_account")->group(base_path("routes/my_account.php"));
        Route::prefix("payment_management")->group(
            base_path("routes/payment_management.php")
        );

        Route::middleware("admin:1,2")->group(function () {
            Route::prefix("collection_categories")->group(
                base_path("routes/collection_categories.php")
            );
            Route::prefix("reports")->group(base_path("routes/reports.php"));
            Route::prefix("admin_manager")->group(
                base_path("routes/admin_manager.php")
            );

            require base_path("routes/activity.php");
        });
    });
});
