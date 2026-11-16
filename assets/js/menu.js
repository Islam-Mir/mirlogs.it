document.addEventListener('DOMContentLoaded', () => {
  const button = document.getElementById('menu-toggle');
  const links = document.getElementById('nav-links');
  if (!button || !links) return;

  const setOpen = (open) => {
    links.classList.toggle('is-open', open);
    button.setAttribute('aria-expanded', String(open));
    button.setAttribute('aria-label', open ? 'Chiudi menu' : 'Apri menu');
  };
  button.addEventListener('click', () => setOpen(button.getAttribute('aria-expanded') !== 'true'));
  links.addEventListener('click', (event) => { if (event.target.closest('a')) setOpen(false); });
  document.addEventListener('click', (event) => {
    if (!button.contains(event.target) && !links.contains(event.target)) setOpen(false);
  });
  document.addEventListener('keydown', (event) => { if (event.key === 'Escape') setOpen(false); });
  window.addEventListener('resize', () => { if (window.innerWidth > 768) setOpen(false); }, { passive: true });
});
