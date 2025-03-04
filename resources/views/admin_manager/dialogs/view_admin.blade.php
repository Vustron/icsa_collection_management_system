<x-ui.modal.dialog id="admin_manager_view_admin" title="Admin Details" class="">
    <div class="grid-cols-[min(250px)_1fr] gap-2 lg:grid">
        {{-- border-l-[3px] border-l-violet-600 --}}
        <div class="flex flex-wrap p-2 shadow-lg">
            <div class="flex flex-grow justify-center">
                <img src="{{ Auth::user()['avatar'] ?? asset('images/defaults/profile.jpg') }}" alt=""
                    class="w-[70%] max-w-[200px] rounded border border-gray-300 object-cover">
            </div>

            <div class="flex-grow px-2">
                <h1 id="va_institute_name" class="p-2 text-center text-lg"></h1>

                <div>
                    <h2 class="font-bold text-violet-500">Username</h2>
                    <span class="pl-5" id="va_username"></span>
                    <h2 class="font-bold text-violet-500">Email</h2>
                    <span class="pl-5" id="va_email"></span>
                    <h2 class="font-bold text-violet-500">Status</h2>
                    <span class="pl-5 capitalize" id="va_status"></span>
                </div>
            </div>
        </div>
        <div class="py-4 lg:py-0">
            <div class="text-lg text-violet-700">Admin Roles</div>
            <x-ui.table :headers="['#', 'Role', 'System', 'created_at']" tb_id="view_admin_table">

            </x-ui.table>
        </div>
    </div>
</x-ui.modal.dialog>
