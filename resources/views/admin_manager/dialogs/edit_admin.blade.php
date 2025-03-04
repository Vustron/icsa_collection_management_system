<x-ui.modal.dialog id="admin_manager_edit_admin" title="Edit Admin" class="">
    <div class="lg:grid grid-cols-[min(250px)_1fr] gap-2">
        {{-- border-l-[3px] border-l-violet-600 --}}
        <div class="p-2 shadow-lg flex flex-wrap">
            <div class="flex flex-col justify-center items-center flex-grow">
                <img src="{{ Auth::user()['avatar'] ?? asset('images/defaults/profile.jpg') }}" alt=""
                    class="w-[70%] max-w-[200px] border border-gray-300 rounded object-cover">
                <button class="m-2 outline-none px-3 p-1 bg-grey-100 border border-gray-300 rounded">Change
                    Photo</button>
                <input type="file" id="change_photo" hidden></input>
            </div>

            <div class="flex-grow px-2 space-y-2">
                <h1 id="ea_institute_name" class="text-center text-lg "></h1>
                <form action="{{ route('admin_manager.update_admin_details') }}" method="POST">
                    @csrf
                    <div class="space-y-2">
                        <div class="space-y-2">
                            <x-ui.form.label for="ea_user_name" class="flex justify-between items-center">
                                <span>Username</span>
                            </x-ui.form.label>
                            <x-ui.form.input type="text" name="user_name" id="ea_user_name" placeholder="Username"
                                required min="1" maxlength="255" value="{{ old('user_name') }}"
                                class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400" />
                        </div>
                        <div class="space-y-2">
                            <x-ui.form.label for="ea_user_email" class="flex justify-between items-center">
                                <span>Email</span>
                            </x-ui.form.label>
                            <x-ui.form.input type="email" name="user_name" id="ea_user_email" placeholder="Email"
                                required min="1" maxlength="255" value="{{ old('user_name') }}"
                                class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400" />
                        </div>
                        <div class="space-y-2">
                            <x-ui.form.label for="ea_user_email" class="flex justify-between items-center">
                                <span>Status</span>
                            </x-ui.form.label>
                            <div class="w-full">
                                <select name="status" required id="ea_status"
                                    class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-1 focus:ring-purple-500 focus:border-purple-500 outline-none">
                                    <option value="active" selected>Active</option>
                                    <option value="deactivated">Deactivated</option>
                                </select>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <x-ui.form.label for="ea_user_email" class="flex justify-between items-center">
                                <span>Passowrd</span>
                            </x-ui.form.label>
                            <x-ui.form.input type="passowrd" name="user_passowrd" placeholder="" min="1"
                                maxlength="255" value="{{ old('user_passowrd') }}"
                                class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400" />
                            <x-ui.form.label class="flex justify-between items-center text-red-500">
                                <span>Leave this blank if you dont want to change the password.</span>
                            </x-ui.form.label>
                        </div>
                        <x-ui.button.dynamic-button type="submit" variant="default" size="default"
                            class="submitBtn w-full bg-green-600 hover:bg-green-700 focus:ring-green-500 mt-3">
                            Update Details
                        </x-ui.button.dynamic-button>
                    </div>
                </form>
            </div>
        </div>
        <div class="py-4 lg:py-2">
            <div class="text-lg text-violet-700 flex justify-between items-center">
                <span>Admin Roles</span>
                <button
                    class="rounded-md bg-purple-600 px-3 py-2 text-sm text-white hover:bg-purple-700 text-nowrap focus:outline-none flex items-center gap-1"
                    onclick="showDialogByID('admin_manager_add_admin_role')">
                    New Role <x-bi-plus />
                </button>
            </div>
            <x-ui.table :headers="['#', 'Role', 'System', 'created_at', 'Actions']" tb_id="edit_admin_table"></x-ui.table>
        </div>
    </div>
</x-ui.modal.dialog>