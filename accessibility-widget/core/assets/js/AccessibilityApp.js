import { StateManager } from './core/stateManager.js';
import { storage } from './core/storage.js';
import { Grayscale } from './features/grayscale.js';
import { Contrast } from './features/contrast.js';
import { HighlightLinks } from './features/highlightLinks.js';
import { CursorSize } from './features/cursorSize.js';
import { DarkMode } from './features/darkMode.js';
import { ReadingMask } from './features/readingMask.js';
import { ReadingGuide } from './features/readingGuide.js';
import { DyslexiaFont } from './features/dyslexiaFont.js';
import { VerticalSpacing } from './features/verticalSpacing.js';
import { HorizontalSpacing } from './features/horizontalSpacing.js';
import { ScreenReader } from './features/screenReader.js';
import { FontSize } from './features/fontSize.js';

export class AccessibilityApp {
    constructor(root) {
        this.root = root;
        this.stateManager = new StateManager(storage);
        this.features = [
            new Grayscale(),
            new Contrast(),
            new HighlightLinks(),
            new CursorSize(),
            new DarkMode(),
            new ReadingMask(),
            new ReadingGuide(),
            new DyslexiaFont(),
            new VerticalSpacing(storage),
            new HorizontalSpacing(storage),
            new ScreenReader(),
            new FontSize(storage),
        ];

        this.toggleButton = this.root.querySelector('#a11y-toggle');
        this.panel = this.root.querySelector('#a11y-panel');
        this.closeButton = this.root.querySelector('[data-a11y-close]');

        this.handleRootClick = this.handleRootClick.bind(this);
        this.handleDocumentClick = this.handleDocumentClick.bind(this);
        this.handleDocumentKeydown = this.handleDocumentKeydown.bind(this);
    }

    init() {
        if (!this.root || !this.toggleButton || !this.panel) {
            return;
        }

        this.registerFeatures();
        this.syncFeatureState();
        this.bindUI();
        this.initPanel();
        this.syncUI();
    }

    registerFeatures() {
        this.features.forEach((feature) => {
            this.stateManager.register(feature);
        });
    }

    syncFeatureState() {
        const vertical = this.getFeature('verticalSpacing');
        const horizontal = this.getFeature('horizontalSpacing');

        vertical?.init();
        horizontal?.init();

        this.updateSpacingUI('verticalSpacing', vertical?.level ?? 0);
        this.updateSpacingUI('horizontalSpacing', horizontal?.level ?? 0);

        this.getFeature('fontSize')?.init();
    }

    bindUI() {
        this.root.addEventListener('click', this.handleRootClick);
    }

    handleRootClick(event) {
        const button = event.target.closest('button');

        if (!button || !this.root.contains(button)) {
            return;
        }

        if (button.dataset.a11yClose !== undefined) {
            this.closePanel();
            return;
        }

        if (button.dataset.a11yLevel) {
            const id = button.dataset.a11yLevel;
            const level = Number(button.dataset.level);
            const feature = this.getFeature(id);

            if (!feature) {
                return;
            }

            feature.setLevel(level);
            this.updateSpacingUI(id, level);
            return;
        }

        const action = button.dataset.a11y;

        if (!action) {
            return;
        }

        if (action === 'fontInc') {
            this.getFeature('fontSize')?.increase();
            return;
        }

        if (action === 'fontDec') {
            this.getFeature('fontSize')?.decrease();
            return;
        }

        if (action === 'verticalSpacing' || action === 'horizontalSpacing') {
            const feature = this.getFeature(action);

            if (!feature) {
                return;
            }

            const nextLevel = feature.level >= 3 ? 0 : feature.level + 1;
            feature.setLevel(nextLevel);
            this.updateSpacingUI(action, nextLevel);
            return;
        }

        if (action === 'reset') {
            this.stateManager.resetAll();
            this.getFeature('fontSize')?.reset();
            this.getFeature('verticalSpacing')?.reset();
            this.getFeature('horizontalSpacing')?.reset();
            this.updateSpacingUI('verticalSpacing', 0);
            this.updateSpacingUI('horizontalSpacing', 0);
            this.syncUI();
            return;
        }

        this.stateManager.toggle(action);
        this.syncUI();
    }

    initPanel() {
        this.toggleButton.addEventListener('click', () => {
            this.isPanelOpen() ? this.closePanel() : this.openPanel();
        });

        document.addEventListener('click', this.handleDocumentClick);
        document.addEventListener('keydown', this.handleDocumentKeydown);
    }

    handleDocumentClick(event) {
        if (!this.isPanelOpen() || this.root.contains(event.target)) {
            return;
        }

        this.closePanel({ returnFocus: false });
    }

    handleDocumentKeydown(event) {
        if (event.key !== 'Escape' || !this.isPanelOpen()) {
            return;
        }

        event.preventDefault();
        this.closePanel();
    }

    openPanel() {
        this.toggleButton.setAttribute('aria-expanded', 'true');
        this.panel.hidden = false;
        this.panel.setAttribute('aria-hidden', 'false');
        this.closeButton?.focus();
    }

    closePanel({ returnFocus = true } = {}) {
        this.toggleButton.setAttribute('aria-expanded', 'false');
        this.panel.hidden = true;
        this.panel.setAttribute('aria-hidden', 'true');

        if (returnFocus) {
            this.toggleButton.focus();
        }
    }

    isPanelOpen() {
        return this.toggleButton.getAttribute('aria-expanded') === 'true';
    }

    getFeature(id) {
        return this.features.find((feature) => feature.id === id);
    }

    updateSpacingUI(id, level) {
        this.root.querySelectorAll(`[data-a11y-level="${id}"]`).forEach((button) => {
            const buttonLevel = Number(button.dataset.level);
            const isActive = buttonLevel === level;

            button.classList.toggle('active', isActive);
            button.setAttribute('aria-pressed', String(isActive));
        });
    }

    syncUI() {
        this.root.querySelectorAll('[data-a11y]').forEach((button) => {
            const id = button.dataset.a11y;

            if (!id || ['reset', 'fontInc', 'fontDec', 'verticalSpacing', 'horizontalSpacing'].includes(id)) {
                return;
            }

            const isActive = Boolean(this.stateManager.state[id]);
            button.setAttribute('aria-pressed', String(isActive));
        });
    }
}
