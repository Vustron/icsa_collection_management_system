@section('page_title', 'Student Details')
@section('page_header_title', 'Student Payment Submissions')

@section('raw_css_links')
@endsection

@section('js_links')
    {{-- @vite(['resources/js/view/student_list/index.js']) --}}
@endsection

@section('dialogs')

@endsection

<x-layout>
    <div class="flex flex-col items-center justify-center">
        <x-ui.error_handler.basic />
        <div class="flex w-full flex-wrap-reverse items-center justify-between gap-2 space-x-2 pb-2">
            <div class="pl-2 text-lg font-medium text-gray-800">
                {{ $student['first_name'] . ' ' . ($student['middle_name'] != null ? $student['middle_name'] . ' ' : '') . $student['last_name'] }}
                <span class="text-violet-800"> | {{ $payment_submission['fee']['category']['category_name'] }}</span>
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

        <div class="flex w-full items-start justify-center gap-6 bg-gray-50 p-5">
            <!-- Fees Section -->
            <div class="w-1/3">
                <div class="rounded-lg border border-gray-300 bg-gray-50 p-6 shadow-md">
                    <div class="mb-4 text-center">
                        <h2 class="text-2xl font-bold text-gray-800">Student Fee Statement</h2>
                        <p class="text-sm text-gray-500">Fee ID: #{{ $payment_submission->fee->id }}</p>
                    </div>

                    <div class="my-4 border-t-2 border-dashed border-gray-300"></div>

                    <div class="space-y-3 text-gray-700">
                        <div class="flex justify-between">
                            <span class="font-semibold">Total Fee:</span>
                            <span
                                class="font-bold text-green-700">₱{{ number_format($payment_submission->fee->total_amount, 2) }}</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="font-semibold">Balance Due:</span>
                            <span
                                class="font-bold text-red-500">₱{{ number_format($payment_submission->fee->balance, 2) }}</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="font-semibold">Category:</span>
                            <span>{{ $payment_submission->fee->category->category_name ?? 'N/A' }}</span>
                        </div>

                        <div class="flex justify-between gap-2">
                            <span class="font-semibold">Remarks:</span>
                            <span
                                class="italic text-gray-500">{{ $payment_submission->fee->remarks ?? 'No remarks' }}</span>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="font-semibold">Status:</span>
                            <span>
                                @if ($payment_submission->fee->status == 'pending')
                                    <span
                                        class="rounded-full bg-yellow-200 px-3 py-1 text-xs font-semibold text-yellow-900 shadow-sm">Pending</span>
                                @elseif($payment_submission->fee->status == 'paid')
                                    <span
                                        class="rounded-full bg-green-200 px-3 py-1 text-xs font-semibold text-green-900 shadow-sm">Paid</span>
                                @elseif($payment_submission->fee->status == 'waived')
                                    <span
                                        class="rounded-full bg-blue-200 px-3 py-1 text-xs font-semibold text-blue-900 shadow-sm">Waived</span>
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="my-4 border-t-2 border-dashed border-gray-300"></div>

                    <div class="text-center text-sm text-gray-600">
                        <p>Date Issued: {{ $payment_submission->fee->created_at->format('D, d M Y') }}</p>
                        <p class="mt-2 italic">This is a statement of fees that must be paid.</p>
                    </div>
                </div>
            </div>

            <!-- Payment Submission Section -->
            <div class="w-2/3 rounded-xl border border-gray-200 bg-white p-6 shadow-lg">
                <h2 class="mb-4 text-2xl font-bold text-violet-600">Payment Submission</h2>

                <div class="flex gap-6">
                    <!-- Image Section -->
                    <div class="h-56 w-56">
                        <img src="{{ asset($payment_submission->screenshot_path) }}"
                            class="h-full w-full rounded-xl border border-gray-300 object-cover shadow-md"
                            alt="GCash Receipt">
                    </div>

                    <!-- Details Section -->
                    <div class="flex-1 space-y-4 text-gray-700">
                        <div class="flex justify-between">
                            <span class="font-semibold">Student ID:</span>
                            <span>{{ $payment_submission->student_id }}</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="font-semibold">Fee ID:</span>
                            <span>{{ $payment_submission->fees_id }}</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="font-semibold">Amount Paid:</span>
                            <span
                                class="font-semibold text-green-600">₱{{ number_format($payment_submission->amount_paid, 2) }}</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="font-semibold">Reference Number:</span>
                            <span>{{ $payment_submission->reference_number }}</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="font-semibold">Status:</span>
                            <span>
                                @if ($payment_submission->status == 'pending')
                                    <span
                                        class="rounded-full bg-yellow-200 px-3 py-1 text-xs font-semibold text-yellow-900 shadow-sm">Pending</span>
                                @elseif($payment_submission->status == 'approved')
                                    <span
                                        class="rounded-full bg-green-200 px-3 py-1 text-xs font-semibold text-green-900 shadow-sm">Approved</span>
                                @elseif($payment_submission->status == 'rejected')
                                    <span
                                        class="rounded-full bg-red-200 px-3 py-1 text-xs font-semibold text-red-900 shadow-sm">Rejected</span>
                                @endif
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="font-semibold">Reviewed By:</span>
                            <span>
                                @if ($payment_submission->reviewed_by)
                                    {{ $payment_submission->reviewed_by }}
                                @else
                                    <span class="italic text-gray-500">Not Reviewed</span>
                                @endif
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="font-semibold">Reviewed At:</span>
                            <span>
                                @if ($payment_submission->reviewed_at)
                                    {{ $payment_submission->reviewed_at->format('D, d M Y h:i A') }}
                                @else
                                    <span class="italic text-gray-500">Not Reviewed</span>
                                @endif
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="font-semibold">Remarks:</span>
                            <span class="italic text-gray-500">
                                {{ $payment_submission->remarks ?? 'No remarks' }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="font-semibold">Submitted At:</span>
                            <span>{{ $payment_submission->created_at->format('D, d M Y h:i A') }}</span>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-4">
                    <button
                        class="rounded-lg bg-red-600 px-4 py-2 font-semibold text-white shadow-md transition duration-200 hover:bg-red-700">
                        Reject
                    </button>

                    <button
                        class="rounded-lg bg-green-600 px-4 py-2 font-semibold text-white shadow-md transition duration-200 hover:bg-green-700">
                        Approve
                    </button>
                </div>
            </div>
        </div>

    </div>
</x-layout>
