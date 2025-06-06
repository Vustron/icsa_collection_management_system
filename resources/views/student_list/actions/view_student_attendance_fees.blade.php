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
        <div class="flex w-full flex-wrap-reverse items-center justify-between gap-2 space-x-2 pb-2">
            <div class="pl-2 text-lg font-medium text-gray-800">
                {{ $student['first_name'] . ' ' . ($student['middle_name'] != null ? $student['middle_name'] . ' ' : '') . $student['last_name'] }}
                <span class="text-violet-800"> | Attendance Fees</span>
            </div>
            <div class="flex justify-end space-x-2">
                <a href="javascript:history.back()"
                    class="flex items-center gap-2 rounded-lg border px-2 py-1 text-sm text-gray-700 shadow-md transition hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M15 18l-6-6 6-6"></path>
                    </svg>
                    Back
                </a>
                <div class="edit-student flex cursor-pointer items-center gap-2 rounded-lg bg-orange-500 px-2 py-1 text-sm text-white shadow-md transition hover:bg-orange-600"
                    data-student="{{ json_encode($student) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M12 20h9"></path>
                        <path d="M16.5 3.5a2.121 2.121 0 113 3L7 19H3v-4L16.5 3.5z"></path>
                    </svg>
                    Edit
                </div>

                <div class="delete-student flex cursor-pointer items-center gap-2 rounded-lg bg-red-600 px-2 py-1 text-sm text-white shadow-md transition hover:bg-red-700"
                    data-student="{{ json_encode($student) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" stroke="currentColor"
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
                    class="flex items-center gap-2 rounded bg-purple-700 px-2 py-1 text-white shadow-md hover:bg-purple-800">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M19 7H5V3h14v4zM6 8h12a2 2 0 0 1 2 2v6h-4v4H6v-4H2v-6a2 2 0 0 1 2-2zm2 9v2h8v-2H8zm8-6h2v4h-2v-4zm-4 0h2v4h-2v-4zm-4 0h2v4H8v-4z" />
                    </svg>
                    Print
                </button>
            </div>
        </div>
        <hr>
        <div class="grid grid-flow-dense gap-5 p-2 lg:grid-cols-[1fr_.4fr]">
            <div class="order-last overflow-x-auto lg:order-first">
                @foreach ($groupedFees as $category => $fees)
                    <?php $total = $fees->sum('amount'); ?>
                    <div class="mb-5">
                        <div class="flex items-center justify-between pr-3">
                            <div class="text-lg font-bold text-violet-600">{{ $category }}</div>
                            <div class="grid grid-cols-[50px_100px]">
                                <div>Total: </div>
                                <div>{{ ' ₱ ' . number_format($total, 2) }}</div>
                            </div>
                        </div>
                        <x-ui.table :headers="[
                            '#',
                            'Date',
                            'Morning Check-in',
                            'Morning Check-out',
                            'Afternoon Check-in',
                            'Afternoon Check-out',
                            'Fee',
                            'Actions'
                        ]" tb_id="student_fees_table" class="">
                            @foreach ($fees as $fee)
                                <tr class="last:border-violet-700 even:bg-gray-100 hover:bg-violet-100">
                                    <td class="border border-gray-300 px-4 py-1 text-center">{{ $fee['id'] }}</td>
                                    <td class="border border-gray-300 px-4 py-1">{{ $fee['attendanceRecord']['date'] }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-1">
                                        {{ $fee['attendanceRecord']['morning_check_in'] ? \Carbon\Carbon::parse($fee['attendanceRecord']['morning_check_in'])->format('h:i A') : '' }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-1">
                                        {{ $fee['attendanceRecord']['morning_check_out'] ? \Carbon\Carbon::parse($fee['attendanceRecord']['morning_check_out'])->format('h:i A') : '' }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-1">
                                        {{ $fee['attendanceRecord']['afternoon_check_in'] ? \Carbon\Carbon::parse($fee['attendanceRecord']['afternoon_check_in'])->format('h:i A') : '' }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-1">
                                        {{ $fee['attendanceRecord']['afternoon_check_out'] ? \Carbon\Carbon::parse($fee['attendanceRecord']['afternoon_check_out'])->format('h:i A') : '' }}
                                    </td>

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

                        <div class="py-2 text-sm text-gray-700">
                            <span class="font-semibold text-gray-900">Date:</span>
                            {{ \Carbon\Carbon::parse($fees[0]['attendanceRecord']['event']['start_date'])->format('F d, Y') }}
                            -
                            {{ \Carbon\Carbon::parse($fees[0]['attendanceRecord']['event']['end_date'])->format('F d, Y') }}
                        </div>

                        <hr>
                    </div>
                @endforeach
            </div>
            <div class="order-first lg:order-last">
                <div class="sticky top-20 flex w-full items-center justify-center bg-gray-50 p-5">
                    <div class="mx-auto max-w-md rounded-lg border border-gray-300 bg-gray-50 p-6 shadow-md">
                        <!-- Header -->
                        <div class="mb-4 text-center">
                            <h2 class="text-2xl font-bold text-gray-800">Student Fee Statement</h2>
                            <p class="text-sm text-gray-500">Fee ID: #{{ $fee->id }}</p>
                        </div>

                        <!-- Dashed Line -->
                        <div class="my-4 border-t-2 border-dashed border-gray-300"></div>

                        <!-- Fee Details -->
                        <div class="space-y-3 text-gray-700">
                            <div class="flex justify-between">
                                <span class="font-semibold">Total Fee:</span>
                                <span
                                    class="font-bold text-green-700">₱{{ number_format($fee->total_amount, 2) }}</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="font-semibold">Balance Due:</span>
                                <span class="font-bold text-red-500">₱{{ number_format($fee->balance, 2) }}</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="font-semibold">Category:</span>
                                <span>{{ $fee->category->category_name ?? 'N/A' }}</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="font-semibold">Issued By:</span>
                                {{-- <span>{{ $fee->issuer->user_name }}</span> --}}
                            </div>

                            <div class="flex justify-between gap-2">
                                <span class="font-semibold">Remarks:</span>
                                <span class="italic text-gray-500">{{ $fee->remarks ?? 'No remarks' }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="font-semibold">Status:</span>
                                <span>
                                    @if ($fee->status == 'pending')
                                        <span
                                            class="rounded-full bg-yellow-200 px-3 py-1 text-xs font-semibold text-yellow-900 shadow-sm">Pending</span>
                                    @elseif($fee->status == 'paid')
                                        <span
                                            class="rounded-full bg-green-200 px-3 py-1 text-xs font-semibold text-green-900 shadow-sm">Paid</span>
                                    @elseif($fee->status == 'waived')
                                        <span
                                            class="rounded-full bg-blue-200 px-3 py-1 text-xs font-semibold text-blue-900 shadow-sm">Waived</span>
                                    @endif
                                </span>
                            </div>
                        </div>

                        <!-- Dashed Line -->
                        <div class="my-4 border-t-2 border-dashed border-gray-300"></div>

                        <!-- Footer -->
                        <div class="text-center text-sm text-gray-600">
                            <p>Date Issued: {{ $fee->created_at->format('D, d M Y') }}</p>
                            <p class="mt-2 italic">This is a statement of fees that must be paid.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
