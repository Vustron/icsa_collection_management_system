@section('page_title', 'Student List')
@section('page_header_title', 'Student List')

@section('raw_css_links')
@endsection

@section('js_links')
@endsection

<x-layout>
    <div class="mb-4 flex items-center justify-between">
        <div>
            <label for="show-entries" class="text-sm font-medium text-gray-700">Show</label>
            <select id="show-entries"
                class="rounded-md border-2 border-gray-300 text-sm focus:border-purple-500 focus:ring-purple-500">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
            <span class="text-sm font-medium text-gray-700">entries</span>
        </div>

        <div class="flex items-center gap-1">
            <!-- filter -->
            <button onclick="showDialog('filterDialog')"
                class="flex rounded-md bg-gray-200 px-3 py-2 text-sm text-black hover:bg-gray-300">
                {{-- <img src="/storage/icons/filter.png" alt="filter" class="h-5 w-5"> --}}
                <span class="px-2">Filter</span>
            </button>
            <div id="filterDialog" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50">
                <div class="w-96 rounded-lg bg-white p-6">
                    <div class="mb-4 flex items-center justify-between">
                        <h3 class="text-xl font-semibold">Filter</h3>
                        <button class="close-dialog text-2xl text-gray-500 hover:text-gray-700">&times;</button>
                    </div>

                    <!-- filter by program -->
                    <div class="mb-4">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Filter by
                            Program</label>
                        <select id="filterProgram"
                            class="w-full rounded-md border px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500">
                            <option value="">Select Program</option>
                            <option value="BSIT">BSIT</option>
                            <option value="BSIS">BSIS</option>
                        </select>
                    </div>
                    {{-- filter by year --}}
                    <div class="mb-4">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Filter by Year</label>
                        <select id="filterYear"
                            class="w-full rounded-md border px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500">
                            <option value="">Select Year</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    {{-- filter by set --}}
                    <div class="mb-4">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Filter by Set</label>
                        <select id="filterSet"
                            class="w-full rounded-md border px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500">
                            <option value="">Select Set</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                        </select>
                    </div>

                    <!-- actions -->
                    <div class="flex justify-end space-x-2">
                        <button id="resetFilters"
                            class="rounded-md bg-gray-200 px-4 py-2 text-sm text-black hover:bg-gray-300">
                            Reset Filters
                        </button>
                        <button id="applyFilters"
                            class="rounded-md bg-purple-500 px-4 py-2 text-sm text-white hover:bg-purple-600">
                            Apply Filters
                        </button>
                    </div>
                </div>
            </div>
            <div>
                <input type="text" id="search" class="rounded-md border-2 border-gray-300 px-4 py-2 text-sm"
                    placeholder="Search...">
            </div>
            <button onclick="showDialog('student_list_add_student')"
                class="rounded-md bg-purple-500 px-4 py-2 text-sm text-white hover:bg-purple-600">
                + Add Collection
            </button>

            {{-- <div id="addCollectionDialog"
                class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50"> --}}
            <dialog id="student_list_add_student">
                <div class="w-96 rounded-lg bg-white p-6">
                    <div class="mb-4 flex items-center justify-between">
                        <h3 class="text-xl font-semibold">Add Record</h3>
                        <button class="text-2xl text-gray-500 hover:text-gray-700"
                            onclick="closeDialog('student_list_add_student')">&times;</button>
                    </div>

                    <form id="addCollectionForm">
                        <div class="mb-4">
                            <label for="studentId" class="block text-sm font-medium text-gray-700">Student
                                ID</label>
                            <span class="flex">
                                <input type="text" id="dialogstudentId"
                                    class="mt-1 block w-full rounded-md border-2 border-gray-300 px-4 py-2 text-sm"
                                    placeholder="Student ID">
                            </span>
                        </div>

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Full
                                Name</label>
                            <input type="text" id="dialogname"
                                class="mt-1 block w-full rounded-md border-2 border-gray-300 px-4 py-2 text-sm"
                                placeholder="Full Name">
                        </div>

                        <div class="mb-4">
                            <label for="program" class="block text-sm font-medium text-gray-700">Program</label>
                            <input type="text" id="dialogprogram"
                                class="mt-1 block w-full rounded-md border-2 border-gray-300 px-4 py-2 text-sm"
                                placeholder="Program">
                        </div>

                        <div class="mb-4 inline-flex">
                            <label for="dialogyear"
                                class="block pr-2 pt-2 text-sm font-medium text-gray-700">Year</label>
                            <select id="dialogyear" class="w-50 mr-2 rounded-md border-2 px-3 py-2 text-sm">
                                <option value="">Select Year</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>

                            <label for="dialogset" class="block pr-2 pt-2 text-sm font-medium text-gray-700">Set</label>
                            <select id="dialogset" class="w-50 rounded-md border-2 px-3 py-2 text-sm">
                                <option value="">Select Set</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                                <option value="H">H</option>
                            </select>
                        </div>

                        <button type="submit"
                            class="w-full rounded-md bg-purple-500 px-4 py-2 text-sm text-white hover:bg-purple-600">
                            + Confirm Add Collection
                        </button>
                    </form>
                </div>
            </dialog>
        </div>
    </div>
    </div>

    <!-- table -->
    <table class="w-full overflow-x-auto rounded-lg border-gray-200 bg-white">
        <thead class="bg-purple-200">
            <tr>
                <th class="px-4 py-2 text-left text-sm font-medium text-purple-700">#</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-purple-700">Student ID</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-purple-700">Full Name</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-purple-700">Program</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-purple-700">Year & Set</th>
                <th class="py-2 pr-7 text-sm font-medium text-purple-700">Action</th>
            </tr>
        </thead>
        <tbody id="student-table">
        </tbody>
    </table>

    <div class="mt-4 flex items-center justify-between">
        <div>
            <p id="showing-info" class="text-sm text-gray-700">Showing 1 to 10 of 0 entries</p>
        </div>
        <div class="flex space-x-2" id="pagination">
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // sample data
            const students = [{
                    id: 1,
                    studentId: "2023-00001",
                    name: "Alex, Jr, A. Aparece",
                    program: "BSIT",
                    year: 1,
                    set: "A",
                },
                {
                    id: 2,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    year: 3,
                    set: "D",
                },
                {
                    id: 3,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    year: 2,
                    set: "C",
                },
                {
                    id: 4,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    year: 3,
                    set: "D",
                },
                {
                    id: 5,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    year: 2,
                    set: "C",
                },
                {
                    id: 6,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    year: 3,
                    set: "D",
                },
                {
                    id: 7,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    year: 2,
                    set: "C",
                },
                {
                    id: 8,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    year: 3,
                    set: "D",
                },
                {
                    id: 9,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    year: 2,
                    set: "C",
                },
                {
                    id: 10,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    year: 3,
                    set: "D",
                },
                {
                    id: 11,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    year: 2,
                    set: "C",
                },
                {
                    id: 4,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    year: 3,
                    set: "D",
                },
                {
                    id: 5,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    year: 2,
                    set: "C",
                },
                {
                    id: 6,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    year: 3,
                    set: "D",
                },
                {
                    id: 7,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    year: 2,
                    set: "C",
                },
                {
                    id: 8,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    year: 3,
                    set: "D",
                },
                {
                    id: 9,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    year: 2,
                    set: "C",
                },
                {
                    id: 10,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    year: 3,
                    set: "D",
                },
                {
                    id: 11,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    year: 2,
                    set: "C",
                },
                {
                    id: 4,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    year: 3,
                    set: "D",
                },
                {
                    id: 5,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    year: 2,
                    set: "C",
                },
                {
                    id: 6,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    year: 3,
                    set: "D",
                },
                {
                    id: 7,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    year: 2,
                    set: "C",
                },
                {
                    id: 8,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    year: 3,
                    set: "D",
                },
                {
                    id: 9,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    year: 2,
                    set: "C",
                },
                {
                    id: 10,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    year: 3,
                    set: "D",
                },
                {
                    id: 11,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    year: 2,
                    set: "C",
                },
            ];

            const rowsPerPageOptions = [10, 25, 50];
            const tableBody = document.getElementById("student-table");
            const searchInput = document.getElementById("search");
            const showEntriesSelect = document.getElementById("show-entries");
            const paginationContainer = document.getElementById("pagination");
            const showingInfo = document.getElementById("showing-info");

            let rowsPerPage = rowsPerPageOptions[0];
            let currentPage = 1;
            let filteredStudents = [...students];

            //sorts student names by asc
            filteredStudents.sort((a, b) => {
                return a.name.localeCompare(b.name);
            });

            function renderTable() {
                const start = (currentPage - 1) * rowsPerPage;
                const end = start + rowsPerPage;
                const visibleStudents = filteredStudents.slice(start, end);

                filteredStudents.sort((a, b) => {
                    return a.name.localeCompare(b.name);
                });

                tableBody.innerHTML = visibleStudents
                    .map(
                        (student, index) => `
                        <tr class="border-b">
                            <td class="px-4 py-2 text-sm text-gray-700">${start + index + 1}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">${student.studentId}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">${student.name}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">${student.program}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">${student.year} - ${student.set}</td>
                <td class="px-4 py-2 text-sm text-gray-700">
                    <div class="flex gap-1 justify-center ">
                        <button onclick="viewStudent('${student.id}')"
                                class="text-blue-600 hover:text-blue-800 flex items-center">
                                <x-bx-history class="ml-1 size-5 flex-shrink-0" />
                        </button>
                        <button onclick="editStudent('${student.id}')"
                                class="text-green-600 hover:text-green-800 flex items-center">
                                <x-bx-history class="ml-1 size-5 flex-shrink-0" />
                        </button>
                        <button onclick="deleteStudent('${student.id}')"
                                class="text-red-600 hover:text-red-800 flex items-center">
                                <x-bx-history class="ml-1 size-5 flex-shrink-0" />
                        </button>
                    </div>
                </td>
                        </tr>
                    `
                    )
                    .join("");

                renderPagination();
                updateShowingInfo();
            }

            function renderPagination() {
                const totalPages = Math.ceil(filteredStudents.length / rowsPerPage);
                paginationContainer.innerHTML = "";

                for (let i = 1; i <= totalPages; i++) {
                    const button = document.createElement("button");
                    button.textContent = i;
                    button.className =
                        `px-3 py-1 ${i === currentPage ? "bg-purple-500 text-white" : "bg-gray-200"} rounded hover:bg-purple-600`;
                    button.addEventListener("click", () => {
                        currentPage = i;
                        renderTable();
                    });
                    paginationContainer.appendChild(button);
                }
            }

            function updateShowingInfo() {
                const start = (currentPage - 1) * rowsPerPage + 1;
                const end = Math.min(currentPage * rowsPerPage, filteredStudents.length);
                showingInfo.textContent = `Showing ${start} to ${end} of ${filteredStudents.length} entries`;
            }

            function showDialog(dialogId) {
                document.getElementById(dialogId).classList.remove('hidden');
                document.getElementById(dialogId).classList.add('flex');
            }

            function closeDialog(dialogId) {
                document.getElementById(dialogId).classList.remove('flex');
                document.getElementById(dialogId).classList.add('hidden');
            }

            // search function
            searchInput.addEventListener("input", (e) => {
                const searchTerm = e.target.value.toLowerCase();
                filteredStudents = students.filter(
                    (student) =>
                    student.studentId.toLowerCase().includes(searchTerm) ||
                    student.name.toLowerCase().includes(searchTerm)
                );

                filteredStudents.sort((a, b) => {
                    return a.name.localeCompare(b.name);
                });

                currentPage = 1;
                renderTable();
            });

            showEntriesSelect.addEventListener("change", (e) => {
                rowsPerPage = parseInt(e.target.value);
                currentPage = 1;
                renderTable();
            });

            // dialog event listeners
            document.querySelectorAll('.close-dialog').forEach(button => {
                button.addEventListener('click', (e) => {
                    const dialog = e.target.closest('.fixed');
                    closeDialog(dialog.id);
                });
            });

            // filter function
            document.getElementById("applyFilters").addEventListener("click", () => {
                const program = document.getElementById("filterProgram").value;
                const year = document.getElementById("filterYear").value;
                const set = document.getElementById("filterSet").value;

                filteredStudents = students.filter(student => {
                    return (program === "" || student.program === program) &&
                        (year === "" || student.year === parseInt(year)) &&
                        (set === "" || student.set === set);
                });

                filteredStudents.sort((a, b) => {
                    return a.name.localeCompare(b.name);
                });

                currentPage = 1;
                renderTable();
                closeDialog("filterDialog");
            });

            // reset filters
            document.getElementById("resetFilters").addEventListener("click", () => {
                document.getElementById("filterProgram").value = "";
                document.getElementById("filterYear").value = "";
                document.getElementById("filterSet").value = "";

                filteredStudents = [...students];
                filteredStudents.sort((a, b) => {
                    return a.name.localeCompare(b.name);
                });

                currentPage = 1;
                renderTable();
            });

            // form submission to add record
            document.getElementById("addCollectionForm").addEventListener("submit", (e) => {
                e.preventDefault();
                //form submission logic here

                // close after submission
                closeDialog("addCollectionDialog");
            });

            window.showDialog = showDialog;
            renderTable();
        });
    </script>
</x-layout>
