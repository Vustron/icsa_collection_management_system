@section('page_title', 'Sign-in')

{{-- e butang here ang mga links na customized specifically for this page aron dele mag conflict sa uban --}}
@section('raw_css_links')
@endsection

@section('js_links')
@endsection

@section('raw_js_scripts')
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const formInputs = this.querySelectorAll(
                'input:not([name="_token"]):not([name="email"]):not([name="password"]):not([name="remember"])');
            const button = this.querySelector('.submitBtn');
            const loader = this.querySelector('.buttonLoader');
            const text = this.querySelector('.buttonText');

            formInputs.forEach(input => {
                input.disabled = true;
            });

            button.disabled = true;
            loader.classList.remove('hidden');
            text.textContent = 'Signing In...';
        });
    </script>
@endsection

<x-login_layout>

    @if ($errors->has('not_authorized'))
        <div class="border border-red-600 text-red-600 py-2 rounded-md font-medium flex justify-center items-center">
            {{ $errors->first('not_authorized') }}
        </div>
    @endif

    <x-ui.card.body class="border-purple-100">
        <x-ui.card.header>
            <x-ui.card.title class="text-center text-2xl font-extrabold">
                Administrator
            </x-ui.card.title>
            <x-ui.card.description class="text-center text-[14px]">
                Welcome back! Please sign-in to continue
            </x-ui.card.description>
        </x-ui.card.header>

        <x-ui.card.content>
            <form action="{{ route('signin.verify') }}" method="POST">
                @csrf
                <div class="space-y-2">
                    {{-- Email Input --}}
                    <div class="space-y-2">
                        <x-ui.form.label for="email" class="flex justify-between items-center">
                            <span>Email</span>
                            @if ($errors->has('email'))
                                <span class="text-red-500 text-xs"id="password-error">
                                    {{ $errors->first('email') }}
                                </span>
                                <script>
                                    setTimeout(() => {
                                        document.getElementById('password-error').style.display = 'none';
                                    }, 5000);
                                </script>
                            @endif
                        </x-ui.form.label>
                        <x-ui.form.input type="email" name="email" id="email" placeholder="Email" required
                            min="1" maxlength="255" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                            value="{{ old('email') }}" title="Please enter a valid email address"
                            aria-label="Email address" autocomplete="email" value="{{ old('email') }}"
                            class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400" />
                    </div>

                    {{-- Password Input --}}
                    <div class="space-y-2">
                        <x-ui.form.label for="password" class="flex justify-between item">
                            <span> Password</span>
                            @if ($errors->has('password'))
                                <span class="text-red-500 text-xs"id="password-error">
                                    {{ $errors->first('password') }}
                                </span>
                                <script>
                                    setTimeout(() => {
                                        document.getElementById('password-error').style.display = 'none';
                                    }, 5000);
                                </script>
                            @endif
                        </x-ui.form.label>
                        <x-ui.form.input placeholder="Password" type="password" name="password" id="password"
                            rbiequired minlength="1" maxlength="64" aria-label="Password"
                            autocomplete="current-password"
                            class="border-grey-300 focus:border-none focus:border-purple-800 focus:ring-purple-400" />
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" type="checkbox" name="remember"
                                class="border:1px solid h-3.5 w-3.5 rounded-full accent-violet-500">
                            <label for="remember-me" class="ml-2 text-[14px] font-medium text-gray-900">
                                Remember me
                            </label>
                        </div>
                        {{-- Forgot Password --}}
                        <div class="flex items-center justify-between">
                            <a href="{{ route('forgot_password') }}"
                                class="text-[14px] text-purple-700 hover:underline">
                                Forgot password?
                            </a>
                        </div>
                    </div>
                    {{-- Submit Button --}}
                    <x-ui.button.dynamic-button type="submit" variant="default" size="default"
                        class="submitBtn w-full bg-purple-600 hover:bg-purple-700 focus:ring-purple-500">
                        Sign in
                    </x-ui.button.dynamic-button>

                    <hr>
                    <div
                        class="border-grey-100 flex h-10 w-full cursor-pointer items-center justify-center gap-2 rounded border font-[600] text-violet-700 hover:border-violet-200 hover:bg-gray-100 hover:text-violet-900">
                        <x-bi-google /> <span class="text-sm">or Sign in with Google</span>
                    </div>
                </div>
            </form>
        </x-ui.card.content>
    </x-ui.card.body>
</x-login_layout>
