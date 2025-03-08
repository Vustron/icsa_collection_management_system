<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('page_title') | ICSA CMS</title>
        <link rel="icon" type="image/png" href="{{ asset('images/icsa_logo.png') }}">

        {{-- resources --}}
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>

    <body class="min-h-screen bg-purple-50 bg-[url('/public/images/bg.png')] bg-cover bg-center">
        <div class="grid min-h-screen w-full grid-cols-1 lg:grid-cols-2">
            {{-- Left Column - Hero Section --}}
            <div
                class="relative hidden min-h-[300px] flex-col items-center justify-center p-4 before:absolute before:inset-0 before:bg-black/50 before:content-[''] lg:flex lg:min-h-screen">
                <img src="{{ asset('images/icsa_logo.png') }}" alt="ICSA Logo" class="z-10 mb-4 size-32">
                <h2 class="z-10 text-center text-xl font-bold text-white lg:text-2xl xl:text-3xl">
                    ICSACMS: Institute of Computing Student Association Collection Management System
                </h2>
            </div>

            {{-- Right Column - Sign-in Form --}}
            <div
                class="flex flex-col items-center justify-center bg-[url('/public/images/bg.png')] bg-cover bg-center p-4 lg:bg-[#ededed] lg:bg-[url('')]">
                <img src="{{ asset('images/icsa_logo.png') }}" alt="ICSA Logo" class="z-10 mb-4 h-24 w-24 lg:hidden"
                    style="ba">
                <h2
                    class="z-10 mb-5 max-w-xl text-center text-xl font-bold text-white lg:hidden lg:text-2xl xl:text-3xl">
                    ICSACMS: Institute of Computing Student Association Collection Management System
                </h2>
                <div class="w-full max-w-[350px] space-y-8">
                    {{ $slot }}
                </div>
                <span class="pt-4 text-sm text-gray-500">
                    © {{ date('Y') }} {{ config('app.short_name', 'ICSA CMS') }}. All rights reserved.
                </span>
            </div>
        </div>
        @yield('raw_js_scripts')
    </body>

</html>
