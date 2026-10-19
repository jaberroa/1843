const menu = document.querySelector('.menu-toggle');
const nav = document.querySelector('#navigation');
menu.hidden = false;
nav.classList.add('menu-ready');
function closeMenu() { menu.setAttribute('aria-expanded', 'false'); nav.classList.remove('is-open'); }
menu.addEventListener('click', () => { const open = menu.getAttribute('aria-expanded') !== 'true'; menu.setAttribute('aria-expanded', String(open)); nav.classList.toggle('is-open', open); });
nav.querySelectorAll('a').forEach(link => link.addEventListener('click', closeMenu));
document.addEventListener('keydown', event => { if (event.key === 'Escape' && menu.getAttribute('aria-expanded') === 'true') { closeMenu(); menu.focus(); } });
document.querySelectorAll('[data-interest]').forEach(link => link.addEventListener('click', () => { document.querySelector('#interest').value = link.dataset.interest; }));
const privacy = document.querySelector('#privacy');
document.querySelectorAll('[data-open-privacy]').forEach(button => button.addEventListener('click', () => privacy.showModal()));
privacy.querySelectorAll('.dialog-close,.dialog-done').forEach(button => button.addEventListener('click', () => privacy.close()));
const form = document.querySelector('.contact-form');
form.addEventListener('submit', () => { const button = form.querySelector('[type=submit]'); button.disabled = true; button.setAttribute('aria-busy', 'true'); button.querySelector('.submit-label').textContent = 'Enviando solicitud…'; });
window.addEventListener('pageshow', () => { const button = form.querySelector('[type=submit]'); button.disabled = false; button.removeAttribute('aria-busy'); button.querySelector('.submit-label').textContent = 'Enviar solicitud'; });
document.querySelector('.notice')?.focus();
