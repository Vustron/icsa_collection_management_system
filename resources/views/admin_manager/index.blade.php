@section('page_title', 'Admin Manager')
@section('page_header_title', 'Admin Manager')

{{-- e butang here ang mga links na customized specifically for this page aron dele mag conflict sa uban --}}
@section('raw_css_links')
@endsection

@section('js_links')
@endsection

<x-layout>
    <div>
        <div>
            @if (session('success'))
                <div class="mb-2 border border-red-400 p-3 text-red-600">
                    {{ session('success') }}
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
                <x-ui.form.input type="text" name="search" id="search" placeholder="Search" required
                    min="1" maxlength="255" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                    title="Please enter a valid email address" aria-label="Email address" autocomplete="email"
                    class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400"
                    style="height: 35px" />

                <button class="text-nowrap rounded-md bg-purple-600 px-4 py-2 text-sm text-white hover:bg-purple-700"
                    onclick="showDialog('admin_manager_add_admin')">
                    Add New Admin
                </button>
            </div>
        </div>
        <x-ui.table :headers="['#', 'Username', 'Email', 'Institute', 'Authorized', 'Status', 'Actions']">
            @foreach ($users as $user)
                @if ($user['id'] != auth()->user()['id'])
                    <tr class="last:border-violet-700 even:bg-gray-100 hover:bg-violet-100">
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $user['id'] }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user['user_name'] }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user['email'] }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->institute['institute_name'] ?? '' }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $user->roles->contains(fn($role) => $role['system_id'] == 3) ? 'true' : 'false' }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user['status'] }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center justify-center gap-2">
                                <x-bi-eye-fill class="size-5 cursor-pointer text-green-500 hover:text-green-700" />
                                <x-bx-pencil class="size-5 cursor-pointer text-orange-500 hover:text-orange-700" />
                                <form action="{{ route('admin_manager.destroy', [$user['id']]) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete {{ $user['user_name'] }} account?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">
                                        <x-bi-trash class="size-5 cursor-pointer text-red-500 hover:text-red-700" />
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </x-ui.table>
    </div>

    @include('\admin_manager\dialogs\create_admin')

</x-layout>
