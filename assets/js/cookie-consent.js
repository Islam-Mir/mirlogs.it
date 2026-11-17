(function () {
  'use strict';

  var STORAGE_KEY = 'mirlogs_cookie_analytics_consent';
  var GA_ID = 'G-Y6XNTV6LJM';
  var banner = document.getElementById('cookie-banner');
  var loaded = false;

  function getChoice() {
    try { return window.localStorage.getItem(STORAGE_KEY); } catch (error) { return null; }
  }

  function showBanner() {
    if (banner) banner.hidden = false;
  }

  function hideBanner() {
    if (banner) banner.hidden = true;
  }

  function loadAnalytics() {
    if (loaded || document.querySelector('script[data-consent-google-analytics]')) return;
    loaded = true;
    window.dataLayer = window.dataLayer || [];
    window.gtag = window.gtag || function () { window.dataLayer.push(arguments); };
    window.gtag('js', new Date());
    window.gtag('config', GA_ID, { anonymize_ip: true });

    var script = document.createElement('script');
    script.async = true;
    script.src = 'https://www.googletagmanager.com/gtag/js?id=' + encodeURIComponent(GA_ID);
    script.setAttribute('data-consent-google-analytics', 'true');
    document.head.appendChild(script);
  }

  function clearAnalyticsCookies() {
    var names = document.cookie.split(';').map(function (part) { return part.trim().split('=')[0]; });
    names.filter(function (name) { return /^_ga(?:_|$)/.test(name); }).forEach(function (name) {
      document.cookie = name + '=; Max-Age=0; path=/; SameSite=Lax';
      var host = window.location.hostname;
      if (host.indexOf('.') !== -1) {
        document.cookie = name + '=; Max-Age=0; path=/; domain=.' + host + '; SameSite=Lax';
      }
    });
  }

  function choose(choice) {
    try { window.localStorage.setItem(STORAGE_KEY, choice); } catch (error) { /* La preferenza resta valida per la sessione corrente. */ }
    hideBanner();
    if (choice === 'accepted') {
      if (loaded && window.gtag) {
        window.gtag('consent', 'update', { analytics_storage: 'granted' });
        window.gtag('config', GA_ID, { anonymize_ip: true });
      } else {
        loadAnalytics();
      }
    }
  }

  function revokeAndShow() {
    try { window.localStorage.removeItem(STORAGE_KEY); } catch (error) { /* Continua comunque a bloccare nuove attivazioni. */ }
    if (window.gtag) window.gtag('consent', 'update', { analytics_storage: 'denied' });
    clearAnalyticsCookies();
    showBanner();
  }

  document.addEventListener('click', function (event) {
    var choiceButton = event.target.closest('[data-cookie-choice]');
    if (choiceButton) {
      choose(choiceButton.getAttribute('data-cookie-choice') === 'accept' ? 'accepted' : 'rejected');
      return;
    }
    if (event.target.closest('[data-cookie-preferences]')) revokeAndShow();
  });

  if (getChoice() === 'accepted') loadAnalytics();
  else if (getChoice() !== 'rejected') showBanner();
})();
