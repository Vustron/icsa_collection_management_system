<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
      \App\Http\Middleware\LogHttpRequests::class,
    ];

    protected $middlewareGroups = [
        'web' => [

        ],

        'api' => [

        ],
    ];

    protected $middlewareAliases = [

    ];

    protected $middlewarePriority = [

    ];
}
