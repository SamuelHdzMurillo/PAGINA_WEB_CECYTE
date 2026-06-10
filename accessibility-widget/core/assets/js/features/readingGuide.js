export class ReadingGuide {
    constructor() {
        this.id = 'readingGuide';
        this.guide = null;
        this.rafId = null;
        this.mouseY = 0;

        this.onMouseMove = this.onMouseMove.bind(this);
        this.render = this.render.bind(this);
    }

    enable() {
        if (this.guide) {
            return;
        }

        this.guide = document.createElement('div');
        this.guide.className = 'a11y-reading-guide';
        document.body.appendChild(this.guide);

        document.addEventListener('mousemove', this.onMouseMove);
        this.render();
    }

    disable() {
        document.removeEventListener('mousemove', this.onMouseMove);

        if (this.rafId) {
            cancelAnimationFrame(this.rafId);
            this.rafId = null;
        }

        if (!this.guide) {
            return;
        }

        this.guide.remove();
        this.guide = null;
    }

    onMouseMove(event) {
        this.mouseY = event.clientY;
    }

    render() {
        if (!this.guide) {
            return;
        }

        this.guide.style.transform = `translateY(${this.mouseY}px)`;
        this.rafId = requestAnimationFrame(this.render);
    }
}
