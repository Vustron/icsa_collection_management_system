<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign-in | ICSA CMS</title>
        <link rel="icon" type="image/png" href="{{ asset('images/icsa_logo.png') }}">
        {{-- resources --}}
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>

    <body class="min-h-screen bg-background">
        <div class="grid min-h-screen w-full grid-cols-1 lg:grid-cols-2">
            {{-- Left Column - Hero Section --}}
            <div
                class="relative hidden min-h-[300px] flex-col items-center justify-center bg-[url('/public/images/bg.png')] bg-cover bg-center p-4 before:absolute before:inset-0 before:bg-black/50 before:content-[''] lg:flex lg:min-h-screen">
                <img src="{{ asset('images/icsa_logo.png') }}" alt="ICSA Logo" class="z-10 mb-4 size-32">
                <h2 class="z-10 text-center text-xl font-bold text-white lg:text-2xl xl:text-3xl">
                    ICSACMS: Institute of Computing Student Association Collection Management System
                </h2>
            </div>

            {{-- Right Column - Sign-in Form --}}
            <div class="flex flex-col items-center justify-center p-4">
                <div class="w-full max-w-[400px] space-y-8">
                    <x-ui.card.body>
                        <x-ui.card.header>
                            <x-ui.card.title>
                                Sign In
                            </x-ui.card.title>
                            <x-ui.card.description>
                                Welcome back! Please sign-in to continue
                            </x-ui.card.description>
                        </x-ui.card.header>

                        <x-ui.card.content>
                            <form action="#" method="POST">
                                @csrf
                                <div class="space-y-4">
                                    {{-- Email Input --}}
                                    <div class="space-y-2">
                                        <x-ui.form.label for="email">
                                            Email
                                        </x-ui.form.label>
                                        <x-ui.form.input type="email" name="email" id="email"
                                            placeholder="Your email address" required min="1" maxlength="255"
                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                            title="Please enter a valid email address" aria-label="Email address"
                                            autocomplete="email" />
                                    </div>

                                    {{-- Password Input --}}
                                    <div class="space-y-2">
                                        <x-ui.form.label for="password">
                                            Password
                                        </x-ui.form.label>
                                        <x-ui.form.input placeholder="Your password" type="password" name="password"
                                            id="password" required minlength="1" maxlength="64" aria-label="Password"
                                            autocomplete="current-password" />
                                    </div>

                                    {{-- Forgot Password --}}
                                    <div class="flex items-center justify-between">
                                        <a href="#" class="text-xs text-primary hover:underline">
                                            Forgot password?
                                        </a>
                                    </div>

                                    {{-- Submit Button --}}
                                    <x-ui.button.dynamic-button type="submit" variant="default" size="default"
                                        id="submitBtn" class="w-full">
                                        Sign in
                                    </x-ui.button.dynamic-button>
                                </div>
                            </form>
                        </x-ui.card.content>
                    </x-ui.card.body>
                </div>
            </div>
        </div>

        <script>
            document.querySelector('form').addEventListener('submit', function(e) {
                const formInputs = this.querySelectorAll('input');
                const button = document.getElementById('submitBtn');
                const loader = document.getElementById('buttonLoader');
                const text = document.getElementById('buttonText');

                formInputs.forEach(input => {
                    input.disabled = true;
                });

                button.disabled = true;
                loader.classList.remove('hidden');
                text.textContent = 'Signing in...';
            });
        </script>
    </body>
</html>
