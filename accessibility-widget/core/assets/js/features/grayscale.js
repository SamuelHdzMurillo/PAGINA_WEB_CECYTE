export class Grayscale {
    constructor() {
        this.id = 'grayscale';
        this.className = 'a11y-grayscale';
    }

    enable() {
        document.documentElement.classList.add(this.className);
    }

    disable() {
        document.documentElement.classList.remove(this.className);
    }
}
