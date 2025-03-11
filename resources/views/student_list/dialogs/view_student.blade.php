<x-ui.modal.dialog id="view_student" title="Student Details" class="w-[90%]">
    <div class="mt-2 lg:grid lg:grid-cols-[minmax(auto,250px)_1fr]">
        <div
            class="grid border-l-[3px] border-l-violet-600 p-3 shadow-lg sm:grid-cols-1 md:grid-cols-[.3fr_1fr] lg:grid-cols-1">
            <h2 class="font-bold text-violet-500">Full Name</h2>
            <span class="pl-5" id="">Alex, Jr. A. Aparece</span>
            <h2 class="font-bold text-violet-500">Email</h2>
            <span class="break-words pl-5" id="">alexarnaizaparece@gmail.com@gmail.com</span>
            <h2 class="font-bold text-violet-500">School ID</h2>
            <span class="pl-5" id="">2023-00468</span>
            <h2 class="font-bold text-violet-500">RFID</h2>
            <span class="pl-5" id="">0922ayawtuo</span>
            <h2 class="font-bold text-violet-500">Program</h2>
            <span class="pl-5" id="">BS Information Technology</span>
            <h2 class="font-bold text-violet-500">Year and Set</h2>
            <span class="pl-5" id="">2B</span>
            <h2 class="font-bold text-violet-500">Status</h2>
            <span class="pl-5" id="">Single</span>
        </div>
        <div class="space-y-3 p-3">
            <div class="">
                <div class="py-4 lg:py-0">
                    <div class="flex items-center justify-between">
                        <div class="text-lg text-violet-700">Fees</div>
                        <button
                            class="flex items-center gap-2 rounded bg-purple-700 px-2 py-1 text-white shadow-md hover:bg-purple-800">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19 7H5V3h14v4zM6 8h12a2 2 0 0 1 2 2v6h-4v4H6v-4H2v-6a2 2 0 0 1 2-2zm2 9v2h8v-2H8zm8-6h2v4h-2v-4zm-4 0h2v4h-2v-4zm-4 0h2v4H8v-4z" />
                            </svg>
                            Print
                        </button>
                    </div>
                    <x-ui.table :headers="['#', 'Category', 'Total Amount', 'Issued By', 'Date Issued', 'Actions']" tb_id="student_fees_table">
                        <tr class="last:border-violet-700 even:bg-gray-100 hover:bg-violet-100">
                            <td class="border border-gray-300 px-4 py-1 text-center">1</td>
                            <td class="border border-gray-300 px-4 py-1">Locker</td>
                            <td class="border border-gray-300 px-4 py-1">200</td>
                            <td class="border border-gray-300 px-4 py-1">Alex Gwapo</td>
                            <td class="border border-gray-300 px-4 py-1">02/15/2005</td>
                            <td class="border border-gray-300 px-4 py-1">
                                <div class="flex items-center justify-center gap-2">
                                    <x-bi-eye-fill
                                        class="view-student size-5 cursor-pointer text-green-500 hover:text-green-700"
                                        data-user="{{ json_encode(1) }}" onclick="showDialogByID('view_student')" />
                                    <x-bx-pencil
                                        class="edit-student size-5 cursor-pointer text-orange-500 hover:text-orange-700"
                                        data-user="{{ json_encode(2) }}" />
                                    <x-bi-trash
                                        class="delete-student size-5 cursor-pointer text-red-500 hover:text-red-700"
                                        data-user="{{ json_encode(3) }}" />
                                </div>
                            </td>
                        </tr>
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

            <div class="">
                <div class="py-4 lg:py-0">
                    <div class="flex items-center justify-between">
                        <div class="text-lg text-violet-700">Payments</div>
                        <button
                            class="flex items-center gap-2 rounded bg-purple-700 px-2 py-1 text-white shadow-md hover:bg-purple-800">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19 7H5V3h14v4zM6 8h12a2 2 0 0 1 2 2v6h-4v4H6v-4H2v-6a2 2 0 0 1 2-2zm2 9v2h8v-2H8zm8-6h2v4h-2v-4zm-4 0h2v4h-2v-4zm-4 0h2v4H8v-4z" />
                            </svg>
                            Print
                        </button>
                    </div>
                    <x-ui.table :headers="['#', 'Category', 'Amount', 'Payment method', 'Received by', 'Date of payment']" tb_id="student_fees_table">
                        <tr class="last:border-violet-700 even:bg-gray-100 hover:bg-violet-100">

                        </tr>
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
</x-ui.modal.dialog>
