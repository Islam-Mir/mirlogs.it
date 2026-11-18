(() => {
  const initGallery = () => {
    const root = document.getElementById('gallery-experience');
    const dataNode = document.getElementById('gallery-data');
    if (!root || !dataNode) return;

    const photos = JSON.parse(dataNode.textContent || '[]');
    const track = document.getElementById('gallery-track');
    const stage = document.getElementById('gallery-stage');
    const progress = document.getElementById('gallery-progress');
    const thumbnailList = document.getElementById('gallery-thumbnails');
    const captionCategory = document.getElementById('gallery-caption-category');
    const captionTitle = document.getElementById('gallery-caption-title');
    const captionText = document.getElementById('gallery-caption-text');
    const previousButton = document.getElementById('gallery-prev');
    const nextButton = document.getElementById('gallery-next');
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

    const photoUrl = (photo) => `assets/img/viaggi/${encodeURIComponent(photo.file)}`;
    const buildSlide = (photo, index) => {
      const slide = document.createElement('div');
      slide.className = 'gallery-carousel-slide';
      slide.dataset.photoIndex = String(index);
      slide.setAttribute('role', 'group');

      const imageBox = document.createElement('div');
      imageBox.className = 'gallery-carousel-image';
      const imageSource = new URL(photoUrl(photo), document.baseURI).href;
      imageBox.style.setProperty('--hero-bg', `url("${imageSource}")`);
      imageBox.style.backgroundImage = `url("${imageSource}")`;
      const openButton = document.createElement('button');
      openButton.className = 'gallery-carousel-image-open';
      openButton.type = 'button';
      openButton.setAttribute('aria-label', `Apri la fotografia: ${photo.titolo}`);
      const image = document.createElement('img');
      image.src = photoUrl(photo);
      image.alt = photo.titolo;
      image.loading = index === visible[position] ? 'eager' : 'lazy';
      image.decoding = 'async';
      image.draggable = false;
      image.addEventListener('error', () => slide.classList.add('has-image-error'), { once: true });
      openButton.append(image);
      openButton.addEventListener('click', () => {
        if (didDrag) return;
        if (window.apriModaleImmagine) window.apriModaleImmagine(image.currentSrc || image.src, image.alt);
      });
      imageBox.append(openButton);
      const figure = document.createElement('figure');
      figure.className = 'gallery-carousel-figure';
      figure.append(imageBox);
      slide.append(figure);
      return slide;
    };

    const buildThumbnails = () => {
      thumbnailList.replaceChildren(...visible.map((photoIndex, slideIndex) => {
        const photo = photos[photoIndex];
        const item = document.createElement('li');
        const button = document.createElement('button');
        button.type = 'button';
        button.className = 'gallery-carousel-thumbnail';
        button.setAttribute('aria-label', `Visualizza ${photo.titolo}`);
        button.setAttribute('aria-pressed', slideIndex === position ? 'true' : 'false');
        const image = document.createElement('img');
        image.src = photoUrl(photo);
        image.alt = '';
        image.loading = 'lazy';
        image.decoding = 'async';
        button.append(image);
        button.addEventListener('click', () => go(slideIndex));
        item.append(button);
        return item;
      }));
    };

    const updateCaption = () => {
      const photo = photos[visible[position]];
      if (!photo) return;
      captionCategory.textContent = photo.categoria === 'mare' ? 'Mare · immersioni' : 'Viaggi · taccuino';
      captionTitle.textContent = photo.titolo;
      captionText.textContent = photo.testo;
      progress.style.width = `${((position + 1) / visible.length) * 100}%`;
      [...thumbnailList.querySelectorAll('.gallery-carousel-thumbnail')].forEach((button, index) => {
        const selected = index === position;
        button.setAttribute('aria-pressed', String(selected));
        button.closest('li').classList.toggle('active', selected);
        if (selected) button.scrollIntoView({
          block: 'nearest',
          inline: 'center',
          behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth'
        });
      });
      previousButton.hidden = position === 0;
      nextButton.hidden = position === visible.length - 1;
    };

    const renderSlides = () => {
      if (!visible.length) {
        track.replaceChildren();
        thumbnailList.replaceChildren();
        captionTitle.textContent = 'Nessuna fotografia';
        captionText.textContent = 'Non ci sono immagini in questa sezione.';
        captionCategory.textContent = '';
        progress.style.width = '0%';
        previousButton.hidden = true;
        nextButton.hidden = true;
        return;
      }
      track.replaceChildren(...visible.map((photoIndex) => buildSlide(photos[photoIndex], photoIndex)));
      buildThumbnails();
      updateSlides();
    };

    const updateSlides = () => {
      const slides = [...track.children];
      slides.forEach((slide, index) => {
        const active = index === position;
        slide.classList.toggle('active', active);
        slide.setAttribute('aria-label', photos[visible[index]].titolo);
        slide.setAttribute('aria-hidden', String(!active));
        const button = slide.querySelector('.gallery-carousel-image-open');
        if (button) button.tabIndex = active ? 0 : -1;
      });
      updateCaption();
    };

    function go(nextPosition, wrap = false) {
      if (!visible.length) return;
      if (wrap) position = (nextPosition + visible.length) % visible.length;
      else position = Math.max(0, Math.min(visible.length - 1, nextPosition));
      updateSlides();
    }

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
      timer = window.setInterval(() => go(position + 1, true), 4000);
    };
    const toggleFullscreen = async () => {
      try {
        if (!document.fullscreenElement) await stage.requestFullscreen();
        else await document.exitFullscreen();
      } catch (_) {
        stage.classList.toggle('is-gallery-fullscreen');
      }
    };

    previousButton.addEventListener('click', () => go(position - 1));
    nextButton.addEventListener('click', () => go(position + 1));
    filterButtons.forEach((button) => button.addEventListener('click', () => setFilter(button.dataset.filter)));
    autoplayButton.addEventListener('click', () => playing ? stop() : start());
    fullscreenButton.addEventListener('click', toggleFullscreen);
    document.addEventListener('fullscreenchange', () => {
      const isFullscreen = document.fullscreenElement === stage;
      fullscreenButton.querySelector('.tool-label').textContent = isFullscreen ? 'Esci' : 'Schermo intero';
      fullscreenButton.setAttribute('aria-label', isFullscreen ? 'Esci dallo schermo intero' : 'Apri la galleria a schermo intero');
    });
    document.addEventListener('keydown', (event) => {
      if (event.key !== 'ArrowRight' && event.key !== 'ArrowLeft') return;
      const lightbox = document.getElementById('lightbox-modal');
      if (lightbox?.classList.contains('is-open')) {
        event.preventDefault();
        go(position + (event.key === 'ArrowRight' ? 1 : -1));
        const activeImage = track.querySelector('.gallery-carousel-slide.active img');
        if (activeImage && window.apriModaleImmagine) {
          window.apriModaleImmagine(activeImage.currentSrc || activeImage.src, activeImage.alt);
        }
        return;
      }
      const photoButton = event.target.closest('.gallery-carousel-image-open');
      if (!stage.contains(event.target) || (event.target.closest('button') && !photoButton) || event.target.closest('input, textarea, select, [contenteditable="true"]')) return;
      event.preventDefault();
      go(position + (event.key === 'ArrowRight' ? 1 : -1));
    });
    stage.addEventListener('pointerdown', (event) => {
      if (event.button !== undefined && event.button !== 0) return;
      if (event.target.closest('button:not(.gallery-carousel-image-open)')) return;
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
    const pauseTimer = () => { if (playing && timer) { window.clearInterval(timer); timer = null; } };
    const resumeTimer = () => { if (playing && !timer) timer = window.setInterval(() => go(position + 1, true), 4000); };
    stage.addEventListener('mouseenter', pauseTimer);
    stage.addEventListener('mouseleave', resumeTimer);
    stage.addEventListener('focusin', pauseTimer);
    stage.addEventListener('focusout', (event) => { if (!stage.contains(event.relatedTarget)) resumeTimer(); });
    document.addEventListener('visibilitychange', () => { if (document.hidden) pauseTimer(); else resumeTimer(); });

    renderSlides();
  };
  document.addEventListener('DOMContentLoaded', initGallery);
})();
