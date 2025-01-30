<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" href="{{ asset('images/icsa_logo.png') }}">
        <title>ICSA CMS</title>

        {{-- Resources --}}
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>

    <body class="min-h-screen bg-gray-50">

        <header class="fixed top-0 z-50 w-full bg-white shadow-sm">
            <div class="flex h-16 items-center px-4">
                <!-- Left: Mobile Menu & Title -->
                <div class="flex w-full items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <button id="mobileMenuButton" class="rounded-md p-2 hover:bg-gray-100 lg:hidden">
                            <x-bx-menu class="h-6 w-6 text-gray-600" />
                        </button>
                        <!-- Page Title -->
                        <h1 class="ml-64 text-lg font-medium text-gray-900 transition-all duration-300">
                            {{ $header ?? 'Dashboard' }}
                        </h1>
                    </div>

                    <!-- Right: Notifications & Profile -->
                    <div class="flex items-center space-x-6">
                        <!-- Notifications -->
                        <div class="relative">
                            <button class="relative rounded-full p-1 hover:bg-gray-100 focus:outline-none">
                                <x-bx-bell class="h-6 w-6 text-gray-600" />
                                <span
                                    class="absolute -right-1 -top-1 flex h-5 w-5 items-center justify-center rounded-full bg-red-500 text-xs text-white">
                                    3
                                </span>
                            </button>
                        </div>

                        <!-- Profile Dropdown -->
                        <div class="relative">
                            <button id="profileDropdownButton"
                                class="flex items-center space-x-3 rounded-full p-1 hover:bg-gray-100 focus:outline-none">
                                <span class="hidden text-sm font-medium text-gray-900 lg:block">Admin</span>
                                <x-bx-user-circle class="h-8 w-8 text-gray-600" />
                            </button>
                            <!-- Dropdown Menu -->
                            <div id="profileDropdown"
                                class="absolute right-0 mt-2 hidden w-48 rounded-lg border bg-white py-1 shadow-lg">
                                <div class="border-b px-4 py-2 text-sm font-medium text-gray-900">
                                    Manage Account
                                </div>
                                <a href="#"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-purple-50">
                                    <x-bx-user class="mr-3 h-5 w-5 text-purple-600" />
                                    My Account
                                </a>
                                <a href="#"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-purple-50">
                                    <x-bx-shield class="mr-3 h-5 w-5 text-purple-600" />
                                    Admin Manager
                                </a>
                                <div class="border-t">
                                    <button type="submit"
                                        class="flex w-full items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                        <x-bx-log-out class="mr-3 h-5 w-5" />
                                        Log out
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </header>

        <div id="mobileMenuOverlay" class="fixed inset-0 z-40 hidden bg-black bg-opacity-50 lg:hidden"></div>

        {{-- Sidebar --}}
        <aside id="sidebar"
            class="fixed left-0 z-50 h-screen w-64 -translate-x-full border-r border-gray-200 bg-white shadow-lg transition-transform duration-300 lg:translate-x-0">
            <button id="sidebarToggle"
                class="absolute -right-5 top-2 hidden rounded-full bg-white p-1 shadow-lg hover:bg-gray-100 lg:block">
                <x-bx-chevron-left id="chevronIcon" class="h-6 w-6 text-gray-600 transition-transform duration-300" />
            </button>

            <!-- Logo -->
            <div class="mb-1 flex items-center p-4 shadow-sm">
                <img src="{{ asset('images/icsa_logo.png') }}" alt="ICSA Logo" class="h-8 w-8 flex-shrink-0">
                <span class="menu-text ml-3 transform text-xl font-semibold lg:transition-all lg:duration-300">
                    ICSA CMS
                </span>
            </div>

            <!-- Navigation -->
            <nav class="h-[calc(100vh-6rem)] overflow-y-auto px-2">
                <ul class="mb-4 space-y-1">
                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('dashboard.index') }}"
                            class="group flex items-center rounded-lg p-2 text-gray-700 transition-colors hover:bg-purple-600 hover:text-white">
                            <x-bx-grid-alt class="ml-1 size-5 flex-shrink-0" />
                            <span class="menu-text ml-3 text-sm lg:transition-all lg:duration-100">Dashboard</span>
                        </a>
                    </li>

                    <!-- Student List -->
                    <li>
                        <a href="{{ route('student_list.index') }}"
                            class="group flex items-center rounded-lg p-2 text-gray-700 transition-colors hover:bg-purple-600 hover:text-white">
                            <x-bx-group class="ml-1 size-5 flex-shrink-0" />
                            <span class="menu-text ml-3 transform text-sm lg:transition-all lg:duration-100">Student
                                List</span>
                        </a>
                    </li>

                    <!-- Payment Management -->
                    <li>
                        <a href="{{ route('payment_management.index') }}"
                            class="group flex items-center rounded-lg p-2 text-gray-700 transition-colors hover:bg-purple-600 hover:text-white">
                            <x-bx-credit-card class="ml-1 size-5 flex-shrink-0" />
                            <span class="menu-text ml-3 transform text-sm lg:transition-all lg:duration-100">Payment
                                Management</span>
                        </a>
                    </li>

                    <!-- Collection Categories -->
                    <li>
                        <a href="{{ route('collection_categories.index') }}"
                            class="group flex items-center rounded-lg p-2 text-gray-700 transition-colors hover:bg-purple-600 hover:text-white">
                            <x-bx-category class="ml-1 size-5 flex-shrink-0" />
                            <span class="menu-text ml-3 transform text-sm lg:transition-all lg:duration-100">Collection
                                Categories</span>
                        </a>
                    </li>

                    <!-- Transaction -->
                    <li>
                        <a href="{{ route('transaction.index') }}"
                            class="group flex items-center rounded-lg p-2 text-gray-700 transition-colors hover:bg-purple-600 hover:text-white">
                            <x-bx-transfer class="ml-1 size-5 flex-shrink-0" />
                            <span
                                class="menu-text ml-3 transform text-sm lg:transition-all lg:duration-100">Transaction</span>
                        </a>
                    </li>

                    <!-- Reports -->
                    <li>
                        <a href="{{ route('reports.index') }}"
                            class="group flex items-center rounded-lg p-2 text-gray-700 transition-colors hover:bg-purple-600 hover:text-white">
                            <x-bx-file class="ml-1 size-5 flex-shrink-0" />
                            <span
                                class="menu-text ml-3 transform text-sm lg:transition-all lg:duration-100">Reports</span>
                        </a>
                    </li>

                    <!-- Calendar -->
                    <li>
                        <a href="{{ route('calendar.index') }}"
                            class="group flex items-center rounded-lg p-2 text-gray-700 transition-colors hover:bg-purple-600 hover:text-white">
                            <x-bx-calendar class="ml-1 size-5 flex-shrink-0" />
                            <span
                                class="menu-text ml-3 transform text-sm lg:transition-all lg:duration-100">Calendar</span>
                        </a>
                    </li>

                    <!-- Feedback -->
                    <li>
                        <a href="{{ route('feedback.index') }}"
                            class="group flex items-center rounded-lg p-2 text-gray-700 transition-colors hover:bg-purple-600 hover:text-white">
                            <x-bx-message-square-detail class="ml-1 size-5 flex-shrink-0" />
                            <span
                                class="menu-text ml-3 transform text-sm lg:transition-all lg:duration-100">Feedback</span>
                        </a>
                    </li>

                    <!-- Activity Dropdown -->
                    <li>
                        <a
                            class="flex w-full items-center justify-between rounded-lg p-2 text-gray-700 transition-colors hover:bg-purple-600 hover:text-white">
                            <div class="flex items-center">
                                <x-bx-history class="ml-1 size-5 flex-shrink-0" />
                                <span
                                    class="menu-text ml-3 transform text-sm lg:transition-all lg:duration-100">Activity</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main id="mainContent" class="transition-all duration-100 lg:ml-64">
            <div class="p-8">
                {{ $slot }}
            </div>
        </main>

        <!-- Footer -->
        <footer class="mt-10 p-4 text-center">
            <span class="text-sm text-gray-500">© 2024 ICCMS. All rights reserved.</span>
        </footer>
    </body>

</html>
