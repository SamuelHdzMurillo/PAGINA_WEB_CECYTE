import { AccessibilityApp } from './AccessibilityApp.js';
import { getAccessibilityWidgetConfig } from './config.js';

const logoUrl = new URL('../images/logo-instituto-mini.png', import.meta.url).href;

const getConfigValue = (config, path) => {
    return path.split('.').reduce((value, key) => value?.[key], config);
};

const applyAccessibilityConfig = (root, config) => {
    const resolvedLogoUrl = config.logoSrc || logoUrl;

    root.querySelectorAll('[data-a11y-logo]').forEach((image) => {
        image.setAttribute('src', resolvedLogoUrl);
        image.setAttribute('alt', config.logoAlt);
    });

    root.querySelectorAll('[data-a11y-text]').forEach((element) => {
        const value = getConfigValue(config, element.dataset.a11yText);

        if (typeof value === 'string') {
            element.textContent = value;
        }
    });

    root.querySelectorAll('[data-a11y-attr]').forEach((element) => {
        const bindings = element.dataset.a11yAttr.split('|').map((binding) => binding.trim()).filter(Boolean);

        bindings.forEach((binding) => {
            const separatorIndex = binding.indexOf(':');

            if (separatorIndex === -1) {
                return;
            }

            const attr = binding.slice(0, separatorIndex).trim();
            const path = binding.slice(separatorIndex + 1).trim();
            const value = getConfigValue(config, path);

            if (attr && typeof value === 'string') {
                element.setAttribute(attr, value);
            }
        });
    });

    root.querySelectorAll('[data-a11y-href]').forEach((element) => {
        const value = getConfigValue(config, element.dataset.a11yHref);

        if (typeof value === 'string') {
            element.setAttribute('href', value);
        }
    });
};

const moveRootToBody = (root) => {
    if (document.body && root.parentElement !== document.body) {
        document.body.appendChild(root);
    }
};

const bootAccessibility = () => {
    const root = document.querySelector('[data-a11y-root]');
    const config = getAccessibilityWidgetConfig();

    if (!root || root.dataset.a11yMounted === 'true') {
        return;
    }

    moveRootToBody(root);
    applyAccessibilityConfig(root, config);
    root.dataset.a11yMounted = 'true';

    const app = new AccessibilityApp(root);
    app.init();
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', bootAccessibility, { once: true });
} else {
    bootAccessibility();
}
