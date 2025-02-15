<x-ui.modal.dialog id="admin_manager_add_admin" title="New Admin" createLink="{{ route('admin_manager.store') }}"
    button_name="Create new Admin" type="create">
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
            maxlength="255" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address"
            aria-label="Email address" autocomplete="email"
            class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400"
            value="{{ old('email') }}" />
    </div>
    <div class="space-y-2">
        <x-ui.form.label for="password">Password</x-ui.form.label>
        <x-ui.form.input type="password" name="password" id="password" placeholder="Password" required minlength="1"
            maxlength="64" aria-label="Password" autocomplete="current-password"
            class="border-grey-300 focus:border-none focus:border-purple-800 focus:ring-purple-400" />
    </div>
    <div class="space-y-2">
        <x-ui.form.label for="password_confirmation">Confirm Password</x-ui.form.label>
        <x-ui.form.input type="password" name="password_confirmation" id="password_confirmation"
            placeholder="Confirm Password" required minlength="1" maxlength="64" aria-label="Password"
            autocomplete="current-password"
            class="border-grey-300 focus:border-none focus:border-purple-800 focus:ring-purple-400" />
    </div>
</x-ui.modal.dialog>
