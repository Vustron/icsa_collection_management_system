@section('page_title', 'Forgot Password')

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
            text.textContent = 'Confirming...';
        });
    </script>
@endsection

<x-login_layout>
    <x-ui.card.body class="border-purple-100">
        <x-ui.card.header>
            <x-ui.card.title class="text-2xl font-extrabold">
                {{-- Pwede rani ilisan ha na tanan account ma recover but for now gi super admin lang sa hehe --}}
                Administrator
            </x-ui.card.title>
            <hr>
            <x-ui.card.description class="text-[15px]">
                To recover the super admin account, enter the registered email to receive a recovery code.
            </x-ui.card.description>
        </x-ui.card.header>

        <x-ui.card.content>
            <form action="{{ route('forgot_password.verify_email') }}" method="POST">
                @csrf
                <div class="space-y-2">
                    {{-- Email Input --}}
                    <div class="space-y-2">
                        <x-ui.form.label for="email">
                            Email
                        </x-ui.form.label>
                        <x-ui.form.input type="email" name="email" id="email" placeholder="Email" required
                            min="1" maxlength="255" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                            title="Please enter a valid email address" aria-label="Email address" autocomplete="email"
                            class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400" />
                    </div>
                    <div class="flex items-center justify-end space-x-2">
                        <a href="{{ route('signin') }}"
                            class="h-10 rounded border border-input bg-background px-4 py-2 text-sm hover:bg-accent hover:text-accent-foreground">
                            Cancel
                        </a>
                        <x-ui.button.dynamic-button type="submit" variant="default" size="default"
                            class="submitBtn bg-purple-600 hover:bg-purple-700 focus:ring-purple-500">
                            Confirm
                        </x-ui.button.dynamic-button>
                    </div>
                </div>
            </form>
        </x-ui.card.content>
    </x-ui.card.body>

</x-login_layout>
\
