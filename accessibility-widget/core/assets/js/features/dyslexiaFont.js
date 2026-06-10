export class DyslexiaFont {
    constructor() {
        this.id = 'dyslexiaFont';
        this.className = 'a11y-dyslexia-font';
    }

    enable() {
        document.documentElement.classList.add(this.className);
    }

    disable() {
        document.documentElement.classList.remove(this.className);
    }
}
