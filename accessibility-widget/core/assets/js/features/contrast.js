export class Contrast {
    constructor() {
        this.id = 'contrast';
        this.className = 'a11y-contrast';
    }

    enable() {
        document.documentElement.classList.add(this.className);
    }

    disable() {
        document.documentElement.classList.remove(this.className);
    }
}
