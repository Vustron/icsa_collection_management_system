<!-- Navbar -->
<header style="
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
      0 -4px 6px -2px rgba(0, 0, 0, 0.05);">
    <div id="navbar"
        class="fixed top-[-15px] flex h-[4.7rem] w-full flex-col border-b-2 bg-white transition-all duration-300">
        <div class="flex items-center justify-between p-5">
            <span class="relative left-[2rem] mb-4 flex items-center text-[23px] font-normal">
                <img src="/storage/icons/icsaLogo.png" alt="Icsalogo" style="width: 49px; height: auto;">
                ICCMS - Institute of Computing Collection Management System
            </span>
            <div class="flex items-center space-x-4">
                <span class="relative right-[2rem] top-[-7px] flex items-center space-x-4">
                    <!-- Notification Bell -->
                    <img src="/storage/icons/notif.png" alt="notif" style="width: 23px; height: auto;">
                    <!-- Admin Name placeholder sa-->
                    <span class="ml-3 w-full">Admin</span>

                    <button class="flex w-full items-center rounded-lg text-gray-900 dark:text-white"
                        onclick="toggleDropdown('profileDropdown')">
                        <ul id="profileDropdown"
                            class="absolute left-0 top-full mt-2 hidden w-48 space-y-1 rounded-lg bg-white shadow-md dark:bg-gray-800">
                            <li class="border-b-2 p-2">
                                <span class="ml-3">Manage Account</span>
                            </li>
                            <li>
                                <a href="#"
                                    class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-[#9747FF] hover:text-white dark:text-white dark:hover:bg-[#9747FF]">

                                    <img src="/storage/icons/myAccount.png" alt="myaccount"
                                        style="width: 26px; height: auto;">
                                    <span class="ml-3">My Account</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-[#9747FF] hover:text-white dark:text-white dark:hover:bg-[#9747FF]">

                                    <img src="/storage/icons/admnManager.png" alt="adminmanager"
                                        style="width: 26px; height: auto;">
                                    <span class="ml-3">Admin Manager</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-[#9747FF] hover:text-white dark:text-white dark:hover:bg-[#9747FF]">
                                    <img src="/storage/icons/logOut.png" alt="logout"
                                        style="width: 26px; height: auto;">
                                    <span class="ml-3">Log out</span>
                                </a>
                            </li>
                        </ul>
                        <img src="/storage/icons/profile.png" alt="profile" style="width: 35px; height: auto;">

                    </button>
                </span>
            </div>
        </div>
    </div>
</header>
