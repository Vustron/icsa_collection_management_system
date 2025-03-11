<x-ui.modal.dialog id="add_student" title="Add New Student" class="max-w-sm">
    <form action="{{ route('student_list.store') }}" method="POST" class="space-y-2">
        @csrf
        <div class="gap-2 md:grid md:grid-cols-2">
            <div class="space-y-2">
                <x-ui.form.label for="firstname">First Name</x-ui.form.label>
                <x-ui.form.input type="text" name="first_name" id="first_name" placeholder="First Name" required
                    class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400"
                    value="{{ old('first_name') }}" />
            </div>

            <div class="space-y-2">
                <x-ui.form.label for="last_name">Last Name</x-ui.form.label>
                <x-ui.form.input type="text" name="last_name" id="last_name" placeholder="Last Name" required
                    class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400"
                    value="{{ old('last_name') }}" />
            </div>

            <div class="space-y-2">
                <x-ui.form.label for="middle_name">Middle Name</x-ui.form.label>
                <x-ui.form.input type="text" name="middle_name" id="middl_ename" placeholder="Middle Name"
                    class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400"
                    value="{{ old('middle_name') }}" />
            </div>

            <div class="space-y-2">
                <x-ui.form.label for="email">Email</x-ui.form.label>
                <x-ui.form.input type="email" name="email" id="email" placeholder="Email" required
                    class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400"
                    value="{{ old('email') }}" />
            </div>

            <div class="space-y-2">
                <x-ui.form.label for="school_id">School ID</x-ui.form.label>
                <x-ui.form.input type="number" name="school_id" id="school_id" placeholder="School ID" required
                    class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400"
                    value="{{ old('school_id') }}" />
            </div>

            <div class="space-y-2">
                <x-ui.form.label for="rfid">RFID</x-ui.form.label>
                <x-ui.form.input type="number" name="rfid" id="rfid" placeholder="RFID"
                    class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400"
                    value="{{ old('rfid') }}" />
            </div>

            <x-ui.form.dropdown label="Program" name="program_id" id="program_id" required>
                @foreach ($programs as $program)
                    <option value="{{ $program['id'] }}">{{ $program['name'] }}</option>
                @endforeach
            </x-ui.form.dropdown>

            <x-ui.form.dropdown label="Year" name="year" id="year" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </x-ui.form.dropdown>

            <div class="space-y-2">
                <x-ui.form.label for="set">Set</x-ui.form.label>
                <x-ui.form.input type="text" name="set" id="set" placeholder="Set" required
                    class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400"
                    value="{{ old('set') }}" />
            </div>

            <x-ui.form.dropdown label="Status" name="status" id="status" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="graduated">Graduated</option>
                <option value="leave">Leave</option>
            </x-ui.form.dropdown>
        </div>
        <div class="flex items-center space-x-1">
            <x-ui.button.dynamic-button type="button" variant="outline" size="default"
                class="submitBtn mt-2 w-36 bg-gray-100 hover:bg-gray-300 focus:ring-purple-500"
                onclick="closeDialog('add_student')">
                Cancel
            </x-ui.button.dynamic-button>
            <x-ui.button.dynamic-button type="submit" variant="default" size="default"
                class="submitBtn mt-2 w-full bg-purple-600 hover:bg-purple-700 focus:ring-purple-500">
                Add Student
            </x-ui.button.dynamic-button>
        </div>
    </form>
</x-ui.modal.dialog>
