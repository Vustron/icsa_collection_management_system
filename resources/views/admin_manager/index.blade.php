@section('page_title', 'Admin Manager')
@section('page_header_title', 'Admin Manager')

{{-- e butang here ang mga links na customized specifically for this page aron dele mag conflict sa uban --}}
@section('raw_css_links')
@endsection

@section('js_links')
    @vite(['resources/js/view/admin_manager/index.js'])
@endsection

@section('dialogs')
    @include('\admin_manager\dialogs\create_admin')
    @include('\admin_manager\dialogs\delete_admin')
    @include('\admin_manager\dialogs\view_admin')
    @include('\admin_manager\dialogs\edit_admin')
    @include('\admin_manager\dialogs\add_admin_role')
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
    <div class="flex items-center justify-between border-b-2 border-b-gray-200 pb-2">
        <div class="flex items-center gap-2">
            <label for="show-entries" class="text-base font-medium text-gray-700">Show</label>
            <select id="show-entries"
                class="text-medium rounded-md border-2 border-gray-300 focus:border-purple-500 focus:ring-purple-500">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
            <span class="text-md font-medium text-gray-700">entries</span>
        </div>
        <div class="flex items-center justify-between gap-x-2">
            <x-ui.form.input type="text" name="search" id="search" placeholder="Search" required min="1"
                maxlength="255" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                title="Please enter a valid email address" aria-label="Email address" autocomplete="email"
                class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400"
                style="height: 35px" />

            <button class="text-nowrap rounded-md bg-purple-600 px-4 py-2 text-sm text-white hover:bg-purple-700"
                onclick="showDialogByID('admin_manager_add_admin')">
                Add New Admin
            </button>
        </div>
    </div>
    <x-ui.table :headers="['#', 'Username', 'Email', 'Institute', 'Authorized', 'Status', 'Actions']">
        @foreach ($users as $user)
            @if ($user['id'] != auth()->user()['id'])
                <tr class="last:border-violet-700 even:bg-gray-100 hover:bg-violet-100">
                    <td class="border border-gray-300 px-4 py-1 text-center">{{ $user['id'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user['user_name'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user['email'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->institute['institute_name'] ?? '' }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <?php $authorized = $user->roles->contains(fn($role) => $role['system_id'] == 3); ?>
                        <div class="{!! $authorized ? 'text-green-700' : 'text-red-700' !!} rounded-sm border-none px-1 py-1 capitalize">
                            {{ $authorized ? 'Authorized' : 'Not Authorized' }}
                        </div>
                    </td>
                    <td class="border border-gray-300 px-2 py-1">
                        {{-- <div
                            class=" border-none bg-{{ $user['status'] == 'active' ? 'green' : 'red' }}-500 text-white text-center py-1 px-1 rounded-sm capitalize">
                            {{ $user['status'] }}
                        </div> --}}
                        <div
                            class="{!! $user['status'] == 'active' ? 'bg-green-500' : 'bg-red-500' !!} rounded-sm border-none px-1 py-1 text-center capitalize text-white">
                            {{ $user['status'] }}
                        </div>
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <div class="flex items-center justify-center gap-2">
                            <x-bi-eye-fill class="view-user size-5 cursor-pointer text-green-500 hover:text-green-700"
                                data-user="{{ json_encode($user) }}" />
                            <x-bx-pencil class="edit-user size-5 cursor-pointer text-orange-500 hover:text-orange-700"
                                data-user="{{ json_encode($user) }}" />
                            <x-bi-trash class="delete-user size-5 cursor-pointer text-red-500 hover:text-red-700"
                                data-user="{{ json_encode(['id' => $user['id'], 'user_name' => $user['user_name']]) }}" />
                        </div>
                    </td>
                </tr>
            @endif
        @endforeach
    </x-ui.table>

    <div class="mt-3 flex flex-wrap-reverse items-center justify-center gap-2 px-2 md:mt-0 md:justify-between">
        <div>Showing 1 to n of n entries</div>
        <div class="flex items-center space-x-1 text-blue-600">
            <button class="rounded-md border px-2 py-1 hover:bg-gray-200">Previous</button>
            <button class="rounded-md border px-2 py-1 hover:bg-gray-200">1</button>
            <span class="px-2">...</span>
            <button class="rounded-md border px-2 py-1 hover:bg-gray-200">5</button>
            <button class="rounded-md border bg-[#9334ea] px-2 py-1 text-white">6</button>
            <button class="rounded-md border px-2 py-1 hover:bg-gray-200">7</button>
            <span class="px-2">...</span>
            <button class="rounded-md border px-2 py-1 hover:bg-gray-200">156</button>
            <button class="rounded-md border px-2 py-1 hover:bg-gray-200">Next</button>
        </div>
    </div>

</x-layout>
