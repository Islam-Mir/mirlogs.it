(function () {
  if (!document.getElementById('mwn-list')) return;
  var esc = function (c) { return c === ' ' ? '&nbsp;' : c.replace(/&/g, '&amp;').replace(/</g, '&lt;'); };

  /* ---- link di navigazione ---- */
  var map = { 'index.php': 'home', 'informatica.php': 'code', 'viaggi.php': 'travel',
              'libri.php': 'books', 'galleria.php': 'gallery', 'contatti.php': 'contact' };
  document.querySelectorAll('.mwn-link').forEach(function (a) {
    var label = a.textContent.trim().replace(/\s+/g, ' ');
    var page = (a.getAttribute('href') || '').split('/').pop().split('?')[0];
    a.dataset.fx = a.dataset.fx || map[page] || 'home';
    a.setAttribute('aria-label', label);
    a.innerHTML = '<span class="bg"></span><span class="mwn-fx" aria-hidden="true">' + '<i></i>'.repeat(8) +
      '</span><span class="txt" aria-hidden="true">' +
      Array.from(label).map(function (c, i) { return '<span class="l" style="--i:' + i + '">' + esc(c) + '</span>'; }).join('') + '</span>';
  });

  /* ---- logo: lettere che reagiscono al puntatore ---- */
  var brands = document.querySelectorAll('.mwn-brand');
  var colors = ['#1fa971', '#0fb5c9', '#3b82f6', '#8b5cf6', '#f59e0b', '#ec4899'];
  brands.forEach(function (brand) {
    var already = brand.querySelectorAll('.in').length > 0;
    if (!already) {
      var txt = brand.textContent.trim();
      brand.innerHTML = '<span class="moon" aria-hidden="true"></span><span aria-hidden="true">' +
        Array.from(txt).map(function (c, i) {
          return c === ' ' ? '<span class="sp"></span>'
            : '<span class="ch" style="--i:' + i + '"><span class="in" style="--c:' + colors[i % 6] + '; --d: 0;">' + c + '</span></span>';
        }).join('') + '</span>';
    }
    var ins = brand.querySelectorAll('.in');
    if (!ins.length) return;
    function near(e) {
      ins.forEach(function (el) {
        var r = el.getBoundingClientRect();
        var d = Math.hypot(e.clientX - (r.left + r.width / 2), e.clientY - (r.top + r.height / 2));
        el.style.setProperty('--d', Math.max(0, 1 - d / 70).toFixed(2));
      });
    }
    function resetNear() {
      ins.forEach(function (el) { el.style.setProperty('--d', '0'); });
    }
    brand.addEventListener('pointermove', near, { passive: true });
    brand.addEventListener('pointerdown', near, { passive: true });
    brand.addEventListener('pointerleave', resetNear, { passive: true });
  });

  /* ---- toggle ---- */
  var toggle = document.getElementById('mwn-toggle'), list = document.getElementById('mwn-list');
  function setOpen(o) {
    list.classList.toggle('open', o);
    toggle.setAttribute('aria-expanded', o);
    toggle.setAttribute('aria-label', o ? 'Chiudi menu' : 'Apri menu');
  }
  toggle.addEventListener('click', function () { setOpen(!list.classList.contains('open')); });
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') setOpen(false); });
  list.addEventListener('click', function (e) { if (e.target.closest('a')) setOpen(false); });
})();
