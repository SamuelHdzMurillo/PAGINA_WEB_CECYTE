export class StateManager {
    constructor(storage) {
        this.storage = storage;
        this.state = this.storage.get();
        this.features = new Map();
    }

    register(feature) {
        this.features.set(feature.id, feature);

        if (this.state[feature.id] && typeof feature.enable === 'function') {
            feature.enable();
        }
    }

    toggle(id) {
        const feature = this.features.get(id);

        if (!feature) {
            return;
        }

        this.state[id] = !this.state[id];

        if (this.state[id]) {
            feature.enable?.();
        } else {
            feature.disable?.();
        }

        this.storage.set(this.state);
    }

    resetAll() {
        this.features.forEach((feature) => {
            feature.disable?.();
            feature.reset?.();
        });

        this.storage.clear();
        this.state = this.storage.getDefaultState();

        this.features.forEach((feature) => {
            if (this.state[feature.id]) {
                feature.enable?.();
            }
        });
    }
}
