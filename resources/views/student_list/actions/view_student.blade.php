@section('page_title', 'View Student')
@section('page_header_title', 'Student Details')

@section('raw_css_links')
@endsection

@section('js_links')
    @vite(['resources/js/view/student_list/index.js'])
@endsection

@section('dialogs')
    {{-- @include('\student_list\dialogs\add_student') --}}
    @include('\student_list\dialogs\delete_student')
    @include('\student_list\dialogs\edit_student')
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
    <div class="flex flex-wrap-reverse items-center justify-between gap-2 space-x-2">
        <div class="pl-2 text-lg text-gray-800">
            Personal Details
        </div>
        <div class="flex justify-end space-x-2">
            <a href="{{ route('student_list.index') }}"
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
    <div class="mt-2 gap-2 lg:grid lg:grid-cols-[minmax(auto,250px)_1fr]">
        <div>
            {{-- shadow-[inset_0px_4px_10px_rgba(0,0,0,0.1)] --}}
            <div
                class="sticky top-[70px] grid border border-gray-100 border-t-gray-200 p-3 shadow sm:grid-cols-1 md:grid-cols-[.3fr_1fr] lg:grid-cols-1">
                {{-- border-l-[3px] border-l-violet-600 --}}
                <h2 class="font-bold text-violet-500">Full Name</h2>
                <span class="pl-5"
                    id="">{{ $student['first_name'] . ' ' . $student['middle_name'] . ' ' . $student['last_name'] }}</span>
                <h2 class="font-bold text-violet-500">Email</h2>
                <span class="break-words pl-5" id="">{{ $student['email'] }}</span>
                <h2 class="font-bold text-violet-500">School ID</h2>
                <span class="pl-5" id="">{{ $student['school_id'] }}</span>
                <h2 class="font-bold text-violet-500">RFID</h2>
                <span class="pl-5" id="">{{ $student['rfid'] }}</span>
                <h2 class="font-bold text-violet-500">Program</h2>
                <span class="pl-5" id="">{{ $student['program']['name'] }}</span>
                <h2 class="font-bold text-violet-500">Year and Set</h2>
                <span class="pl-5" id="">{{ $student['year'] . '-' . $student['set'] }}</span>
                <h2 class="font-bold text-violet-500">Status</h2>
                <span class="pl-5" id="">{{ $student['status'] }}</span>
            </div>
        </div>
        <div class="space-y-4 border-t border-t-gray-100 p-3">
            <div class="space-y-2">
                <div class="py-4 lg:py-0">
                    <div class="flex items-center justify-between">
                        <div class="text-lg text-violet-700">Fees</div>
                        <div class="flex items-center gap-2">
                            <label for="show-entries" class="text-base font-medium text-gray-700">Show</label>
                            <select id="show-entries"
                                class="rounded-md border-2 border-gray-300 text-sm focus:border-purple-500 focus:ring-purple-500">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                            <span class="text-md font-medium text-gray-700">entries</span>
                        </div>
                    </div>
                    <x-ui.table :headers="['#', 'Category', 'Total Amount', 'Balance', 'Status', 'Date Issued', 'Actions']" tb_id="student_fees_table">
                        @foreach ($fees as $fee)
                            <tr class="last:border-violet-700 even:bg-gray-100 hover:bg-violet-100">
                                <td class="border border-gray-300 px-4 py-1 text-center">{{ $fee['id'] }}</td>
                                <td class="border border-gray-300 px-4 py-1">
                                    {{ $fee['category']['category_name'] }}
                                </td>
                                <td class="border border-gray-300 px-4 py-1">₱{{ $fee['total_amount'] }}
                                <td class="border border-gray-300 px-4 py-1">₱{{ $fee['balance'] }}</td>
                                <td
                                    class="{{ $fee['status'] == 'pending' ? 'text-red-600' : 'text-green-600' }} border border-gray-300 px-4 py-1">
                                    {{ $fee['status'] }} </td>
                                <td class="border border-gray-300 px-4 py-1">
                                    {{ $fee['created_at']->format('l, F j') }}
                                </td>
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
                </div>
                <div
                    class="mt-3 flex flex-wrap-reverse items-center justify-center gap-2 px-2 md:mt-0 md:justify-between">
                    <div class="text-lg">Balance: <span>₱{{ number_format($total_fees_balance, 2) }}</span></div>
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
            </div>
            {{--  --}}
            <hr>
            <div class="space-y-2">
                <div class="py-4 lg:py-0">
                    <div class="flex items-center justify-between">
                        <div class="text-lg text-violet-700">Payments</div>
                        <div class="flex items-center gap-2">
                            <div class="flex items-center gap-2">
                                <label for="show-entries" class="text-base font-medium text-gray-700">Show</label>
                                <select id="show-entries"
                                    class="rounded-md border-2 border-gray-300 text-sm focus:border-purple-500 focus:ring-purple-500">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                                <span class="text-md font-medium text-gray-700">entries</span>
                            </div>
                            <button
                                class="flex items-center gap-2 rounded-lg bg-violet-500 px-2 py-2 text-sm font-medium text-white shadow-md transition hover:bg-violet-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Create New
                            </button>
                        </div>
                    </div>
                    <x-ui.table :headers="[
                        '#',
                        'Category',
                        'Amount',
                        'Payment method',
                        'Received by',
                        'Date of payment',
                        'Actions'
                    ]" tb_id="student_fees_table">
                        @foreach ($payments as $payment)
                            <tr class="last:border-violet-700 even:bg-gray-100 hover:bg-violet-100">
                                <td class="border border-gray-300 px-4 py-1 text-center">{{ $payment['id'] }}</td>
                                <td class="border border-gray-300 px-4 py-1">
                                    {{ $payment['fee']['category']['category_name'] }}
                                </td>
                                <td class="border border-gray-300 px-4 py-1">₱{{ $payment['amount_paid'] }}
                                <td class="border border-gray-300 px-4 py-1">{{ $payment['payment_method'] }}</td>
                                <td class="border border-gray-300 px-4 py-1">{{ $payment['receivedBy']['user_name'] }}
                                </td>
                                <td class="border border-gray-300 px-4 py-1">
                                    {{ $payment['created_at']->format('l, F j') }}</td>
                                <td class="border border-gray-300 px-4 py-1">
                                    <div class="flex items-center justify-center gap-2">

                                        <a
                                            href="{{ route('student_list.show_payment', ['id' => $student['id'], $payment['id']]) }}">
                                            <x-bi-eye-fill
                                                class="view-student size-5 cursor-pointer text-green-500 hover:text-green-700"
                                                data-user="{{ json_encode(1) }}" />
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
                </div>
                <div
                    class="mt-3 flex flex-wrap-reverse items-center justify-center gap-2 px-2 md:mt-0 md:justify-between">
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
            </div>
            {{--  --}}
            <hr>
            <div class="space-y-2">
                <div class="py-4 lg:py-0">
                    <div class="flex items-center justify-between">
                        <div class="text-lg text-violet-700">Payment Submissions</div>
                        <div class="flex items-center gap-2">
                            <label for="show-entries" class="text-base font-medium text-gray-700">Show</label>
                            <select id="show-entries"
                                class="rounded-md border-2 border-gray-300 text-sm focus:border-purple-500 focus:ring-purple-500">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                            <span class="text-md font-medium text-gray-700">entries</span>
                        </div>
                    </div>
                    <x-ui.table :headers="['#', 'Category', 'Amount', 'Status', 'Reviewed by', 'Date of payment', 'Actions']" tb_id="student_fees_table">
                        @foreach ($payment_submissions as $payment_submission)
                            <tr class="last:border-violet-700 even:bg-gray-100 hover:bg-violet-100">
                                <td class="border border-gray-300 px-4 py-1 text-center">
                                    {{ $payment_submission['id'] }}</td>
                                <td class="border border-gray-300 px-4 py-1">
                                    {{ $payment_submission['fee']['category']['category_name'] }}
                                </td>
                                <td class="border border-gray-300 px-4 py-1">
                                    ₱{{ $payment_submission['amount_paid'] }}
                                </td>
                                <td class="border border-gray-300 px-4 py-1">{{ $payment_submission['status'] }}</td>
                                <td class="border border-gray-300 px-4 py-1">
                                    {{ $payment_submission['reviewed_by'] }}
                                </td>
                                <td class="border border-gray-300 px-4 py-1">
                                    {{ $payment_submission['created_at']->format('l, F j') }}</td>
                                <td class="border border-gray-300 px-4 py-1">
                                    <div class="flex items-center justify-center gap-2">
                                        <a
                                            href="{{ route('student_list.show_payment_submission', ['id' => $student['id'], $payment_submission['id']]) }}">
                                            <x-bi-eye-fill
                                                class="size-5 cursor-pointer text-green-500 hover:text-green-700" />
                                        </a><x-bx-pencil
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
                </div>
                <div
                    class="mt-3 flex flex-wrap-reverse items-center justify-center gap-2 px-2 md:mt-0 md:justify-between">
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
            </div>
        </div>
    </div>
</x-layout>
