@section('page_title', 'Student Details')
@section('page_header_title', 'Student Fees')

@section('raw_css_links')
@endsection

@section('js_links')
    {{-- @vite(['resources/js/view/student_list/index.js']) --}}
@endsection

@section('dialogs')

@endsection

<x-layout>
    {{-- flex justify-center items-center flex-col --}}
    <div class="">
        <x-ui.error_handler.basic />
        <div class="flex space-x-2 justify-between items-center flex-wrap-reverse gap-2 w-full pb-2">
            <div class=" text-gray-800 text-lg pl-2 font-medium">
                {{ $student['first_name'] . ' ' . ($student['middle_name'] != null ? $student['middle_name'] . ' ' : '') . $student['last_name'] }}
                <span class="text-violet-800"> | Attendance Fees</span>
            </div>
            <div class="flex space-x-2 justify-end">
                <a href="javascript:history.back()"
                    class="flex text-sm items-center gap-2 px-2 py-1 border rounded-lg shadow-md text-gray-700 hover:bg-gray-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M15 18l-6-6 6-6"></path>
                    </svg>
                    Back
                </a>
                <div class="edit-student cursor-pointer flex text-sm items-center gap-2 px-2 py-1 bg-orange-500 text-white rounded-lg shadow-md hover:bg-orange-600 transition"
                    data-student="{{ json_encode($student) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M12 20h9"></path>
                        <path d="M16.5 3.5a2.121 2.121 0 113 3L7 19H3v-4L16.5 3.5z"></path>
                    </svg>
                    Edit
                </div>

                <div class=" delete-student flex text-sm items-center gap-2 px-2 py-1 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700 transition cursor-pointer"
                    data-student="{{ json_encode($student) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6l-1 14H6L5 6"></path>
                        <path d="M10 11v6"></path>
                        <path d="M14 11v6"></path>
                        <path d="M9 6V4h6v2"></path>
                    </svg>
                    Delete
                </div>

                <button
                    class="bg-purple-700 hover:bg-purple-800 text-white px-2 py-1 rounded shadow-md flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M19 7H5V3h14v4zM6 8h12a2 2 0 0 1 2 2v6h-4v4H6v-4H2v-6a2 2 0 0 1 2-2zm2 9v2h8v-2H8zm8-6h2v4h-2v-4zm-4 0h2v4h-2v-4zm-4 0h2v4H8v-4z" />
                    </svg>
                    Print
                </button>
            </div>
        </div>
        <hr>
        <div class="p-2">
            @foreach ($groupedFees as $category => $fees)
                <div class="flex items-center justify-between">
                    <div class="text-lg text-violet-600 font-bold">{{ $category }}</div>
                    {{-- <div>Total: </div> --}}
                </div>
                <x-ui.table :headers="[
                    '#',
                    'Date',
                    'Morning Check-in',
                    'Morning Check-out',
                    'Afternoon Check-in',
                    'Afternoon Check-out',
                    'Fee',
                    'Actions',
                ]" tb_id="student_fees_table">
                    @foreach ($fees as $fee)
                        <tr class="last:border-violet-700 even:bg-gray-100 hover:bg-violet-100">
                            <td class="border border-gray-300 px-4 py-1 text-center">{{ $fee['id'] }}</td>
                            <td class="border border-gray-300 px-4 py-1">{{ $fee['attendanceRecord']['date'] }}</td>
                            <td class="border border-gray-300 px-4 py-1">
                                {{ $fee['attendanceRecord']['morning_check_in'] }}</td>
                            <td class="border border-gray-300 px-4 py-1">
                                {{ $fee['attendanceRecord']['morning_check_out'] }}</td>
                            <td class="border border-gray-300 px-4 py-1">
                                {{ $fee['attendanceRecord']['afternoon_check_in'] }}</td>
                            <td class="border border-gray-300 px-4 py-1">
                                {{ $fee['attendanceRecord']['afternoon_check_out'] }}</td>
                            <td class="border border-gray-300 px-4 py-1">₱{{ $fee['amount'] }}</td>


                            <td class="border border-gray-300 px-4 py-1">
                                <div class="flex items-center justify-center gap-2">
                                    <a
                                        href="{{ route('student_list.show_fee', ['id' => $student['id'], $fee['id']]) }}">
                                        <x-bi-eye-fill
                                            class="size-5 cursor-pointer text-green-500 hover:text-green-700" />
                                    </a>
                                    <x-bx-pencil
                                        class="edit-student size-5 cursor-pointer text-orange-500 hover:text-orange-700"
                                        data-user="{{ json_encode(2) }}" />
                                    <x-bi-trash
                                        class="delete-student size-5 cursor-pointer text-red-500 hover:text-red-700"
                                        data-user="{{ json_encode(3) }}" />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-ui.table>
                <hr>
            @endforeach
        </div>
    </div>
</x-layout>
