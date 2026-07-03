/**
 * includes.js — Fetches and injects shared header & footer partials.
 * Must be loaded BEFORE main.js so initNavigation() runs after injection.
 */
(function () {
  // Map filenames → which nav-link data-page value to mark active
  const pageMap = {
    'index.html': 'index',
    '': 'index',          // root URL
    '/': 'index',
    'fragrances.html': 'fragrances',
    'products.html': 'products',
    'about-us.html': 'about-us',
    'about.html': 'about-us',
    'contact.html': 'contact',
    'incense.html': 'incense',
    'cones.html': 'cones',
    'essential-oil.html': 'essential-oil',
    'tapestry.html': 'tapestry',
    'ingredients.html': 'ingredients',
  };

  // Resolve current page key from URL
  function getCurrentPage() {
    const path = window.location.pathname;
    const file = path.split('/').pop() || '';
    return pageMap[file] || file.replace('.html', '');
  }

  // Set active class on matching nav links
  function setActiveNav() {
    const current = getCurrentPage();
    document.querySelectorAll('.nav-link[data-page]').forEach(function (link) {
      if (link.getAttribute('data-page') === current) {
        link.classList.add('active');
      } else {
        link.classList.remove('active');
      }
    });
  }

  // Fetch a partial and inject into a container, then run callback
  function loadPartial(url, containerId, callback) {
    var el = document.getElementById(containerId);
    if (!el) { if (callback) callback(); return; }
    fetch(url)
      .then(function (r) { return r.text(); })
      .then(function (html) {
        el.outerHTML = html;
        if (callback) callback();
      })
      .catch(function (e) {
        console.warn('includes.js: failed to load ' + url, e);
        if (callback) callback();
      });
  }

  // Load header first, then footer, then boot navigation
  document.addEventListener('DOMContentLoaded', function () {
    loadPartial('./partials/header.html', 'site-header', function () {
      setActiveNav();
      // Re-init navigation (scroll behaviour, mobile toggle, mega menu)
      if (typeof initNavigation === 'function') initNavigation();
      if (typeof initMegaMenu  === 'function') initMegaMenu();

      // Load footer after header is done
      loadPartial('./partials/footer.html', 'site-footer', function () {
        // Fire footer smoke canvas if present
        if (typeof initFooterSmoke === 'function') initFooterSmoke();
      });
    });
  });
})();
