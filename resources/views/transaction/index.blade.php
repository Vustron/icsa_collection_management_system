@section('page_title', 'ICCMS')

{{-- e butang here ang mga links na customized specifically for this page aron dele mag conflict sa uban --}}
@section('raw_css_links')
@endsection

@section('js_links')
@endsection

<x-layout>
    <div class="container mx-auto p-4">
        <div class="rounded-lg bg-white p-6 shadow">
            <h1 class="mb-5 mt-1 text-3xl font-bold text-purple-700">Transactions</h1>

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

                <div class="flex items-center space-x-4">
                    <!-- filter -->
                    <button onclick="showDialog('filterDialog')"
                        class="flex rounded-md bg-gray-200 px-3 py-2 text-sm text-black hover:bg-gray-300">
                        <img src="/storage/icons/filter.png" alt="filter" class="h-5 w-5">
                        <span class="px-2">Filter</span>
                    </button>
                    <div id="filterDialog"
                        class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50">
                        <div class="w-96 rounded-lg bg-white p-6">

                            <div class="mb-4 flex items-center justify-between">
                                <h3 class="text-xl font-semibold">Filter Transaction</h3>
                                <button class="close-dialog text-2xl text-gray-500 hover:text-gray-700">&times;</button>
                            </div>

                            <!-- filter by category -->
                            <div class="mb-4">
                                <label class="mb-1 block text-sm font-medium text-gray-700">Filter by Category</label>
                                <select id="filterCategory"
                                    class="w-full rounded-md border px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    <option value="">Select Category</option>
                                    <option value="Fines">Fines</option>
                                    <option value="Locker">Locker</option>
                                </select>
                            </div>

                            <!-- filter by program -->
                            <div class="mb-4">
                                <label class="mb-1 block text-sm font-medium text-gray-700">Filter by Program</label>
                                <select id="filterProgram"
                                    class="w-full rounded-md border px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    <option value="">Select Program</option>
                                    <option value="BSIT">BSIT</option>
                                    <option value="BSIS">BSIS</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="mb-1 block text-sm font-medium text-gray-700">Filter by Date</label>
                                <input id="filterDate" type="date"
                                    class="w-full rounded-md border px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500"
                                    pattern="\d{2}/\d{2}/\d{2}">
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
                        <input type="text" id="search"
                            class="rounded-md border-2 border-gray-300 px-4 py-2 text-sm" placeholder="Search...">
                    </div>
                    <button onclick="showDialog('addCollectionDialog')"
                        class="rounded-md bg-purple-500 px-4 py-2 text-sm text-white hover:bg-purple-600">
                        + Add Collection
                    </button>

                    <div id="addCollectionDialog"
                        class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50">
                        <div class="w-96 rounded-lg bg-white p-6">
                            <div class="mb-4 flex items-center justify-between">
                                <h3 class="text-xl font-semibold">Add New Collection</h3>
                                <button class="close-dialog text-2xl text-gray-500 hover:text-gray-700">&times;</button>
                            </div>

                            <form id="addCollectionForm">
                                <div class="mb-4">
                                    <label for="studentId" class="block text-sm font-medium text-gray-700">Student
                                        ID</label>
                                    <span class="flex">
                                        <input type="text" id="dialogstudentId"
                                            class="mt-1 block w-full rounded-md border-2 border-gray-300 px-4 py-2 text-sm"
                                            placeholder="Student ID">
                                        <button type="button" id="dialogsearchStudent"
                                            class="rounded-md bg-gray-200 px-3 py-2 text-sm text-black hover:bg-gray-300">
                                            Search
                                        </button>
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
                                    <label for="program"
                                        class="block text-sm font-medium text-gray-700">Program</label>

                                    <input type="text" id="dialogprogram"
                                        class="mt-1 block w-full rounded-md border-2 border-gray-300 px-4 py-2 text-sm"
                                        placeholder="Program">

                                    {{-- i dont know if default value naba yung program --}}

                                    {{-- <select id="dialogprogram" class="w-full px-3 py-2 border-2 rounded-md text-sm">
                                        <option value="">Select Program</option>
                                        <option value="Fines">BSIT</option>
                                        <option value="Locker">BSIS</option>
                                    </select> --}}

                                </div>

                                <div class="mb-4">
                                    <label for="dialogcategory"
                                        class="block text-sm font-medium text-gray-700">Category</label>
                                    <select id="dialogcategory" class="w-full rounded-md border-2 px-3 py-2 text-sm">
                                        {{-- unod ani ma change based sa category table sa DB, this serves as sample for now --}}
                                        <option value="">Select Category</option>
                                        <option value="Fines">Fines</option>
                                        <option value="Locker">Locker</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                    <input type="date" id="dialogdate"
                                        class="mt-1 block w-full rounded-md border-2 border-gray-300 px-4 py-2 text-sm">
                                </div>

                                <div class="mb-4">
                                    <label for="amount"
                                        class="block text-sm font-medium text-gray-700">Amount</label>
                                    <input type="number" id="dialogamount"
                                        class="mt-1 block w-full rounded-md border-2 border-gray-300 px-4 py-2 text-sm"
                                        placeholder="0.00">
                                </div>

                                <button type="submit"
                                    class="w-full rounded-md bg-purple-500 px-4 py-2 text-sm text-white hover:bg-purple-600">
                                    + Confirm Add Collection
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- table -->
            <div class="overflow-x-auto">
                <table class="min-w-full rounded-lg border border-gray-200 bg-white">
                    <thead class="bg-purple-200">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-purple-700">#</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-purple-700">Student ID</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-purple-700">Full Name</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-purple-700">Program</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-purple-700">Category</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-purple-700">Date</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-purple-700">Amount</th>
                        </tr>
                    </thead>
                    <tbody id="student-table">
                    </tbody>
                </table>
            </div>

            <div class="mt-4 flex items-center justify-between">
                <div>
                    <p id="showing-info" class="text-sm text-gray-700">Showing 1 to 10 of 0 entries</p>
                </div>
                <div class="flex space-x-2" id="pagination">
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {

            // sample data palang, will be changed when mag kuha na ug data from DB
            const students = [{
                    id: 1,
                    studentId: "2023-00001",
                    name: "Alex, Jr, A. Aparece",
                    program: "BSIT",
                    category: "Fines",
                    date: "01/25/2025",
                    amount: "250.00"
                },
                {
                    id: 2,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    category: "Fines",
                    date: "01/25/2025",
                    amount: "250.00"
                },
                {
                    id: 3,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    category: "Fines",
                    date: "01/25/2025",
                    amount: "250.00"
                },
                {
                    id: 1,
                    studentId: "2023-00001",
                    name: "Alex, Jr, A. Aparece",
                    program: "BSIT",
                    category: "Fines",
                    date: "01/25/2025",
                    amount: "250.00"
                },
                {
                    id: 2,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    category: "Fines",
                    date: "01/25/2025",
                    amount: "250.00"
                },
                {
                    id: 3,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    category: "Fines",
                    date: "01/25/2025",
                    amount: "250.00"
                },
                {
                    id: 1,
                    studentId: "2023-00001",
                    name: "Alex, Jr, A. Aparece",
                    program: "BSIT",
                    category: "Fines",
                    date: "01/25/2025",
                    amount: "250.00"
                },
                {
                    id: 2,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    category: "Fines",
                    date: "01/25/2025",
                    amount: "250.00"
                },
                {
                    id: 3,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    category: "Fines",
                    date: "01/25/2025",
                    amount: "250.00"
                },
                {
                    id: 1,
                    studentId: "2023-00001",
                    name: "Alex, Jr, A. Aparece",
                    program: "BSIT",
                    category: "Fines",
                    date: "01/25/2025",
                    amount: "250.00"
                },
                {
                    id: 2,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    category: "Fines",
                    date: "01/25/2025",
                    amount: "250.00"
                },
                {
                    id: 3,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    category: "Fines",
                    date: "01/25/2025",
                    amount: "250.00"
                },
                {
                    id: 1,
                    studentId: "2023-00001",
                    name: "Alex, Jr, A. Aparece",
                    program: "BSIT",
                    category: "Fines",
                    date: "01/25/2025",
                    amount: "250.00"
                },
                {
                    id: 2,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    category: "Fines",
                    date: "01/25/2025",
                    amount: "250.00"
                },
                {
                    id: 3,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    category: "Fines",
                    date: "01/30/2025",
                    amount: "250.00"
                },
                {
                    id: 1,
                    studentId: "2023-00001",
                    name: "Alex, Jr, A. Aparece",
                    program: "BSIT",
                    category: "Locker",
                    date: "01/29/2025",
                    amount: "250.00"
                },
                {
                    id: 2,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    category: "Fines",
                    date: "01/27/2025",
                    amount: "250.00"
                },
                {
                    id: 3,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    category: "Fines",
                    date: "01/25/2025",
                    amount: "250.00"
                },
                {
                    id: 1,
                    studentId: "2023-00001",
                    name: "Alex, Jr, A. Aparece",
                    program: "BSIT",
                    category: "Fines",
                    date: "01/28/2025",
                    amount: "250.00"
                },
                {
                    id: 2,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    category: "Locker",
                    date: "01/28/2025",
                    amount: "250.00"
                },
                {
                    id: 3,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    category: "Locker",
                    date: "02/25/2025",
                    amount: "250.00"
                },
                {
                    id: 1,
                    studentId: "2023-00624",
                    name: "Jane Doe ",
                    program: "BSIT",
                    category: "Fines",
                    date: "03/22/2025",
                    amount: "250.00"
                },
                {
                    id: 2,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    category: "Locker",
                    date: "01/23/2025",
                    amount: "250.00"
                },
                {
                    id: 3,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    category: "Fines",
                    date: "01/24/2025",
                    amount: "250.00"
                },
                {
                    id: 1,
                    studentId: "2023-00001",
                    name: "Alex, Jr, A. Aparece",
                    program: "BSIT",
                    category: "Fines",
                    date: "01/26/2025",
                    amount: "250.00"
                },
                {
                    id: 2,
                    studentId: "2023-00002",
                    name: "John Doe",
                    program: "BSIT",
                    category: "Locker",
                    date: "01/25/2025",
                    amount: "250.00"
                },
                {
                    id: 3,
                    studentId: "2023-00003",
                    name: "Jane Smith",
                    program: "BSIS",
                    category: "Locker",
                    date: "01/31/2025",
                    amount: "250.00"
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

            //sorts transaction date by desc
            filteredStudents.sort((a, b) => {
                return new Date(b.date) - new Date(a.date);
            });

            //renders student transactions
            function renderTable() {
                const start = (currentPage - 1) * rowsPerPage;
                const end = start + rowsPerPage;
                const visibleStudents = filteredStudents.slice(start, end);

                filteredStudents.sort((a, b) => {
                    return new Date(b.date) - new Date(a.date);
                });

                tableBody.innerHTML = visibleStudents
                    .map(
                        (student, index) => `
                <tr class="border-b">
                    <td class="px-4 py-2 text-sm text-gray-700">${start + index + 1}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">${student.studentId}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">${student.name}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">${student.program}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">${student.category}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">${student.date}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">₱ ${student.amount}</td>
                </tr>
            `
                    )
                    .join("");

                renderPagination();
                updateShowingInfo();
            }

            //pagination
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

            // event listener
            searchInput.addEventListener("input", (e) => {
                const searchTerm = e.target.value.toLowerCase();
                filteredStudents = students.filter(
                    (student) =>
                    student.studentId.toLowerCase().includes(searchTerm) ||
                    student.name.toLowerCase().includes(searchTerm)
                );
                filteredStudents.sort((a, b) => {
                    return new Date(b.date) - new Date(a.date);
                });
                currentPage = 1;
                renderTable();
            });

            showEntriesSelect.addEventListener("change", (e) => {
                rowsPerPage = parseInt(e.target.value);
                currentPage = 1;
                renderTable();
            });

            // dialog w/ event listeners
            document.querySelectorAll('.close-dialog').forEach(button => {
                button.addEventListener('click', (e) => {
                    const dialog = e.target.closest('.fixed');
                    closeDialog(dialog.id);
                });

            });


            function convertToDateInputFormat(dateStr) {
                if (!dateStr) return "";
                const [month, day, year] = dateStr.split("/");
                return `${year}-${month.padStart(2, "0")}-${day.padStart(2, "0")}`;
            }

            // filter function
            document.getElementById("applyFilters").addEventListener("click", () => {
                const category = document.getElementById("filterCategory").value;
                const program = document.getElementById("filterProgram").value;
                const date = document.getElementById("filterDate").value;

                filteredStudents = students.filter((student) => {
                    const studentDateFormatted = convertToDateInputFormat(student
                        .date);

                    return (
                        (category === "" || student.category === category) &&
                        (program === "" || student.program === program) &&
                        (date === "" || studentDateFormatted === date)
                    );
                });

                filteredStudents.sort((a, b) => {
                    return new Date(b.date) - new Date(a.date);
                });

                currentPage = 1;
                renderTable();
                closeDialog("filterDialog");
            });

            //filter reset
            document.getElementById("resetFilters").addEventListener("click", () => {
                document.getElementById("filterCategory").value = "";
                document.getElementById("filterProgram").value = "";
                document.getElementById("filterDate").value = "";

                filteredStudents = [...students];
                filteredStudents.sort((a, b) => {
                    return new Date(b.date) - new Date(a.date);
                });

                currentPage = 1;
                renderTable();
            });



            window.showDialog = showDialog;

            renderTable();


            //add-collection dialog student search
            const studentIdInput = document.getElementById("dialogstudentId");
            const nameInput = document.getElementById("dialogname");
            const programInput = document.getElementById("dialogprogram");
            const dateInput = document.getElementById("dialogdate");
            const searchButton = document.getElementById("dialogsearchStudent");
            const student = null;

            searchButton.addEventListener("click", () => {
                const enteredId = studentIdInput.value.trim();

                const foundStudent = students.find((student) => student.studentId ===
                    enteredId);

                if (foundStudent) {
                    nameInput.value = foundStudent.name;
                    programInput.value = foundStudent.program;

                    const today = new Date();
                    const year = today.getFullYear();
                    const month = String(today.getMonth() + 1).padStart(2, "0");
                    const day = String(today.getDate()).padStart(2, "0");
                    const formattedDate = `${year}-${month}-${day}`;
                    dateInput.value = formattedDate;

                } else {
                    nameInput.value = "";
                    programInput.value = "";
                    dateInput.value = "";
                }
            });
        });
    </script>

</x-layout>
