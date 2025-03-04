<x-ui.modal.dialog id="admin_manager_view_admin" title="Admin Details" class="">
    <div class="lg:grid grid-cols-[min(250px)_1fr] gap-2">
        {{-- border-l-[3px] border-l-violet-600 --}}
        <div class="p-2 shadow-lg flex flex-wrap">
            <div class="flex justify-center flex-grow">
                <img src="{{ Auth::user()['avatar'] ?? asset('images/defaults/profile.jpg') }}" alt=""
                    class="w-[70%] max-w-[200px] border border-gray-300 rounded object-cover">
            </div>

            <div class="flex-grow px-2">
                <h1 id="va_institute_name" class="text-center p-2 text-lg "></h1>

                <div>
                    <h2 class="text-violet-500 font-bold">Username</h2>
                    <span class="pl-5" id="va_username"></span>
                    <h2 class="text-violet-500 font-bold">Email</h2>
                    <span class="pl-5" id="va_email"></span>
                    <h2 class="text-violet-500 font-bold">Status</h2>
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
