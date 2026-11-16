(() => {
  // Intervallo dell'autoplay; la velocità del passaggio manuale si regola in style.css.
  const AUTOPLAY_INTERVAL_MS = 1500;

  const initGallery = () => {
    const root = document.getElementById('gallery-experience');
    const dataNode = document.getElementById('gallery-data');
    if (!root || !dataNode) return;

    const photos = JSON.parse(dataNode.textContent || '[]');
    if (!photos.length) return;
    const track = document.getElementById('gallery-track');
    const stage = document.getElementById('gallery-stage');
    const counter = document.getElementById('gallery-counter');
    const progress = document.getElementById('gallery-progress');
    const total = document.getElementById('gallery-total');
    const autoplayButton = document.getElementById('gallery-autoplay');
    const fullscreenButton = document.getElementById('gallery-fullscreen');
    const filterButtons = [...root.querySelectorAll('[data-filter]')];
    let visible = photos.map((_, index) => index);
    let position = 0;
    let timer = null;
    let pointerStart = null;
    let didDrag = false;
    let pointerId = null;
    let playing = false;

    const buildSlide = (photo, index) => {
      const slide = document.createElement('article');
      slide.className = 'swiper-slide esu-slide';
      slide.dataset.photoIndex = String(index);
      slide.setAttribute('role', 'group');

      const card = document.createElement('div');
      card.className = 'esu-card';
      const backdrop = document.createElement('span');
      backdrop.className = 'esu-media-backdrop';
      backdrop.setAttribute('aria-hidden', 'true');
      const image = document.createElement('img');
      image.className = 'esu-media';
      image.src = `assets/img/viaggi/${encodeURIComponent(photo.file)}`;
      image.alt = photo.titolo;
      image.loading = index === visible[0] ? 'eager' : 'lazy';
      image.decoding = 'async';
      image.draggable = false;
      card.append(backdrop, image);

      const veil = document.createElement('span');
      veil.className = 'esu-inactive-veil';
      veil.setAttribute('aria-hidden', 'true');
      card.append(veil);

      const panel = document.createElement('div');
      panel.className = 'esu-caption-panel';
      const label = document.createElement('span');
      label.className = 'esu-caption-category';
      label.textContent = photo.categoria === 'mare' ? 'Mare · immersioni' : 'Viaggi · taccuino';
      const heading = document.createElement('h2');
      heading.className = 'esu-caption-title';
      heading.textContent = photo.titolo;
      const caption = document.createElement('p');
      caption.className = 'esu-caption-text';
      caption.textContent = photo.testo;
      panel.append(label, heading, caption);
      card.append(panel);
      slide.append(card);

      slide.addEventListener('click', () => {
        if (didDrag) return;
        go(visible.indexOf(index));
        if (window.apriModaleImmagine) window.apriModaleImmagine(image.currentSrc || image.src, image.alt);
      });
      slide.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' || event.key === ' ') {
          event.preventDefault();
          if (window.apriModaleImmagine) window.apriModaleImmagine(image.currentSrc || image.src, image.alt);
        }
      });
      return slide;
    };

    const renderSlides = () => {
      track.replaceChildren(...visible.map((photoIndex) => buildSlide(photos[photoIndex], photoIndex)));
      total.textContent = String(visible.length).padStart(2, '0');
      layoutSlides();
    };

    const layoutSlides = () => {
      const slides = [...track.children];
      if (!slides.length) return;
      const count = slides.length;
      slides.forEach((slide, index) => {
        let relative = index - position;
        if (relative > count / 2) relative -= count;
        if (relative < -count / 2) relative += count;
        const distance = Math.abs(relative);
        const visibleSlide = distance <= 2;
        const scale = Math.max(.72, 1 - distance * .095);
        const shift = window.innerWidth < 650 ? 82 : 76;
        slide.style.transform = `translate3d(calc(-50% + ${relative * shift}%), calc(-50% + ${distance * 18}px), ${-distance * 105}px) rotateY(${-relative * 30}deg) rotateZ(${relative * 1.2}deg) scale(${scale})`;
        slide.style.opacity = visibleSlide ? String(1 - distance * .22) : '0';
        slide.style.zIndex = String(10 - distance);
        slide.style.visibility = visibleSlide ? 'visible' : 'hidden';
        slide.setAttribute('aria-label', `${index + 1} / ${count}`);
        slide.setAttribute('aria-hidden', String(relative !== 0));
        slide.tabIndex = relative === 0 ? 0 : -1;
        slide.querySelector('.esu-inactive-veil').classList.toggle('is-hidden', relative === 0);
        slide.classList.remove('is-arriving');
        slide.classList.toggle('is-near', visibleSlide);
        slide.classList.toggle('is-active', relative === 0);
      });
      const activeSlide = slides[position];
      activeSlide.classList.add('is-arriving');
      window.setTimeout(() => activeSlide.classList.remove('is-arriving'), 380);
      counter.textContent = `${String(position + 1).padStart(2, '0')} / ${String(count).padStart(2, '0')}`;
      progress.style.width = `${((position + 1) / count) * 100}%`;
    };

    const go = (nextPosition) => {
      if (!visible.length) return;
      position = (nextPosition + visible.length) % visible.length;
      layoutSlides();
    };

    const setFilter = (filter) => {
      visible = photos.map((photo, index) => ({ photo, index }))
        .filter(({ photo }) => filter === 'tutte' || photo.categoria === filter)
        .map(({ index }) => index);
      position = 0;
      filterButtons.forEach((button) => {
        const selected = button.dataset.filter === filter;
        button.classList.toggle('is-active', selected);
        button.setAttribute('aria-pressed', String(selected));
      });
      renderSlides();
    };

    const stop = () => {
      playing = false;
      window.clearInterval(timer);
      timer = null;
      autoplayButton.setAttribute('aria-pressed', 'false');
      autoplayButton.setAttribute('aria-label', 'Avvia riproduzione automatica');
      autoplayButton.querySelector('[aria-hidden="true"]').textContent = '▶';
      autoplayButton.querySelector('.tool-label').textContent = 'Avvia';
    };
    const start = () => {
      stop();
      playing = true;
      autoplayButton.setAttribute('aria-pressed', 'true');
      autoplayButton.setAttribute('aria-label', 'Metti in pausa la riproduzione');
      autoplayButton.querySelector('[aria-hidden="true"]').textContent = 'Ⅱ';
      autoplayButton.querySelector('.tool-label').textContent = 'Pausa';
      timer = window.setInterval(() => go(position + 1), AUTOPLAY_INTERVAL_MS);
    };
    const toggleFullscreen = async () => {
      try {
        if (!document.fullscreenElement) await stage.requestFullscreen();
        else await document.exitFullscreen();
      } catch (_) {
        stage.classList.toggle('is-gallery-fullscreen');
      }
    };

    document.getElementById('gallery-prev').addEventListener('click', () => go(position - 1));
    document.getElementById('gallery-next').addEventListener('click', () => go(position + 1));
    filterButtons.forEach((button) => button.addEventListener('click', () => setFilter(button.dataset.filter)));
    autoplayButton.addEventListener('click', () => playing ? stop() : start());
    fullscreenButton.addEventListener('click', toggleFullscreen);
    document.addEventListener('fullscreenchange', () => {
      fullscreenButton.querySelector('.tool-label').textContent = document.fullscreenElement === stage ? 'Esci' : 'Schermo intero';
      fullscreenButton.setAttribute('aria-label', document.fullscreenElement === stage ? 'Esci dallo schermo intero' : 'Apri la galleria a schermo intero');
    });
    document.addEventListener('keydown', (event) => {
      if (event.key !== 'ArrowRight' && event.key !== 'ArrowLeft') return;
      if (event.target.closest('input, textarea, select, [contenteditable="true"]')) return;
      const lightbox = document.getElementById('lightbox-modal');
      if (lightbox?.classList.contains('is-open')) return;
      event.preventDefault();
      go(position + (event.key === 'ArrowRight' ? 1 : -1));
    });
    stage.addEventListener('pointerdown', (event) => {
      if (event.button !== undefined && event.button !== 0) return;
      pointerStart = { x: event.clientX, y: event.clientY };
      pointerId = event.pointerId;
      didDrag = false;
    });
    stage.addEventListener('pointermove', (event) => {
      if (!pointerStart) return;
      if (Math.abs(event.clientX - pointerStart.x) > 12) {
        didDrag = true;
        if (pointerId !== null && !stage.hasPointerCapture?.(pointerId)) stage.setPointerCapture?.(pointerId);
      }
    });
    stage.addEventListener('pointerup', (event) => {
      if (!pointerStart) return;
      const dx = event.clientX - pointerStart.x;
      const dy = event.clientY - pointerStart.y;
      if (Math.abs(dx) > 45 && Math.abs(dx) > Math.abs(dy) * 1.15) go(position + (dx < 0 ? 1 : -1));
      pointerStart = null;
      pointerId = null;
      window.setTimeout(() => { didDrag = false; }, 80);
    });
    stage.addEventListener('pointercancel', () => { pointerStart = null; pointerId = null; });
    stage.addEventListener('mouseenter', () => { if (playing) { window.clearInterval(timer); timer = null; } });
    stage.addEventListener('mouseleave', () => { if (playing && !timer) timer = window.setInterval(() => go(position + 1), AUTOPLAY_INTERVAL_MS); });
    document.addEventListener('visibilitychange', () => {
      if (!playing) return;
      if (document.hidden) { window.clearInterval(timer); timer = null; }
      else if (!timer) timer = window.setInterval(() => go(position + 1), AUTOPLAY_INTERVAL_MS);
    });

    renderSlides();
  };
  document.addEventListener('DOMContentLoaded', initGallery);
})();
