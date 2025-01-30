import { persist, createJSONStorage } from "zustand/middleware";
import { createStore } from "zustand/vanilla";

export const sidebarStore = createStore(
    persist(
        (set, get) => ({
            isOpen: true,
            toggle: () => {
                const currentState = get().isOpen;
                set({ isOpen: !currentState });
            },
        }),
        {
            name: "sidebar-storage",
            storage: createJSONStorage(() => localStorage),
        },
    ),
);
