export class VerticalSpacing {
    constructor(storage) {
        this.id = 'verticalSpacing';
        this.storage = storage;
        this.root = document.documentElement;
        this.level = 0;
        this.classes = ['', 'a11y-vertical-spacing-1', 'a11y-vertical-spacing-2', 'a11y-vertical-spacing-3'];
    }

    init() {
        const settings = this.storage.get();
        this.level = Number(settings.verticalSpacing) || 0;
        this.apply();
    }

    setLevel(level) {
        if (level < 0 || level > 3) {
            return;
        }

        this.level = level;

        const settings = this.storage.get();
        settings.verticalSpacing = level;
        this.storage.set(settings);

        this.apply();
    }

    reset() {
        this.level = 0;

        const settings = this.storage.get();
        delete settings.verticalSpacing;
        this.storage.set(settings);

        this.apply();
    }

    apply() {
        this.classes.forEach((className) => {
            if (className) {
                this.root.classList.remove(className);
            }
        });

        if (this.level > 0) {
            this.root.classList.add(this.classes[this.level]);
        }
    }
}
