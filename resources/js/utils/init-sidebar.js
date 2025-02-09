import { sidebarStore } from "../stores/sidebar-store";

export function initializeSidebar() {
    const elements = {
        sidebar: document.getElementById("sidebar"),
        toggle: document.getElementById("sidebarToggle"),
        texts: document.querySelectorAll(".menu-text"),
        chevron: document.getElementById("chevronIcon"),
        main: document.getElementById("mainContent"),
    };

    if (!Object.values(elements).every((el) => el)) {
        console.error("Required sidebar elements not found");
        return;
    }

    function updateUI(isOpen) {
        // Width transitions
        elements.sidebar.classList.toggle("w-64", isOpen);
        elements.sidebar.classList.toggle("w-16", !isOpen);

        elements.main.classList.toggle("lg:ml-64", isOpen);
        elements.main.classList.toggle("lg:ml-16", !isOpen);

        const headerTitle = document.querySelector("header h1");

        if (headerTitle) {
            headerTitle.style.marginLeft = isOpen ? "270px" : "80px";
        }

        // Chevron animation
        elements.chevron.classList.toggle("rotate-180", !isOpen);

        // Main content adjustment
        elements.main.classList.toggle("ml-64", isOpen);
        elements.main.classList.toggle("ml-16", !isOpen);

        // Immediate text visibility toggle
        for (const text of elements.texts) {
            if (!isOpen) {
                text.classList.add("hidden", "opacity-0");
            } else {
                text.classList.remove("hidden");
                requestAnimationFrame(() => {
                    text.classList.remove("opacity-0");
                });
            }
        }
    }

    const initialState = sidebarStore.getState().isOpen;
    updateUI(initialState);

    const unsubscribe = sidebarStore.subscribe((state) =>
        updateUI(state.isOpen),
    );

    elements.toggle.addEventListener("click", () => {
        sidebarStore.getState().toggle();
    });

    window.addEventListener("unload", unsubscribe);
}
