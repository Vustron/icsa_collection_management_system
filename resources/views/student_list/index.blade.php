@section('page_title', 'Student List')
@section('page_header_title', 'Student List')

@section('raw_css_links')
@endsection

@section('js_links')
    @vite(['resources/js/view/student_list/index.js'])
@endsection

@section('dialogs')
    @include('\student_list\dialogs\add_student')
    @include('\student_list\dialogs\edit_student')
    @include('\student_list\dialogs\delete_student')
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
                onclick="showDialogByID('add_student')">
                New Student
            </button>
        </div>
    </div>
    <x-ui.table :headers="['#', 'School ID', 'Name', 'Email', 'Program', 'Year & Set', 'Status', 'Actions']">
        @foreach ($students as $student)
            <tr class="last:border-violet-700 even:bg-gray-100 hover:bg-violet-100">
                <td class="border border-gray-300 px-4 py-1 text-center">{{ $student['id'] }}</td>
                <td class="border border-gray-300 px-4 py-1">{{ $student['school_id'] }}</td>
                <td class="border border-gray-300 px-4 py-1 capitalize">
                    {{ $student['first_name'] . ' ' . (isset($student['middle_name']) ? substr($student['middle_name'], 0, 1) . '. ' : '') . $student['last_name'] }}
                </td>
                <td class="border border-gray-300 px-4 py-1">{{ $student['email'] }}</td>
                <td class="border border-gray-300 px-4 py-1">{{ $student['program']['name'] }}</td>
                <td class="border border-gray-300 px-4 py-1">
                    {{ $student['year'] . '-' . $student['set'] }}
                </td>

                <td class="border border-gray-300 px-4 py-1">
                    {{ $student['status'] }}
                </td>

                <td class="border border-gray-300 px-4 py-2">
                    <div class="flex items-center justify-center gap-2">
                        <a href="{{ route('student_list.student.show', $student['id']) }}" title="View Student">
                            <x-bi-eye-fill
                                class="view-student size-5 cursor-pointer text-green-500 hover:text-green-700" />
                        </a>
                        {{-- <a href="{{ route('student_list.edit', $student['id']) }}" title="Edit Student"> --}}
                        <x-bx-pencil class="edit-student size-5 cursor-pointer text-orange-500 hover:text-orange-700"
                            data-student="{{ json_encode($student) }}" />
                        {{-- </a> --}}
                        <x-bi-trash class="delete-student size-5 cursor-pointer text-red-500 hover:text-red-700"
                            data-student="{{ json_encode($student) }}" />
                    </div>
                </td>
            </tr>
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
