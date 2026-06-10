export class HorizontalSpacing {
    constructor(storage) {
        this.id = 'horizontalSpacing';
        this.storage = storage;
        this.root = document.documentElement;
        this.level = 0;
        this.classes = ['', 'a11y-horizontal-spacing-1', 'a11y-horizontal-spacing-2', 'a11y-horizontal-spacing-3'];
    }

    init() {
        const settings = this.storage.get();
        this.level = Number(settings.horizontalSpacing) || 0;
        this.apply();
    }

    setLevel(level) {
        if (level < 0 || level > 3) {
            return;
        }

        this.level = level;

        const settings = this.storage.get();
        settings.horizontalSpacing = level;
        this.storage.set(settings);

        this.apply();
    }

    reset() {
        this.level = 0;

        const settings = this.storage.get();
        delete settings.horizontalSpacing;
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
