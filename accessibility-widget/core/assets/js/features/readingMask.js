export class ReadingMask {
    constructor() {
        this.id = 'readingMask';
        this.mask = null;
        this.onMouseMove = this.onMouseMove.bind(this);
    }

    enable() {
        if (this.mask) {
            return;
        }

        this.mask = document.createElement('div');
        this.mask.className = 'a11y-reading-mask';
        document.body.appendChild(this.mask);
        document.addEventListener('mousemove', this.onMouseMove);
    }

    disable() {
        document.removeEventListener('mousemove', this.onMouseMove);

        if (!this.mask) {
            return;
        }

        this.mask.remove();
        this.mask = null;
    }

    onMouseMove(event) {
        if (!this.mask) {
            return;
        }

        const y = event.clientY;
        const bandHeight = 120;
        const topMaskHeight = Math.max(0, y - bandHeight / 2);
        const bottomStart = y + bandHeight / 2;

        this.mask.style.background = `linear-gradient(
            to bottom,
            rgba(15, 23, 42, 0.78) 0,
            rgba(15, 23, 42, 0.78) ${topMaskHeight}px,
            transparent ${topMaskHeight}px,
            transparent ${bottomStart}px,
            rgba(15, 23, 42, 0.78) ${bottomStart}px,
            rgba(15, 23, 42, 0.78) 100%
        )`;
    }
}
