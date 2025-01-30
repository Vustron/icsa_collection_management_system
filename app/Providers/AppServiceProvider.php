<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::share(
            "errors",
            \Illuminate\Support\Facades\Session::get("errors") ?:
            new \Illuminate\Support\ViewErrorBag()
        );
    }
}
