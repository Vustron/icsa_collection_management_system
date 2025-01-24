<?php

use Illuminate\Support\Facades\Route;

E erase rani ayaw lang sa e butang sa main. 
ako rang gi try if goods ba ang dagan sa layout

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/student_list', function () {
    return view('student_list.index');
})->name('student_list');

Route::get('/payment_management', function () {
    return view('payment_management.index');
})->name('payment_management');

Route::get('/collection_categories', function () {
    return view('collection_categories.index');
})->name('collection_categories');

Route::get('/transaction', function () {
    return view('transaction.index');
})->name('transaction');

Route::get('/reports', function () {
    return view('reports.index');
})->name('reports');

Route::get('/calendar', function () {
    return view('calendar.index');
})->name('calendar');

Route::get('/feedback', function () {
    return view('feedback.index');
})->name('feedback');

Route::get('/user', function () {
    return view('activity.user.index');
})->name('activity.user');

Route::get('/admin', function () {
    return view('activity.admin.index');
})->name('activity.admin');

Route::get('/system', function () {
    return view('activity.system.index');
})->name('activity.system');
