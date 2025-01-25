<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            // change lang ang outer prefix if i ilis ang first url name 
            // deri rapud mo pang add og mga middlewares or unsa ba
            Route::prefix('icmms')->group(function () {
                Route::prefix('dashboard')->group(base_path('routes/dashboard.php'));
                Route::prefix('student_list')->group(base_path('routes/student_list.php'));
                Route::prefix('payment_management')->group(base_path('routes/payment_management.php'));
                Route::prefix('collection_categories')->group(base_path('routes/collection_categories.php'));
                Route::prefix('transaction')->group(base_path('routes/transaction.php'));
                Route::prefix('reports')->group(base_path('routes/reports.php'));
                Route::prefix('calendar')->group(base_path('routes/calendar.php'));
                Route::prefix('feedback')->group(base_path('routes/feedback.php'));
                Route::group([], function () {
                    require base_path('routes/sign_in.php');
                    require base_path('routes/activity.php');
                });
            });
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
