import { getAccessibilityWidgetConfig, getDefaultAccessibilityState } from '../config.js';

const safeParse = (value) => {
    if (!value) {
        return {};
    }

    try {
        const parsed = JSON.parse(value);
        return parsed && typeof parsed === 'object' ? parsed : {};
    } catch {
        return {};
    }
};

export const storage = {
    getDefaultState() {
        return getDefaultAccessibilityState();
    },

    get() {
        try {
            const key = getAccessibilityWidgetConfig().storageKey;
            const defaults = this.getDefaultState();
            return { ...defaults, ...safeParse(window.localStorage.getItem(key)) };
        } catch {
            return this.getDefaultState();
        }
    },

    set(data) {
        try {
            const key = getAccessibilityWidgetConfig().storageKey;
            const defaults = this.getDefaultState();
            window.localStorage.setItem(key, JSON.stringify({ ...defaults, ...data }));
        } catch {
            // Ignore storage errors and keep the UI functional.
        }
    },

    clear() {
        try {
            const key = getAccessibilityWidgetConfig().storageKey;
            window.localStorage.removeItem(key);
        } catch {
            // Ignore storage errors and keep the UI functional.
        }
    },
};
