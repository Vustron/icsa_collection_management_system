<?php

use Illuminate\Support\Facades\Route;

/*
    |--------------------------------------------------------------------------
    |                          Please Read
    |--------------------------------------------------------------------------
    |
    | check ninyu ang /bootstrap/cache/app.php
    | naa didtua ang mga routes then follow lang ang mga address 
    |
    |
    */

    // gi butang naku deri kay na notice naku nga slow kaayu ang pag switch niya po.

Route::prefix("iccms")->group(function () {
    Route::prefix("dashboard")->group(
        base_path("routes/dashboard.php")
    );
    Route::prefix("student_list")->group(
        base_path("routes/student_list.php")
    );
    Route::prefix("payment_management")->group(
        base_path("routes/payment_management.php")
    );
    Route::prefix("collection_categories")->group(
        base_path("routes/collection_categories.php")
    );
    Route::prefix("transaction")->group(
        base_path("routes/transaction.php")
    );
    Route::prefix("reports")->group(
        base_path("routes/reports.php")
    );
    Route::prefix("calendar")->group(
        base_path("routes/calendar.php")
    );
    Route::prefix("feedback")->group(
        base_path("routes/feedback.php")
    );
    Route::group([], function () {
        require base_path("routes/auth.php");
        require base_path("routes/activity.php");
    });
});
