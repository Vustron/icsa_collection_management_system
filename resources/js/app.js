import { initializeDropdowns } from "./utils/init-profile-dropdown";
import { initializeSidebar } from "./utils/init-sidebar";
import { initializeDialogs } from "./utils/init-dialog";
import { cn } from "./utils/cn";
import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    initializeSidebar();
    initializeDropdowns();
    initializeDialogs();
});

export { cn };
