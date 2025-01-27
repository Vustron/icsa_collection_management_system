<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ICCMS</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-white-100 text-gray-900 dark:bg-gray-800 dark:text-white">
    <!-- Navbar -->
    <header style="
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
      0 -4px 6px -2px rgba(0, 0, 0, 0.05);">
        <div id="navbar" class="flex flex-col transition-all duration-300 h-[4rem] top-[-14px] relative">
            <div class="flex items-center justify-between p-5">
                <span class="text-2xl font-normal mb-4 flex items-center left-[2rem] relative">
                    <img src="/storage/icons/icsaLogo.png" alt="Icsalogo" style="width: 49px; height: auto;">
                    ICCMS - Institute of Computing Collection Management System
                </span>
                <div class="flex items-center space-x-4">
                    <span class="flex items-center space-x-4 top-[-7px] right-[2rem] relative">
                        <!-- Notification Bell -->
                        <img src="/storage/icons/notif.png" alt="notif" style="width: 25px; height: auto;">
                        <!-- Admin Name placeholder sa-->
                        <span class="ml-3 w-full">Admin</span>

                        <button class="flex items-center text-gray-900 rounded-lg dark:text-white w-full"
                            onclick="toggleDropdown('profileDropdown')">
                            <ul id="profileDropdown"
                                class="hidden absolute top-full left-0 mt-2 w-48 space-y-1 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <li class="border-b-2 p-2">
                                    <span class="ml-3">Manage Account</span>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-white hover:bg-[#9747FF] dark:hover:bg-[#9747FF] group">

                                        <img src="/storage/icons/myAccount.png" alt="myaccount"
                                            style="width: 26px; height: auto;">
                                        <span class="ml-3">My Account</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-white hover:bg-[#9747FF] dark:hover:bg-[#9747FF] group">


                                        <img src="/storage/icons/admnManager.png" alt="adminmanager"
                                            style="width: 26px; height: auto;">
                                        <span class="ml-3">Admin Manager</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-white hover:bg-[#9747FF] dark:hover:bg-[#9747FF] group">
                                        <img src="/storage/icons/logOut.png" alt="logout"
                                            style="width: 26px; height: auto;">
                                        <span class="ml-3">Log out</span>
                                    </a>
                                </li>
                            </ul>
                            <img src="/storage/icons/profile.png" alt="profile" style="width: 41px; height: auto;">

                        </button>
                    </span>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed top-[65px] left-0 h-screen bg-white dark:bg-gray-800 transition-all duration-300 border-r border-gray-200 dark:border-gray-700 w-64">
        <button id="toggleButton" class="absolute -right-[-2px] top-2 bg-white p-1.5 dark:hover:bg-gray-700">
            <img id="toggleIcon" src="/storage/icons/x.png" alt="x"
                style="width: 35px; height: auto; padding: 0; margin-left: -3px;;">
        </button>

        <!-- Logo -->
        <div class="flex items-center p-4 mb-1 shadow-lg">

            <img id="toggleIcon" src="/storage/icons/codex.png" alt="codex" style="width: 25px; height: 26px;">
            <span id="logoText" class="ml-4 text-xl font-semibold dark:text-white top-3">
                CODEX</span>
        </div>
        <nav class="px-2">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('dashboard.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-white hover:bg-[#9747FF] dark:hover:bg-[#9747FF] group">
                        <img src="/storage/icons/dashboard.png" alt="dashboard" style="width: 25px; height: auto;">
                        <span class="menu-text ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('student_list.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-white hover:bg-[#9747FF] dark:hover:bg-[#9747FF] group">
                        <img src="/storage/icons/studentList.png" alt="studentlist" style="width: 25px; height: auto;">
                        <div class="flex items-center justify-between flex-1 ml-3">
                            <span class="menu-text">Student List</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('payment_management.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-white hover:bg-[#9747FF] dark:hover:bg-[#9747FF] group">

                        <img src="/storage/icons/paymentManagement.png" alt="paymnetmanagement"
                            style="width: 25px; height: auto;">

                        <div class="flex items-center justify-between flex-1 ml-3">
                            <span class="menu-text">Payment Management</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('collection_categories.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-white hover:bg-[#9747FF] dark:hover:bg-[#9747FF] group">
                        <img src="/storage/icons/collectionCategories.png" alt="collectioncategories"
                            style="width: 25px; height: auto;">
                        <span class="menu-text ml-3">Collection Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('transaction.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-white hover:bg-[#9747FF] dark:hover:bg-[#9747FF] group">

                        <img src="/storage/icons/transaction.png" alt="transaction" style="width: 25px; height: auto;">
                        <span class="menu-text ml-3">Transaction</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reports.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-white hover:bg-[#9747FF] dark:hover:bg-[#9747FF] group">
                        <img src="/storage/icons/reports.png" alt="reports" style="width: 25px; height: auto;">
                        <span class="menu-text ml-3">Reports</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('calendar.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-white hover:bg-[#9747FF] dark:hover:bg-[#9747FF] group">

                        <img src="/storage/icons/calendar.png" alt="calendar" style="width: 25px; height: auto;">
                        <span class="menu-text ml-3">Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('feedback.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-white hover:bg-[#9747FF] dark:hover:bg-[#9747FF] group">
                        <img src="/storage/icons/feedback.png" alt="feedback" style="width: 25px; height: auto;">
                        <span class="menu-text ml-3">Feedback</span>
                    </a>
                </li>
                <li>
                    <button
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-white hover:bg-[#9747FF] dark:hover:bg-[#9747FF] w-full"
                        onclick="toggleDropdown('activityDropdown')">
                        <img src="/storage/icons/activity.png" alt="activity" style="width: 25px; height: auto;">
                        <span class="menu-text ml-3">Activity</span>
                        <span class="menu-text left-[6.5rem] relative">

                            <img id="toggleDropdownMenu" src="/storage/icons/dropdown2.png" alt="dropdown2"
                                style="width: 25px; height: auto;">
                        </span>
                    </button>
                    <ul id="activityDropdown" ;
                        class="hidden w-full mt-2 space-y-1 bg-white rounded-lg dark:bg-gray-800">
                        <li>
                            <a href="{{ route('activity.user.index') }}"
                                class="flex items-center ml-10 p-2 text-gray-900 rounded-lg dark:text-white hover:text-white hover:bg-[#9747FF] dark:hover:bg-[#9747FF] group">
                                <img src="/storage/icons/users.png" alt="users"
                                    style="width: 20px; height: auto;">
                                <span class="menu-text ml-3">Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('activity.admin.index') }}"
                                class="flex items-center ml-10 p-2 text-gray-900 rounded-lg dark:text-white hover:text-white hover:bg-[#9747FF] dark:hover:bg-[#9747FF] group">
                                <img src="/storage/icons/admins.png" alt="admins"
                                    style="width: 20px; height: auto;">
                                <span class="menu-text ml-3">Admins</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('activity.system.index') }}"
                                class="flex items-center ml-10 p-2 text-gray-900 rounded-lg dark:text-white hover:text-white hover:bg-[#9747FF] dark:hover:bg-[#9747FF] group">
                                <img src="/storage/icons/system.png" alt="system"
                                    style="width: 25px; height: auto;">
                                <span class="menu-text ml-3">System</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main id="main-content" class="ml-64 p-6">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="mt-10 p-4 text-center">
        puter
    </footer>

    <script>
        const sidebar = document.getElementById("sidebar");
        const toggleButton = document.getElementById("toggleButton");
        const toggleIcon = document.getElementById("toggleIcon");
        const toggleDropdownMenu = document.getElementById("toggleDropdownMenu");
        const logoText = document.getElementById("logoText");
        const menuTexts = document.querySelectorAll(".menu-text");
        const menuBadges = document.querySelectorAll(".menu-badge");
        const mainContent = document.getElementById("main-content");
        let isExpanded = true;

        function toggleSidebar() {
            isExpanded = !isExpanded;

            sidebar.classList.toggle("w-64");
            sidebar.classList.toggle("w-16");
            toggleButton.classList.toggle("left-1");
            mainContent.classList.toggle("sm:ml-64");
            mainContent.classList.toggle("sm:ml-16");

            logoText.style.display = isExpanded ? "block" : "none";
            menuTexts.forEach(
                (text) => (text.style.display = isExpanded ? "block" : "none")
            );
            menuBadges.forEach(
                (badge) => (badge.style.display = isExpanded ? "block" : "none")
            );

            const toggleIcon = document.getElementById("toggleIcon");
            if (isExpanded) {
                toggleIcon.src = "/storage/icons/x.png";
                toggleIcon.style.width = "35px";
                toggleIcon.style.height = "auto";
                toggleIcon.style.top = "2px";
                toggleIcon.style.marginLeft = "-3px";
                toggleIcon.style.paddingRight = "0";
            } else {
                toggleIcon.src = "/storage/icons/bar.png";
                toggleIcon.style.width = "49px";
                toggleIcon.style.height = "40px";
                toggleIcon.style.paddingRight = "5px";
                toggleIcon.style.marginLeft = "-2px";
            }


        }

        toggleButton.addEventListener("click", toggleSidebar);

        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            dropdown.classList.toggle("hidden");

            const toggleDropdownMenu = document.getElementById("toggleDropdownMenu");
            if (toggleDropdownMenu.src.includes("dropdown.png")) {
                toggleDropdownMenu.src = "/storage/icons/dropdown2.png";
                toggleDropdownMenu.style.width = "25px";
                toggleDropdownMenu.style.height = "auto";
            } else {
                toggleDropdownMenu.src = "/storage/icons/dropdown.png";
                toggleDropdownMenu.style.width = "25px";
                toggleDropdownMenu.style.height = "auto";
            }

            const profileDropdown = document.getElementById(profileDropdown);
            profileDropdown.classList.toggle("hidden");
        }
    </script>

    <title>@yield('page_title')</title> {{-- Default naa sa ride side --}}

    @yield('raw_css_links')
    </head>

    <body>
        <header>
            {{-- heder --}}
        </header>

        <nav>
            {{-- nav --}}
        </nav>

        <main id="main-content" class="items-start sm:ml-64 transition-all duration-300 shadow-top-lg">

        </main>

        <footer>
            puter
        </footer>

        @yield('js_links')
    </body>

</html>
