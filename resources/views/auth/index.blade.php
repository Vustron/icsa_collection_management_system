<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign-up | ICSA CMS</title>
        <link rel="icon" type="image/png" href="{{ asset('images/icsa_logo.png') }}">
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>

    <body class="min-h-screen bg-gray-50">
        <div class="grid min-h-screen w-full grid-cols-1 lg:grid-cols-2">
            {{-- Left Column - Hero Section --}}
            <div class="relative hidden lg:block">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-indigo-600 opacity-90"></div>
                <div class="absolute inset-0 bg-[url('/public/images/bg.png')] bg-cover bg-center mix-blend-overlay">
                </div>
                <div class="relative z-10 flex h-full flex-col items-center justify-center p-12 text-white">
                    <img src="{{ asset('images/icsa_logo.png') }}" alt="ICSA Logo" class="animate-float mb-8 h-24 w-24">
                    <h2 class="mb-6 text-center text-3xl font-bold tracking-tight">
                        Institute of Computing<br>Student Association
                    </h2>
                    <p class="max-w-md text-center text-lg text-gray-100">
                        Welcome to the ICSA Collection Management System. Streamline student payments and manage
                        finances efficiently.
                    </p>
                    <div class="mt-12 flex space-x-4">
                        <a href="#"
                            class="rounded-full bg-white bg-opacity-20 px-6 py-2 font-medium text-white backdrop-blur-sm transition hover:bg-opacity-30">Learn
                            More</a>
                        <a href="{{ route('login') }}"
                            class="rounded-full bg-white px-6 py-2 font-medium text-purple-600 transition hover:bg-gray-100">Sign
                            In</a>
                    </div>
                </div>
            </div>

            {{-- Right Column - Sign-up Form --}}
            <div class="flex flex-col items-center justify-center bg-white p-8 shadow-lg lg:shadow-none">
                <div class="w-full max-w-md">
                    <div class="mb-8 text-center lg:hidden">
                        <img src="{{ asset('images/icsa_logo.png') }}" alt="ICSA Logo" class="mx-auto mb-4 h-16 w-16">
                        <h2 class="text-2xl font-bold text-gray-900">ICSA CMS</h2>
                        <p class="text-gray-600">Collection Management System</p>
                    </div>

                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-900">Create an Account</h2>
                        <p class="text-gray-600">Join our platform to manage collection efficiently</p>
                    </div>

                    <form action="{{ route('signup.store') }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- Username Input --}}
                        <div>
                            <label for="user_name" class="mb-1 block text-sm font-medium text-gray-700">Username</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <input type="text" name="user_name" id="user_name"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 py-3 pl-10 pr-3 text-gray-900 focus:border-purple-500 focus:outline-none focus:ring-1 focus:ring-purple-500"
                                    placeholder="Choose a username" required maxlength="255"
                                    value="{{ old('user_name') }}" />
                            </div>
                            @error('user_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email Input --}}
                        <div>
                            <label for="email" class="mb-1 block text-sm font-medium text-gray-700">Email</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </span>
                                <input type="email" name="email" id="email"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 py-3 pl-10 pr-3 text-gray-900 focus:border-purple-500 focus:outline-none focus:ring-1 focus:ring-purple-500"
                                    placeholder="Your email address" required maxlength="255"
                                    value="{{ old('email') }}" />
                            </div>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Password Input --}}
                        <div>
                            <label for="password" class="mb-1 block text-sm font-medium text-gray-700">Password</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <input type="password" name="password" id="password"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 py-3 pl-10 pr-10 text-gray-900 focus:border-purple-500 focus:outline-none focus:ring-1 focus:ring-purple-500"
                                    placeholder="Create a password" required minlength="8" maxlength="64" />
                                <button type="button" id="togglePassword"
                                    class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Confirm Password Input --}}
                        <div>
                            <label for="password_confirmation"
                                class="mb-1 block text-sm font-medium text-gray-700">Confirm Password</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 py-3 pl-10 pr-3 text-gray-900 focus:border-purple-500 focus:outline-none focus:ring-1 focus:ring-purple-500"
                                    placeholder="Confirm your password" required minlength="8" maxlength="64" />
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit" id="submitBtn"
                            class="mt-4 flex w-full items-center justify-center rounded-lg bg-gradient-to-r from-purple-600 to-indigo-600 py-3 text-center font-medium text-white shadow-md transition hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                            <span id="buttonText">Create Account</span>
                            <svg id="buttonLoader" class="ml-2 hidden h-5 w-5 animate-spin"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </button>
                    </form>

                    <div class="mt-8 text-center text-sm text-gray-600">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-medium text-purple-600 hover:text-purple-500">Sign
                            in</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Form submission
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
                text.textContent = 'Creating Account...';
            });

            // Password visibility toggle
            document.getElementById('togglePassword').addEventListener('click', function() {
                const passwordInput = document.getElementById('password');
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle icon
                const eyeIcon = this.querySelector('svg');
                if (type === 'text') {
                    eyeIcon.innerHTML =
                        '<path d="M10 12a2 2 0 100-4 2 2 0 000 4z" /><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />';
                } else {
                    eyeIcon.innerHTML =
                        '<path fill-rule="evenodd" d="M3.28 2.22a.75.75 0 00-1.06 1.06l14.5 14.5a.75.75 0 101.06-1.06l-1.745-1.745a10.029 10.029 0 003.3-4.38 1.651 1.651 0 000-1.185A10.004 10.004 0 009.999 3a9.956 9.956 0 00-4.744 1.194L3.28 2.22zM7.752 6.69l1.092 1.092a2.5 2.5 0 013.374 3.373l1.091 1.092a4 4 0 00-5.557-5.557z" clip-rule="evenodd" /><path d="M10.748 13.93l2.523 2.523a9.987 9.987 0 01-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 010-1.186A10.007 10.007 0 012.839 6.02L6.07 9.252a4 4 0 004.678 4.678z" />';
                }
            });

            // Add animation class
            document.addEventListener('DOMContentLoaded', function() {
                const styles = document.createElement('style');
                styles.textContent = `
                    @keyframes float {
                        0% { transform: translateY(0px); }
                        50% { transform: translateY(-10px); }
                        100% { transform: translateY(0px); }
                    }
                    .animate-float {
                        animation: float 3s ease-in-out infinite;
                    }
                `;
                document.head.appendChild(styles);
            });
        </script>
    </body>
</html>
