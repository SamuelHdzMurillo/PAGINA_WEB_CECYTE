import { getAccessibilityWidgetConfig } from '../config.js';

export class ScreenReader {
    constructor() {
        this.id = 'screenReader';
        this.active = false;
        this.hoverDelay = 500;
        this.timer = null;
        this.lastText = '';
        this.currentElement = null;
        this.supported = 'speechSynthesis' in window && typeof SpeechSynthesisUtterance !== 'undefined';

        this.onHover = this.onHover.bind(this);
        this.onFocus = this.onFocus.bind(this);
    }

    enable() {
        if (!this.supported) {
            return;
        }

        this.active = true;
        document.documentElement.classList.add('a11y-screen-reader');
        document.addEventListener('mouseover', this.onHover);
        document.addEventListener('focusin', this.onFocus);
    }

    disable() {
        this.active = false;
        document.documentElement.classList.remove('a11y-screen-reader');
        document.removeEventListener('mouseover', this.onHover);
        document.removeEventListener('focusin', this.onFocus);

        if (this.supported) {
            window.speechSynthesis.cancel();
        }

        window.clearTimeout(this.timer);
        this.clearHighlight();
    }

    getReadableElement(element) {
        if (element.tagName === 'IMG') {
            return element;
        }

        return element.closest('label, a, button, li, p, span, h1, h2, h3, h4, h5, h6, input, textarea, select');
    }

    getReadableText(element) {
        if (!element) {
            return '';
        }

        if (element.tagName === 'IMG' && element.alt) {
            return element.alt.trim();
        }

        const ariaLabel = element.getAttribute('aria-label');

        if (ariaLabel) {
            return ariaLabel.trim();
        }

        if (element.id) {
            const label = document.querySelector(`label[for="${element.id}"]`);

            if (label?.innerText) {
                return label.innerText.trim();
            }
        }

        if (element.placeholder) {
            return element.placeholder.trim();
        }

        if (element.value && element.tagName === 'INPUT') {
            return element.value.trim();
        }

        return element.innerText ? element.innerText.trim() : '';
    }

    highlight(element) {
        this.clearHighlight();

        if (!element) {
            return;
        }

        element.classList.add('a11y-speaking');
        this.currentElement = element;
    }

    clearHighlight() {
        if (!this.currentElement) {
            return;
        }

        this.currentElement.classList.remove('a11y-speaking');
        this.currentElement = null;
    }

    speak(text) {
        if (!this.supported || !text || text === this.lastText) {
            return;
        }

        this.lastText = text;
        window.speechSynthesis.cancel();

        const utterance = new SpeechSynthesisUtterance(text);
        utterance.lang = getAccessibilityWidgetConfig().speechLang || document.documentElement.lang || 'es-MX';
        window.speechSynthesis.speak(utterance);
    }

    processElement(target) {
        const element = this.getReadableElement(target);
        const text = this.getReadableText(element);

        if (!element || !text) {
            return;
        }

        this.highlight(element);
        this.speak(text);
    }

    onHover(event) {
        if (!this.active) {
            return;
        }

        window.clearTimeout(this.timer);
        this.timer = window.setTimeout(() => {
            this.processElement(event.target);
        }, this.hoverDelay);
    }

    onFocus(event) {
        if (!this.active) {
            return;
        }

        this.processElement(event.target);
    }
}
