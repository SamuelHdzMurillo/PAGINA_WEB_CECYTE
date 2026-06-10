export class DarkMode {
    constructor() {
        this.id = 'darkMode';
        this.className = 'a11y-dark-mode';
    }

    enable() {
        document.documentElement.classList.add(this.className);
    }

    disable() {
        document.documentElement.classList.remove(this.className);
    }
}
