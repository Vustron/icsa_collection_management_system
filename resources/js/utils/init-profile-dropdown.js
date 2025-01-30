export function initializeDropdowns() {
    const elements = {
        mobileMenuButton: document.getElementById("mobileMenuButton"),
        mobileMenuOverlay: document.getElementById("mobileMenuOverlay"),
        sidebar: document.getElementById("sidebar"),
        profileDropdownButton: document.getElementById("profileDropdownButton"),
        profileDropdown: document.getElementById("profileDropdown"),
    };

    // Mobile Menu Toggle
    function toggleMobileMenu() {
        elements.sidebar.classList.toggle("-translate-x-full");
        elements.mobileMenuOverlay.classList.toggle("hidden");
        document.body.classList.toggle("overflow-hidden");
    }

    elements.mobileMenuButton?.addEventListener("click", toggleMobileMenu);
    elements.mobileMenuOverlay?.addEventListener("click", toggleMobileMenu);

    // Profile Dropdown
    function handleProfileDropdown(event) {
        if (!elements.profileDropdownButton?.contains(event.target)) {
            elements.profileDropdown?.classList.add("hidden");
        }
    }

    elements.profileDropdownButton?.addEventListener("click", () => {
        elements.profileDropdown?.classList.toggle("hidden");
    });

    document.addEventListener("click", handleProfileDropdown);

    // Cleanup on window resize
    window.addEventListener("resize", () => {
        if (window.innerWidth >= 1024) {
            elements.sidebar?.classList.remove("-translate-x-full");
            elements.mobileMenuOverlay?.classList.add("hidden");
            document.body.classList.remove("overflow-hidden");
        }
    });
}
