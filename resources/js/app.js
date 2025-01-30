import { initializeDropdowns } from "./utils/init-profile-dropdown";
import { initializeSidebar } from "./utils/init-sidebar";
import { cn } from "./utils/cn";
import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
	initializeSidebar();
	initializeDropdowns();
});

export { cn };
