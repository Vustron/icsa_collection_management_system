<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" href="{{ asset('images/icsa_logo.png') }}">
        <title>@yield('page_title') | ICSA CMS</title>

        {{-- CSS --}}
        @yield('raw_css_links')
        @vite('resources/css/app.css')

        {{-- Scripts --}}
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
                        <h1 class="ml-64 text-xl text-violet-700 transition-all duration-300">
                            <span>@yield('page_header_title')</span>
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
                            <div class="flex items-center space-x-3">
                                <span class="hidden text-sm font-medium text-gray-900 lg:block">Admin</span>
                                <button id="profileDropdownButton"
                                    class="rounded-full p-1 hover:bg-gray-100 focus:outline-none">
                                    <x-bx-user-circle class="h-8 w-8 text-gray-600" />
                                </button>
                            </div>
                            <!-- Dropdown Menu -->
                            <div id="profileDropdown"
                                class="absolute right-0 mt-2 hidden w-48 rounded-lg border bg-white py-1 shadow-lg">
                                <div class="border-b px-4 py-2 text-sm font-medium text-gray-900">
                                    Manage Account
                                </div>
                                <a href="{{ route('my_account.index') }}"
                                    class="{{ request()->routeIs('my_account.*') ? 'bg-purple-600 text-white pointer-events-none' : ' text-gray-700 hover:bg-purple-50' }} flex items-center px-4 py-2 text-sm">
                                    <x-bx-user
                                        class="{{ request()->routeIs('my_account.*') ? 'text-white' : 'text-purple-600' }} mr-3 h-5 w-5" />
                                    My Account
                                </a>
                                <a href="{{ route('admin_manager.index') }}"
                                    class="{{ request()->routeIs('admin_manager.*') ? 'bg-purple-600 text-white pointer-events-none' : ' text-gray-700 hover:bg-purple-50' }} flex items-center px-4 py-2 text-sm">
                                    <x-bx-shield
                                        class="{{ request()->routeIs('admin_manager.*') ? 'text-white' : 'text-purple-600' }} mr-3 h-5 w-5" />
                                    Admin Manager
                                </a>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="flex w-full items-center border-t px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                        <x-bx-log-out class="mr-3 h-5 w-5" />
                                        Log out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </header>

        <div id="mobileMenuOverlay" class="fixed inset-0 z-40 hidden bg-black bg-opacity-50 lg:hidden"></div>

        {{-- Sidebar --}}
        <aside id="sidebar"
            class="fixed left-0 top-0 z-50 h-screen w-64 -translate-x-full border-r border-gray-200 bg-white shadow-lg transition-transform duration-300 lg:translate-x-0">
            <button id="sidebarToggle"
                class="absolute -right-5 top-4 hidden rounded-full border border-gray-200 bg-white p-1 shadow-lg hover:bg-gray-100 lg:block">
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
                            class="{{ request()->routeIs('dashboard.*') ? 'bg-purple-600 text-white pointer-events-none' : 'text-gray-700 hover:bg-purple-600 hover:text-white' }} group flex items-center rounded-lg p-2 transition-colors">
                            {{-- <x-bx-grid-alt class="ml-1 size-5 flex-shrink-0" /> --}}
                            <svg fill="currentColor" class="ml-1 size-5 flex-shrink-0">
                                <path
                                    d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm-5.6-4.29a9.95 9.95 0 0 1 11.2 0 8 8 0 1 0-11.2 0zm6.12-7.64l3.02-3.02 1.41 1.41-3.02 3.02a2 2 0 1 1-1.41-1.41z" />
                            </svg>
                            <span class="menu-text ml-3 text-sm lg:transition-all lg:duration-100">Dashboard</span>
                        </a>
                    </li>

                    <!-- Student List -->
                    <li>
                        <a href="{{ route('student_list.index') }}"
                            class="{{ request()->routeIs('student_list.*') ? 'bg-purple-600 text-white pointer-events-none' : 'text-gray-700 hover:bg-purple-600 hover:text-white' }} group flex items-center rounded-lg p-2 transition-colors">
                            <x-bx-group class="ml-1 size-5 flex-shrink-0" />
                            <span class="menu-text ml-3 text-sm lg:transition-all lg:duration-100">Student List</span>
                        </a>
                    </li>

                    <!-- Payment Management -->
                    <li>
                        <a href="{{ route('payment_management.index') }}"
                            class="{{ request()->routeIs('payment_management.*') ? 'bg-purple-600 text-white pointer-events-none' : 'text-gray-700 hover:bg-purple-600 hover:text-white' }} group flex items-center rounded-lg p-2 transition-colors">
                            <x-bx-credit-card class="ml-1 size-5 flex-shrink-0" />
                            <span class="menu-text ml-3 text-sm lg:transition-all lg:duration-100">Payment
                                Management</span>
                        </a>
                    </li>

                    <!-- Collection Categories -->
                    <li>
                        <a href="{{ route('collection_categories.index') }}"
                            class="{{ request()->routeIs('collection_categories.*') ? 'bg-purple-600 text-white pointer-events-none' : 'text-gray-700 hover:bg-purple-600 hover:text-white' }} group flex items-center rounded-lg p-2 transition-colors">
                            <x-bx-category class="ml-1 size-5 flex-shrink-0" />
                            <span class="menu-text ml-3 text-sm lg:transition-all lg:duration-100">Collection
                                Categories</span>
                        </a>
                    </li>

                    <!-- Transaction -->
                    <li>
                        <a href="{{ route('transaction.index') }}"
                            class="{{ request()->routeIs('transaction.*') ? 'bg-purple-600 text-white pointer-events-none' : 'text-gray-700 hover:bg-purple-600 hover:text-white' }} group flex items-center rounded-lg p-2 transition-colors">
                            <x-bx-transfer class="ml-1 size-5 flex-shrink-0" />
                            <span class="menu-text ml-3 text-sm lg:transition-all lg:duration-100">Transaction</span>
                        </a>
                    </li>

                    <!-- Reports -->
                    <li>
                        <a href="{{ route('reports.index') }}"
                            class="{{ request()->routeIs('reports.*') ? 'bg-purple-600 text-white pointer-events-none' : 'text-gray-700 hover:bg-purple-600 hover:text-white' }} group flex items-center rounded-lg p-2 transition-colors">
                            <x-bx-file class="ml-1 size-5 flex-shrink-0" />
                            <span class="menu-text ml-3 text-sm lg:transition-all lg:duration-100">Reports</span>
                        </a>
                    </li>

                    <!-- Calendar -->
                    <li>
                        <a href="{{ route('calendar.index') }}"
                            class="{{ request()->routeIs('calendar.*') ? 'bg-purple-600 text-white pointer-events-none' : 'text-gray-700 hover:bg-purple-600 hover:text-white' }} group flex items-center rounded-lg p-2 transition-colors">
                            <x-bx-calendar class="ml-1 size-5 flex-shrink-0" />
                            <span class="menu-text ml-3 text-sm lg:transition-all lg:duration-100">Calendar</span>
                        </a>
                    </li>

                    <!-- Feedback -->
                    <li>
                        <a href="{{ route('feedback.index') }}"
                            class="{{ request()->routeIs('feedback.*') ? 'bg-purple-600 text-white pointer-events-none' : 'text-gray-700 hover:bg-purple-600 hover:text-white' }} group flex items-center rounded-lg p-2 transition-colors">
                            <x-bx-message-square-detail class="ml-1 size-5 flex-shrink-0" />
                            <span class="menu-text ml-3 text-sm lg:transition-all lg:duration-100">Feedback</span>
                        </a>
                    </li>

                    <!-- Activity -->
                    <li>
                        <div
                            class="{{ request()->routeIs('activity.*') ? 'bg-purple-600 text-white pointer-events-none' : 'text-gray-700 hover:bg-purple-600 hover:text-white' }} flex w-full items-center justify-between rounded-lg p-2 transition-colors">
                            <div class="flex items-center">
                                <x-bx-history class="ml-1 size-5 flex-shrink-0" />
                                <span class="menu-text ml-3 text-sm lg:transition-all lg:duration-100">Activity</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main id="mainContent" class="main mt-[64px] p-2 transition-all duration-100 lg:ml-64">
            {{ $slot }}
            <!-- Footer -->
            {{-- <footer class="p-4 text-center">
            <span class="text-sm text-gray-500">© 2024 ICCMS. All rights reserved.</span>
        </footer> --}}
        </main>

        @yield('js_links')
    </body>
