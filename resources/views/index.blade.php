@section('page_title', 'Sign-in')

{{-- e butang here ang mga links na customized specifically for this page aron dele mag conflict sa uban --}}
@section('raw_css_links')
@endsection

@section('js_links')
@endsection

@section('raw_js_scripts')
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const formInputs = this.querySelectorAll('input:not([name="_token"])');
            const button = this.querySelector('.submitBtn');
            const loader = this.querySelector('.buttonLoader');
            const text = this.querySelector('.buttonText');

            formInputs.forEach(input => {
                input.disabled = true;
            });

            button.disabled = true;
            loader.classList.remove('hidden');
            text.textContent = 'Searching...';
        });
    </script>
@endsection

<x-login_layout>
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
                        <x-ui.form.label for="email">
                            Email
                        </x-ui.form.label>
                        <x-ui.form.input type="email" name="email" id="email" placeholder="Email or Username"
                            required min="1" maxlength="255" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                            title="Please enter a valid email address" aria-label="Email address" autocomplete="email"
                            class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400" />
                    </div>

                    {{-- Password Input --}}
                    <div class="space-y-2">
                        <x-ui.form.label for="password">
                            Password
                        </x-ui.form.label>
                        <x-ui.form.input placeholder="Your password" type="password" name="password" id="password"
                            rbiequired minlength="1" maxlength="64" aria-label="Password"
                            autocomplete="current-password"
                            class="border-grey-300 focus:border-none focus:border-purple-800 focus:ring-purple-400" />
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" type="checkbox"
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
