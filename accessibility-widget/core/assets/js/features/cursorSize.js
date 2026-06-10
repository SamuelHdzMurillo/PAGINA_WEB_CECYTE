export class CursorSize {
    constructor() {
        this.id = 'cursorSize';
        this.className = 'a11y-cursor-big';
    }

    enable() {
        document.documentElement.classList.add(this.className);
    }

    disable() {
        document.documentElement.classList.remove(this.className);
    }
}
