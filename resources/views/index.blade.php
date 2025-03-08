@section('page_title', 'Sign-in')

@section('raw_css_links')
    <style>
        .login-card {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-input:focus {
            box-shadow: 0 0 0 2px rgba(124, 58, 237, 0.2);
        }

        .error-badge {
            animation: errorIn 0.3s ease-out;
        }

        .error-message {
            animation: shake 0.5s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
        }

        @keyframes shake {

            10%,
            90% {
                transform: translateX(-1px);
            }

            20%,
            80% {
                transform: translateX(2px);
            }

            30%,
            50%,
            70% {
                transform: translateX(-2px);
            }

            40%,
            60% {
                transform: translateX(2px);
            }
        }

        @keyframes errorIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
@endsection

@section('raw_js_scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Form submission
            const form = document.querySelector('form');
            const submitBtn = document.getElementById('submitBtn');
            const buttonLoader = document.querySelector('.buttonLoader');
            const buttonText = document.querySelector('.buttonText');

            form.addEventListener('submit', function(e) {
                // Make sure CSRF token is present
                const csrfToken = document.querySelector('input[name="_token"]');
                if (!csrfToken || !csrfToken.value) {
                    e.preventDefault();
                    alert('Security token missing. Please refresh the page and try again.');
                    return;
                }

                if (submitBtn.disabled) {
                    e.preventDefault();
                    return;
                }

                // Disable buttons but NOT the CSRF token input
                const formButtons = this.querySelectorAll('button');
                formButtons.forEach(button => {
                    if (button !== togglePassword) {
                        button.disabled = true;
                    }
                });

                // Update button state
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-70', 'cursor-not-allowed');
                buttonLoader.classList.remove('hidden');
                buttonText.textContent = 'Signing In...';
            });

            // Password visibility toggle
            const togglePassword = document.getElementById('togglePassword');
            if (togglePassword) {
                togglePassword.addEventListener('click', function() {
                    const passwordInput = document.getElementById('password');
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    this.innerHTML = type === 'password' ?
                        '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>' :
                        '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd"/><path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z"/></svg>';
                });
            }
        });
    </script>
@endsection

<x-login_layout>
    @if ($errors->has('not_authorized'))
        <div
            class="error-badge mb-4 flex items-center justify-center rounded-md border border-red-200 bg-red-50 p-3 shadow-sm">
            <div class="mr-3 flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-red-100">
                <svg class="h-5 w-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-red-800">{{ $errors->first('not_authorized') }}</p>
            </div>
        </div>
    @endif

    <x-ui.card.body class="login-card w-auto border border-purple-100 shadow-lg">
        <x-ui.card.header class="pb-6">
            <x-ui.card.title class="text-center text-2xl font-extrabold text-purple-900">
                Administrator
            </x-ui.card.title>
            <x-ui.card.description class="text-center text-base text-gray-600">
                Welcome back! Please sign-in to continue
            </x-ui.card.description>
        </x-ui.card.header>

        <x-ui.card.content>
            <form action="{{ route('signin.verify') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    {{-- Email Input --}}
                    <div class="space-y-2">
                        <x-ui.form.label for="email" class="text-gray-700">
                            <span>Email</span>
                        </x-ui.form.label>
                        <div class="relative">
                            <div
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                    </path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                            </div>
                            <x-ui.form.input type="email" name="email" id="email"
                                placeholder="Your valid email address" required min="1" maxlength="255"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="{{ old('email') }}"
                                title="Please enter a valid email address" aria-label="Email address"
                                autocomplete="email"
                                class="form-input {{ $errors->has('email') ? 'border-red-300 focus:border-red-500 focus:ring-red-200' : '' }} border-gray-300 pl-10 focus:border-purple-400 focus:ring focus:ring-purple-200 focus:ring-opacity-50" />
                        </div>
                        @if ($errors->has('email'))
                            <div class="error-badge mt-1 flex items-center space-x-1 rounded-md bg-red-50 px-2 py-1">
                                <svg class="h-4 w-4 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="font-small text-xs text-red-800">{{ $errors->first('email') }}</span>
                            </div>
                        @endif
                    </div>

                    {{-- Password Input --}}
                    <div class="space-y-2">
                        <x-ui.form.label for="password" class="text-gray-700">
                            <span>Password</span>
                        </x-ui.form.label>
                        <div class="relative">
                            <div
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <x-ui.form.input type="password" name="password" id="password"
                                placeholder="Your current password" required minlength="1" maxlength="64"
                                aria-label="Password" autocomplete="current-password"
                                class="form-input {{ $errors->has('password') ? 'border-red-300 focus:border-red-500 focus:ring-red-200' : '' }} border-gray-300 pl-10 pr-10 focus:border-purple-400 focus:ring focus:ring-purple-200 focus:ring-opacity-50" />
                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-0 flex cursor-pointer items-center pr-3 text-gray-400 hover:text-gray-600">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd"
                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        @if ($errors->has('password'))
                            <div class="error-badge mt-1 flex items-center space-x-1 rounded-md bg-red-50 px-2 py-1">
                                <svg class="h-4 w-4 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-xs font-medium text-red-800">{{ $errors->first('password') }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" type="checkbox" name="remember"
                                class="h-4 w-4 rounded border-gray-300 text-purple-600 focus:ring-purple-500">
                            <label for="remember-me" class="ml-2 text-sm font-medium text-gray-700">
                                Remember me
                            </label>
                        </div>
                        {{-- Forgot Password --}}
                        <a href="{{ route('forgot_password') }}"
                            class="text-sm font-medium text-purple-600 hover:text-purple-800">
                            Forgot password?
                        </a>
                    </div>

                    {{-- Submit Button --}}
                    <x-ui.button.dynamic-button type="submit" variant="default" size="default"
                        class="submitBtn relative w-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white transition hover:from-purple-700 hover:to-indigo-700 focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-70"
                        id="submitBtn">
                        <span class="buttonText">Sign in</span>
                        <svg class="buttonLoader ml-2 hidden h-5 w-5 animate-spin" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </x-ui.button.dynamic-button>

                    {{-- <div class="relative my-4">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="bg-white px-2 text-gray-500">or</span>
                        </div>
                    </div>

                    <a href="#" class="flex h-11 w-full items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50">
                        <x-bi-google class="text-red-500" />
                        <span>Sign in with Google</span>
                    </a> --}}
                </div>
            </form>
        </x-ui.card.content>
    </x-ui.card.body>
</x-login_layout>
