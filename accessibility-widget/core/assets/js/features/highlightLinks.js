export class HighlightLinks {
    constructor() {
        this.id = 'highlightLinks';
        this.className = 'a11y-highlight-links';
    }

    enable() {
        document.documentElement.classList.add(this.className);
    }

    disable() {
        document.documentElement.classList.remove(this.className);
    }
}
