@section('page_title', 'My Account')
@section('page_header_title', 'My Account')

{{-- e butang here ang mga links na customized specifically for this page aron dele mag conflict sa uban --}}
@section('raw_css_links')
@endsection

@section('js_links')
    <script>
        function validateImageFile(input) {
            const file = input.files[0];
            if (file) {
                // const allowedTypes = ['image/png', 'image/jpeg'];
                // if (!allowedTypes.includes(file.type)) {
                //     alert('Only PNG and JPEG files are allowed!');
                //     input.value = ''; // Reset input
                //     return;
                // }
                document.getElementById('photo').src = URL.createObjectURL(file);
            }
        }
    </script>
@endsection

@section('dialogs')

@endsection

<x-layout>
    <div id="messages">
        @if (session('deleted'))
            <div class="mb-2 border border-gray-400 p-3 text-gray-900">
                {{ session('deleted') }}
            </div>
        @endif
        @if (session('success'))
            <div class="mb-2 border border-green-400 p-3 text-green-600">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mb-2 border border-red-400 p-3 text-red-600">
                {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-2 border border-red-400 p-3 text-red-600">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <script>
            setTimeout(() => {
                document.getElementById('messages').style.display = 'none';
            }, 5000);
        </script>
    </div>
    <div class="grid-cols-[min(250px)_1fr] gap-2 lg:grid">
        {{-- border-l-[3px] border-l-violet-600 --}}
        <div class="flex flex-wrap p-2 shadow-lg">
            <div class="flex flex-grow flex-col items-center justify-center">
                <img src="{{ Auth::user()['profile_photo'] ? asset('images/profiles/' . Auth::user()['profile_photo']) : asset('images/defaults/profile.jpg') }}"
                    alt=""
                    class="max-h-[200px] w-[70%] max-w-[200px] rounded border border-gray-300 object-cover"
                    id="photo">
                <button class="bg-grey-100 m-2 rounded border border-gray-300 p-1 px-3 outline-none"
                    onclick="document.getElementById('change_photo').click()">
                    Change Photo
                </button>
            </div>

            <div class="flex-grow space-y-2 px-2">
                <h1 id="ea_institute_name" class="text-center text-lg"></h1>
                <form action="{{ route('my_account.update', auth()->user()['id']) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="file" id="change_photo" name="profile_photo" hidden accept="image/png, image/jpeg"
                        onchange="validateImageFile(this)"></input>
                    <div class="space-y-2">
                        <div class="space-y-2">
                            <x-ui.form.label for="ea_user_name" class="flex items-center justify-between">
                                <span>Username</span>
                            </x-ui.form.label>
                            <x-ui.form.input type="text" name="user_name" id="ea_user_name" placeholder="Username"
                                required min="1" maxlength="255" value="{{ auth()->user()['user_name'] }}"
                                class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400" />
                        </div>
                        <div class="space-y-2">
                            <x-ui.form.label for="ea_user_email" class="flex items-center justify-between">
                                <span>Email</span>
                            </x-ui.form.label>
                            <x-ui.form.input type="email" name="email" id="ea_user_email" placeholder="Email"
                                required min="1" maxlength="255" value="{{ auth()->user()['email'] }}"
                                class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400" />
                        </div>
                        <div class="space-y-2">
                            <x-ui.form.label for="ea_user_email" class="flex items-center justify-between">
                                <span>Status</span>
                            </x-ui.form.label>
                            <div class="w-full">
                                <select name="status" required id="ea_status"
                                    class="w-full rounded-md border border-gray-300 p-2 shadow-sm outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500">
                                    <option value="{{ auth()->user()['status'] }}"
                                        {{ auth()->user()['status'] == 'active' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="{{ auth()->user()['status'] }}"
                                        {{ auth()->user()['status'] != 'active' ? 'selected' : '' }}>Deactivated
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <x-ui.form.label for="ea_user_email" class="flex items-center justify-between">
                                <span>Passowrd</span>
                            </x-ui.form.label>
                            <x-ui.form.input type="password" name="password" placeholder="" min="1"
                                maxlength="255" value="{{ old('password') }}"
                                class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400" />
                            <x-ui.form.label for="ea_user_email" class="flex items-center justify-between">
                                <span>Confirm Passowrd</span>
                            </x-ui.form.label>
                            <x-ui.form.input type="password" name="password_confirmation" placeholder="" min="1"
                                maxlength="255" value="{{ old('password') }}"
                                class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400" />
                            <x-ui.form.label class="flex items-center justify-between text-red-500">
                                <span>Leave this blank if you dont want to change the password.</span>
                            </x-ui.form.label>
                        </div>
                        <x-ui.button.dynamic-button type="submit" variant="default" size="default"
                            class="submitBtn mt-3 w-full bg-red-600 hover:bg-red-700 focus:ring-red-500">
                            UPDATE
                        </x-ui.button.dynamic-button>
                    </div>
                </form>
            </div>
        </div>
        <div class="py-4 lg:py-2">
            <div class="flex items-center justify-between text-lg text-violet-700">
                <span>Admin Roles</span>
                <div class="flex items-center gap-2">
                    <label for="show-entries" class="text-base font-medium text-gray-700">Show</label>
                    <select id="show-entries"
                        class="rounded-md border-2 border-gray-300 text-sm focus:border-purple-500 focus:ring-purple-500">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                    <span class="text-md font-medium text-gray-700">entries</span>
                </div>
            </div>
            <x-ui.table :headers="['#', 'Role', 'System', 'created_at']" tb_id="edit_admin_table">
                @foreach ($roles as $role)
                    <tr class="last:border-violet-700 even:bg-gray-100 hover:bg-violet-100">
                        <td class="border border-gray-300 px-4 py-1 text-center">{{ $role['id'] }}</td>
                        <td class="border border-gray-300 px-4 py-1">{{ $role['roleName']['role'] }}</td>
                        <td class="border border-gray-300 px-4 py-1">{{ $role['systemName']['name'] }}</td>
                        <td class="border border-gray-300 px-4 py-1 text-center">
                            {{ $role['created_at']->format('F j, Y') }}</td>
                    </tr>
                @endforeach
            </x-ui.table>
        </div>
    </div>
</x-layout>
