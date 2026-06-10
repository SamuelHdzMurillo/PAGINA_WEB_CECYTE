export class FontSize {
    constructor(storage) {
        this.id = 'fontSize';
        this.storage = storage;
        this.step = 0.1;
        this.min = 0.8;
        this.max = 1.5;
        this.current = 1;
        this.root = document.documentElement;
    }

    init() {
        const settings = this.storage.get();
        this.current = Number(settings.fontSize) || 1;
        this.apply();
    }

    increase() {
        if (this.current >= this.max) {
            return;
        }

        this.current = +(this.current + this.step).toFixed(2);
        this.save();
        this.apply();
    }

    decrease() {
        if (this.current <= this.min) {
            return;
        }

        this.current = +(this.current - this.step).toFixed(2);
        this.save();
        this.apply();
    }

    reset() {
        this.current = 1;

        const settings = this.storage.get();
        delete settings.fontSize;
        this.storage.set(settings);

        this.apply();
    }

    save() {
        const settings = this.storage.get();
        settings.fontSize = this.current;
        this.storage.set(settings);
    }

    apply() {
        this.root.style.fontSize = `${this.current * 100}%`;
    }
}
