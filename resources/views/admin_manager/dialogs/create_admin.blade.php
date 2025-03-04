<x-ui.modal.dialog id="admin_manager_add_admin" title="New Admin" class=" max-w-sm">

    <form action="{{ route('admin_manager.store') }}" method="POST">
        @csrf
        <div class="p-2 text-center text-lg font-semibold ">
            {{ auth()->user()->institute->institute_name ?? 'Super Admin' }}
        </div>
        <div class="space-y-2">
            <x-ui.form.label for="user_name">Username</x-ui.form.label>
            <x-ui.form.input type="text" name="user_name" id="user_name" placeholder="Username" required
                class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400"
                value="{{ old('user_name') }}" />
        </div>
        <div class="space-y-2">
            <x-ui.form.label for="email">Email</x-ui.form.label>
            <x-ui.form.input type="email" name="email" id="email" placeholder="Email" required min="1"
                maxlength="255" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                title="Please enter a valid email address" aria-label="Email address" autocomplete="email"
                class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400"
                value="{{ old('email') }}" />
        </div>
        <div class="space-y-2">
            <x-ui.form.label for="password">Password</x-ui.form.label>
            <x-ui.form.input type="password" name="password" id="password" placeholder="Password" required
                minlength="1" maxlength="64" aria-label="Password" autocomplete="current-password"
                class="border-grey-300 focus:border-none focus:border-purple-800 focus:ring-purple-400" />
        </div>
        <div class="space-y-2">
            <x-ui.form.label for="password_confirmation">Confirm Password</x-ui.form.label>
            <x-ui.form.input type="password" name="password_confirmation" id="password_confirmation"
                placeholder="Confirm Password" required minlength="1" maxlength="64" aria-label="Password"
                autocomplete="current-password"
                class="border-grey-300 focus:border-none focus:border-purple-800 focus:ring-purple-400" />
        </div>

        <div class="flex items-center space-x-1">
            <x-ui.button.dynamic-button type="button" variant="outline" size="default"
                class="submitBtn w-36 bg-gray-100 hover:bg-gray-300 focus:ring-purple-500 mt-2"
                onclick="closeDialog('admin_manager_add_admin')">
                Cancel
            </x-ui.button.dynamic-button>
            <x-ui.button.dynamic-button type="submit" variant="default" size="default"
                class="submitBtn w-full bg-purple-600 hover:bg-purple-700 focus:ring-purple-500 mt-2">
                Create new Admin
            </x-ui.button.dynamic-button>
        </div>
    </form>
</x-ui.modal.dialog>
