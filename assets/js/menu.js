/**
 * ============================================================
 * MENU.JS - Interattività Navbar e Logo
 * ============================================================
 * - Prossimità del puntatore sul logo MIR ISLAM (le lettere
 *   si alzano e si colorano quando il mouse si avvicina)
 * - Toggle menu su mobile (<= 820px) con animazione hamburger
 * - Chiusura con tasto Escape o click sui link
 * ============================================================
 */
(function () {
  'use strict';

  function initNav() {
    /* 1. EFFETTO PROSSIMITÀ PUNTATORE SUI LOGHI (HEADER E FOOTER) */
    var brands = document.querySelectorAll('.brand');
    brands.forEach(function (brand) {
      var ins = brand.querySelectorAll('.in');
      if (!ins.length) return;

      function onPointerNear(e) {
        var clientX = e.clientX, clientY = e.clientY;
        ins.forEach(function (el) {
          var r = el.getBoundingClientRect();
          var centerX = r.left + r.width / 2;
          var centerY = r.top + r.height / 2;
          var dist = Math.hypot(clientX - centerX, clientY - centerY);
          var proximity = Math.max(0, 1 - dist / 70);
          el.style.setProperty('--d', proximity.toFixed(2));
        });
      }

      function resetNear() {
        ins.forEach(function (el) {
          el.style.setProperty('--d', '0');
        });
      }

      brand.addEventListener('pointermove', onPointerNear, { passive: true });
      brand.addEventListener('pointerdown', onPointerNear, { passive: true });
      brand.addEventListener('pointerleave', resetNear, { passive: true });
    });

    /* 2. TOGGLE MENU MOBILE */
    var toggle = document.getElementById('nav-toggle');
    var list = document.getElementById('nav-links');
    if (toggle && list) {
      function setMenuOpen(isOpen) {
        list.classList.toggle('open', isOpen);
        toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        toggle.setAttribute('aria-label', isOpen ? 'Chiudi menu' : 'Apri menu');
      }

      toggle.addEventListener('click', function (e) {
        e.stopPropagation();
        var isOpen = list.classList.contains('open');
        setMenuOpen(!isOpen);
      });

      document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && list.classList.contains('open')) {
          setMenuOpen(false);
        }
      });

      list.addEventListener('click', function (e) {
        if (e.target.closest('a')) {
          setMenuOpen(false);
        }
      });

      document.addEventListener('click', function (e) {
        if (list.classList.contains('open') && !list.contains(e.target) && !toggle.contains(e.target)) {
          setMenuOpen(false);
        }
      });
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initNav);
  } else {
    initNav();
  }
})();
