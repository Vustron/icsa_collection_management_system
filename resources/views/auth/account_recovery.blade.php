@section('page_title', 'Forgot Password')

{{-- e butang here ang mga links na customized specifically for this page aron dele mag conflict sa uban --}}
@section('raw_css_links')
@endsection

@section('js_links')
@endsection

@section('raw_js_scripts')
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const formInputs = this.querySelectorAll('input:not([name="_token"]):not([name="code"])');
            const button = this.querySelector('.submitBtn');
            const loader = this.querySelector('.buttonLoader');
            const text = this.querySelector('.buttonText');

            formInputs.forEach(input => {
                input.disabled = true;
            });

            button.disabled = true;
            loader.classList.remove('hidden');
            text.textContent = button.getAttribute('data-submit-text');
        });

        // document.querySelectorAll('.password').forEach(function(input) {
        //     input.addEventListener('keydown', function(e) {
        //         if (document.getElementById('new_password').value === document.getElementById(
        //                 'confirm_new_password').value) {
        //             document.getElementById('btn_update_password').disabled = false;
        //             document.getElementById('pdm').classList.remove(
        //                 'hidden');
        //         } else {
        //             document.getElementById('btn_update_password').disabled = true;

        //             document.getElementById('pdm').classList.add(
        //                 'hidden');
        //         }
        //     });
        // });
    </script>
@endsection

<x-login_layout>
    <x-ui.card.body class="border-purple-100">
        <x-ui.card.header>
            <x-ui.card.title class="text-2xl font-extrabold">
                {{-- Pwede rani ilisan ha na tanan account ma recover but for now gi super admin lang sa hehe --}}
                Admin Account Recovery
            </x-ui.card.title>
            <hr>
            <x-ui.card.description
                class=" text-[15px] {{ isset($password_matched) ? ($password_matched ? 'hidden' : '') : '' }}">
                We've sent a verification code to your Gmail. Please enter it here to verify. CODE: 123456
            </x-ui.card.description>
        </x-ui.card.header>

        <x-ui.card.content>
            <div class="{{ isset($password_matched) ? ($password_matched ? 'hidden' : '') : '' }}">
                <form action="{{ route('forgot_password.verify_code') }}" method="POST">
                    @csrf
                    <div class="space-y-2">
                        {{-- Email Input --}}
                        <div class="space-y-2">
                            <div class="flex justify-between items-center">
                                <x-ui.form.label for="code">
                                    Verification Code
                                </x-ui.form.label>
                                <x-ui.form.label for="code"
                                    class=" text-red-500 {{ isset($verified) ? ($verified ? 'hidden' : '') : 'hidden' }}">
                                    Incorrect Code
                                </x-ui.form.label>
                            </div>
                            <x-ui.form.input type="text" name="code" id="code"
                                placeholder="Verification Code" required min="1" max="2"
                                title="Please enter the correct Code"
                                class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" :disabled="isset($verified) && $verified" />
                        </div>
                        <div class="flex
                            justify-end items-center space-x-2">
                            <a href="{{ route('forgot_password') }}"
                                class="border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 text-sm rounded">
                                Back
                            </a>
                            <x-ui.button.dynamic-button type="submit" variant="default" size="default"
                                class=" bg-purple-600 hover:bg-purple-700 submitBtn" :disabled="isset($verified) && $verified"
                                data-submit-text="Verifying...">
                                Verify
                            </x-ui.button.dynamic-button>
                        </div>
                    </div>
                </form>

                <div class="{{ isset($verified) ? ($verified ? '' : 'hidden') : 'hidden' }} space-y-2">
                    <hr class=" mt-2">
                    <div
                        class="border border-red-400 w-full text-red-600 text-sm py-2  text-center {{ isset($password_matched) ? ($password_matched ? 'hidden' : '') : 'hidden' }}">
                        <span>
                            Password Doesnt Match
                        </span>
                    </div>
                    <form action="{{ route('forgot_password.change_password') }}" method="POST">
                        @csrf
                        <div class="space-y-2">
                            <x-ui.form.label for="code">
                                New Password
                            </x-ui.form.label>
                            <x-ui.form.input type="password" name="new_password" id="new_password"
                                placeholder="Enter New Password" required title="Please enter the correct Code"
                                class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400 password" />
                        </div>
                        <div class="space-y-2">
                            <div class="flex justify-between items-center pt-2">
                                <x-ui.form.label for="">
                                    Confirm New Password
                                </x-ui.form.label>
                                <x-ui.form.label for="" class=" text-red-500 hidden" id="pdm">
                                    Password doesnt match
                                </x-ui.form.label>
                            </div>
                            <x-ui.form.input type="password" name="confirm_new_password" id="confirm_new_password"
                                placeholder="Enter New Password" required title="Please enter the correct Code"
                                class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400 password" />
                        </div>
                        <x-ui.button.dynamic-button type="submit" variant="default" size="default"
                            id="btn_update_password" class=" bg-purple-600 hover:bg-purple-700 w-full mt-2 submitBtn"
                            data-submit-text="Updating Password..." :disabled="isset($password_matched) && $password_matched">
                            Update Password
                        </x-ui.button.dynamic-button>
                        {{-- ya pa check ragud ko here. dli man siya mo tuyok^2 usab oi AHHHAHAAHA basta ika duha na form --}}
                    </form>
                </div>
            </div>
            <div class="{{ isset($password_matched) ? (!$password_matched ? 'hidden' : '') : 'hidden' }}">
                <div class="border border-green-400 w-full text-green-600 text-sm py-2 mt-2 text-center">
                    <span>
                        Password have been changed successfully
                    </span>
                </div>
                <a href="{{ route('signin') }}">
                    <x-ui.button.dynamic-button type="button" variant="default" size="default" id="btn_update_password"
                        class=" bg-purple-600 hover:bg-purple-700  w-full mt-2 submitBtn"
                        data-submit-text="Updating Password...">
                        Sign-in
                    </x-ui.button.dynamic-button>
                </a>
            </div>
        </x-ui.card.content>
    </x-ui.card.body>

</x-login_layout>
