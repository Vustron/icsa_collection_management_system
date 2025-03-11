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
    <div class="flex flex-col items-center justify-center">
        <x-ui.error_handler.basic />
        <div class="flex w-full flex-wrap-reverse items-center justify-between gap-2 space-x-2 pb-2">
            <div class="pl-2 text-lg font-medium text-gray-800">
                {{ $student['first_name'] . ' ' . ($student['middle_name'] != null ? $student['middle_name'] . ' ' : '') . $student['last_name'] }}
                <span class="text-violet-800"> | {{ $payment['fee']['category']['category_name'] }}</span>
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

        <div class="flex w-full items-center justify-center bg-gray-50 p-5">
            <div class="mx-auto w-[350px] rounded-lg border border-gray-300 bg-white p-6 shadow-lg">
                <!-- Header -->
                <div class="mb-4 text-center">
                    <h2 class="text-xl font-bold text-gray-800">Payment Receipt</h2>
                    <p class="text-sm text-gray-500">Receipt No: #{{ $payment->id }}</p>
                </div>

                <!-- Dashed Line -->
                <div class="my-4 border-t-2 border-dashed border-gray-300"></div>

                <!-- Payment Details -->
                <div class="space-y-3 text-gray-700">
                    <div class="flex justify-between">
                        <span class="font-semibold">Amount Paid:</span>
                        <span class="font-bold text-green-700">₱{{ number_format($payment->amount_paid, 2) }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-semibold">Payment Method:</span>
                        <span class="capitalize">{{ $payment->payment_method }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-semibold">Received By:</span>
                        <span>{{ $payment->receivedBy->user_name }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-semibold">Fees Linked:</span>
                        <span>#{{ $payment->fees_id }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-semibold">Submission ID:</span>
                        <span>#{{ $payment->payment_submission_id }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-semibold">Date Paid:</span>
                        <span>{{ $payment->created_at->format('D, d M Y') }}</span>
                    </div>
                </div>

                <!-- Dashed Line -->
                <div class="my-4 border-t-2 border-dashed border-gray-300"></div>

                <!-- Footer -->
                <div class="text-center text-sm text-gray-600">
                    <p class="italic">Thank you for your payment!</p>
                </div>
            </div>

        </div>

    </div>
</x-layout>
