/**
 * ============================================================
 * CAROSELLO.JS - Carosello 3D "Frammenti di Mondo"
 * ============================================================
 * - Raggio e angoli 3D calcolati dinamicamente
 * - Sfondo attivo con foto sfocata sfumata
 * - Drag e swipe con mouse / touch
 * - Tilt 3D reattivo con il movimento del cursore
 * - Autoplay ogni 5s con pausa al passaggio del mouse
 * - Tasti freccia da tastiera SEMPRE ATTIVI ovunque nella pagina
 * - Click su foto laterale per portarla al centro
 * - Frecce laterali stile Galleria
 * ============================================================
 */
(function () {
  'use strict';

  var mod = function (a, n) {
    return ((a % n) + n) % n;
  };

  function MirCarousel(root) {
    var source = root.querySelector('.mw-source'),
      stage = root.querySelector('.mw-stage'),
      tilt = root.querySelector('.mw-tilt'),
      ring = root.querySelector('.mw-ring'),
      bgs = root.querySelectorAll('.mw-bg i');

    if (!source || !stage || !tilt || !ring) return;

    var cards = [],
      n = 0,
      step = 0,
      pos = 0,
      bgFlip = 0,
      lastBg = '',
      GAP = 40;
    var autoplay = parseInt(root.dataset.autoplay, 10) || 0,
      timer = null,
      hovering = false;
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---- costruzione: legge le <img> del figure e crea le card ---- */
    function build() {
      var imgs = source.querySelectorAll('img');
      n = imgs.length;
      cards = [];
      ring.innerHTML = '';

      Array.prototype.forEach.call(imgs, function (img, i) {
        var card = document.createElement('div'),
          face = document.createElement('div'),
          im = new Image();
        card.className = 'mw-card';
        card.style.setProperty('--i', i);
        face.className = 'mw-face';
        im.src = img.getAttribute('src');
        im.alt = img.getAttribute('alt') || '';
        im.draggable = false;
        im.decoding = 'async';
        face.appendChild(im);

        if (im.alt) {
          var cap = document.createElement('span');
          cap.className = 'mw-cap';
          cap.textContent = im.alt;
          face.appendChild(cap);
        }

        card.appendChild(face);
        ring.appendChild(card);
        cards.push(card);
      });

      layout();
      render();
      play();
    }

    /* ---- geometria: angolo e raggio dipendono da quante foto ci sono ---- */
    function cardW() {
      return (cards[0] && cards[0].offsetWidth) || 380;
    }

    function layout() {
      if (!n) return;
      step = 360 / n;
      var r = n > 1 ? cardW() / 2 / Math.tan(Math.PI / n) + GAP : 0;
      root.style.setProperty('--r', r + 'px');
      root.style.setProperty('--step', step + 'deg');
    }

    function setAngle(a) {
      ring.style.setProperty('--a', a + 'deg');
    }

    function setBg(src) {
      if (!bgs || bgs.length < 2 || src === lastBg) return;
      lastBg = src;
      bgFlip = 1 - bgFlip;
      bgs[bgFlip].style.backgroundImage = 'url("' + src + '")';
      bgs[bgFlip].classList.add('on');
      bgs[1 - bgFlip].classList.remove('on');
    }

    function render() {
      if (!n) return;
      var active = mod(pos, n);
      setAngle(pos * step);

      cards.forEach(function (c, i) {
        c.classList.toggle('is-active', i === active);
      });

      var activeImg = cards[active] && cards[active].querySelector('img');
      if (activeImg) {
        setBg(activeImg.src);
      }
    }

    /* ---- navigazione ---- */
    function go(d) {
      if (n < 2) return;
      pos += d;
      render();
      play();
    }

    function goTo(i) {
      var d = mod(i - mod(pos, n), n);
      if (d > n / 2) d -= n;
      if (d) go(d);
    }

    function play() {
      clearInterval(timer);
      if (autoplay && !reduce && !hovering && !document.hidden && n > 1) {
        timer = setInterval(function () {
          pos++;
          render();
        }, autoplay);
      }
    }

    /* Frecce laterali stile galleria */
    var prevBtns = root.querySelectorAll('[data-mw="prev"]');
    prevBtns.forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        go(-1);
      });
    });

    var nextBtns = root.querySelectorAll('[data-mw="next"]');
    nextBtns.forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        go(1);
      });
    });

    /* Tasti freccia SEMPRE ATTIVI a livello globale */
    document.addEventListener('keydown', function (e) {
      // Ignora se l'utente sta digitando in un input o textarea
      var tag = e.target.tagName;
      if (tag === 'INPUT' || tag === 'TEXTAREA' || e.target.isContentEditable) return;
      if (e.key === 'ArrowLeft') {
        go(-1);
      } else if (e.key === 'ArrowRight') {
        go(1);
      }
    });

    document.addEventListener('visibilitychange', play);

    /* ---- drag / swipe ---- */
    var down = false,
      x0 = 0,
      dx = 0,
      moved = false;

    function move(e) {
      dx = e.clientX - x0;
      if (Math.abs(dx) > 6) moved = true;
      setAngle(pos * step - (dx / (cardW() * 0.7)) * step);
    }

    function up() {
      down = false;
      ring.classList.remove('drag');
      window.removeEventListener('pointermove', move);
      window.removeEventListener('pointerup', up);
      window.removeEventListener('pointercancel', up);
      if (Math.abs(dx) > cardW() * 0.12) go(dx < 0 ? 1 : -1);
      else render();
      play();
    }

    stage.addEventListener('pointerdown', function (e) {
      if (e.pointerType === 'mouse' && e.button !== 0) return;
      down = true;
      moved = false;
      x0 = e.clientX;
      dx = 0;
      clearInterval(timer);
      ring.classList.add('drag');
      window.addEventListener('pointermove', move);
      window.addEventListener('pointerup', up);
      window.addEventListener('pointercancel', up);
    });

    ring.addEventListener('click', function (e) {
      if (moved) {
        moved = false;
        return;
      }
      var c = e.target.closest('.mw-card');
      if (c) goTo(cards.indexOf(c));
    });

    /* ---- inclinazione 3D col mouse + pausa autoplay ---- */
    stage.addEventListener('pointermove', function (e) {
      if (e.pointerType !== 'mouse' || down || reduce) return;
      var b = stage.getBoundingClientRect();
      tilt.style.setProperty(
        '--rx',
        -((e.clientY - b.top) / b.height - 0.5) * 7 + 'deg'
      );
      tilt.style.setProperty(
        '--ry',
        ((e.clientX - b.left) / b.width - 0.5) * 10 + 'deg'
      );
    });

    stage.addEventListener('pointerenter', function (e) {
      if (e.pointerType === 'mouse') {
        hovering = true;
        clearInterval(timer);
      }
    });

    stage.addEventListener('pointerleave', function (e) {
      tilt.style.setProperty('--rx', '0deg');
      tilt.style.setProperty('--ry', '0deg');
      if (e.pointerType === 'mouse') {
        hovering = false;
        play();
      }
    });

    /* ---- reazioni automatiche: foto aggiunte/rimosse e resize ---- */
    var raf;
    if (window.MutationObserver) {
      new MutationObserver(function () {
        cancelAnimationFrame(raf);
        raf = requestAnimationFrame(build);
      }).observe(source, {
        childList: true,
        subtree: true,
        attributes: true,
        attributeFilter: ['src', 'alt'],
      });
    }

    if (window.ResizeObserver) new ResizeObserver(layout).observe(stage);
    else window.addEventListener('resize', layout);

    root.mwCarousel = {
      next: function () {
        go(1);
      },
      prev: function () {
        go(-1);
      },
      goTo: goTo,
      add: function (src, alt) {
        var im = document.createElement('img');
        im.src = src;
        im.alt = alt || '';
        source.appendChild(im);
      },
    };

    build();
  }

  function initAll() {
    document.querySelectorAll('[data-mw-carousel]').forEach(MirCarousel);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAll);
  } else {
    initAll();
  }
})();
