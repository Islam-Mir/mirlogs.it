(() => {
  const init = () => {
    const viewport = document.getElementById('carousel-track-container');
    const track = viewport?.querySelector('.carousel-track');
    const slides = [...(track?.querySelectorAll('.carousel-slide') || [])];
    const counter = document.getElementById('carousel-counter');
    const previous = document.getElementById('carousel-prev');
    const next = document.getElementById('carousel-next');
    if (!viewport || !slides.length) return;

    let active = 0;
    let startX = 0;
    let startScroll = 0;
    let dragging = false;
    let moved = false;
    const indexFromScroll = () => {
      const left = viewport.getBoundingClientRect().left;
      return slides.reduce((best, slide, i) =>
        Math.abs(slide.getBoundingClientRect().left - left) < Math.abs(slides[best].getBoundingClientRect().left - left) ? i : best, 0);
    };
    const paint = () => {
      active = indexFromScroll();
      if (counter) counter.textContent = `${String(active + 1).padStart(2, '0')} / ${String(slides.length).padStart(2, '0')}`;
      if (previous) previous.disabled = viewport.scrollLeft <= 2;
      if (next) next.disabled = viewport.scrollLeft + viewport.clientWidth >= viewport.scrollWidth - 2;
    };
    const go = (index) => {
      active = Math.max(0, Math.min(slides.length - 1, index));
      viewport.scrollTo({ left: slides[active].offsetLeft - track.offsetLeft, behavior: 'smooth' });
    };
    previous?.addEventListener('click', () => go(indexFromScroll() - 1));
    next?.addEventListener('click', () => go(indexFromScroll() + 1));
    viewport.addEventListener('scroll', () => requestAnimationFrame(paint), { passive: true });
    document.addEventListener('keydown', (event) => {
      if (event.key !== 'ArrowRight' && event.key !== 'ArrowLeft') return;
      if (event.target.closest('input, textarea, select, a, [contenteditable="true"]')) return;
      const lightbox = document.getElementById('lightbox-modal');
      if (lightbox?.classList.contains('is-open')) return;
      event.preventDefault();
      go(indexFromScroll() + (event.key === 'ArrowRight' ? 1 : -1));
    });
    viewport.addEventListener('pointerdown', (event) => {
      if (event.pointerType !== 'mouse' || event.button !== 0) return;
      if (event.target.closest('button')) return;
      dragging = true; moved = false; startX = event.clientX; startScroll = viewport.scrollLeft;
      viewport.classList.add('is-dragging');
    });
    viewport.addEventListener('pointermove', (event) => {
      if (!dragging) return;
      const delta = event.clientX - startX;
      if (Math.abs(delta) > 5) {
        moved = true;
        if (!viewport.hasPointerCapture(event.pointerId)) viewport.setPointerCapture(event.pointerId);
      }
      viewport.scrollLeft = startScroll - delta;
    });
    const endDrag = () => { dragging = false; viewport.classList.remove('is-dragging'); paint(); };
    viewport.addEventListener('pointerup', endDrag);
    viewport.addEventListener('pointercancel', endDrag);
    document.addEventListener('pointerup', (event) => {
      if (dragging && !viewport.contains(event.target)) endDrag();
    });
    viewport.addEventListener('click', (event) => {
      if (moved) { event.preventDefault(); event.stopPropagation(); moved = false; }
    }, true);
    viewport.addEventListener('click', (event) => {
      const slide = event.target.closest('.carousel-slide');
      const image = slide?.querySelector('.carousel-slide-img');
      if (image && window.apriModaleImmagine) window.apriModaleImmagine(image.currentSrc || image.src, image.alt);
    });
    window.addEventListener('resize', paint, { passive: true });
    paint();
  };
  document.addEventListener('DOMContentLoaded', init);
})();
