<x-ui.modal.dialog id="admin_manager_add_admin_role" title="New Admin Role" class="max-w-sm">

    <form action="{{ route('admin_manager.new_admin_role') }}" method="POST">
        @csrf
        <div class="p-2 text-center text-lg font-semibold">
            {{ auth()->user()->institute->institute_name ?? 'Super Admin' }}
        </div>
        <div class="space-y-2">
            <input type="hidden" name="user_id" id="aar_user_id">
            <input type="hidden" name="user_name" id="aar_user_name">
            <div class="w-full">
                <label for="roleSelect" class="mb-1 block text-sm font-medium text-gray-700">
                    Select Role
                </label>
                <div class="relative w-full">
                    <select id="roleSelect" name="role_id" required
                        class="w-full rounded-md border border-gray-300 p-2 shadow-sm outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500">
                        <option value="" disabled selected>Select an option</option>
                        @foreach ($roles as $role)
                            @if ($role['id'] != 1)
                                <option value="{{ $role['id'] }}">
                                    {{ $role['role'] }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="w-full">
                <label for="roleSelect" class="mb-1 block text-sm font-medium text-gray-700">
                    Select System
                </label>
                <div class="relative w-full">
                    <select id="systemSelect" name="system_id" required
                        class="w-full rounded-md border border-gray-300 p-2 shadow-sm outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500">
                        <option value="" disabled selected>Select an option</option>
                        @foreach ($systems as $system)
                            <option value="{{ $system['id'] }}">
                                {{ $system['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="flex items-center space-x-1">
            <x-ui.button.dynamic-button type="button" variant="outline" size="default"
                class="submitBtn mt-2 w-36 bg-gray-100 hover:bg-gray-300 focus:ring-purple-500"
                onclick="closeDialog('admin_manager_add_admin_role')">
                Cancel
            </x-ui.button.dynamic-button>
            <x-ui.button.dynamic-button type="submit" variant="default" size="default"
                class="submitBtn mt-2 w-full bg-purple-600 hover:bg-purple-700 focus:ring-purple-500">
                Add New Role
            </x-ui.button.dynamic-button>
        </div>
    </form>
</x-ui.modal.dialog>
