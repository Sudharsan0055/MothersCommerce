// Common scripts for Mothers Commerce

document.addEventListener('DOMContentLoaded', () => {
  initNavigation();
  initScrollEffects();
  initInquiryDrawer();
});

/* --- Navigation Header logic --- */
function initNavigation() {
  const header = document.querySelector('.header');
  const toggle = document.querySelector('.mobile-nav-toggle');
  const mobileMenu = document.querySelector('.mobile-menu');

  // Add scroll class to header
  window.addEventListener('scroll', () => {
    if (window.scrollY > 30) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });

  // Check initial scroll position
  if (window.scrollY > 30) {
    header.classList.add('scrolled');
  }

  // Mobile menu toggle
  if (toggle && mobileMenu) {
    toggle.addEventListener('click', () => {
      toggle.classList.toggle('open');
      mobileMenu.classList.toggle('open');
      
      // Prevent scrolling when menu is open
      if (mobileMenu.classList.contains('open')) {
        document.body.style.overflow = 'hidden';
      } else {
        document.body.style.overflow = '';
      }
    });

    // Close mobile menu on clicking a link
    const mobileLinks = mobileMenu.querySelectorAll('.nav-link');
    mobileLinks.forEach(link => {
      link.addEventListener('click', () => {
        toggle.classList.remove('open');
        mobileMenu.classList.remove('open');
        document.body.style.overflow = '';
      });
    });
  }

  // Set active link based on current page
  const currentPath = window.location.pathname;
  const pageName = currentPath.substring(currentPath.lastIndexOf('/') + 1) || 'index.html';
  
  const navLinks = document.querySelectorAll('.nav-link');
  navLinks.forEach(link => {
    const linkHref = link.getAttribute('href');
    if (linkHref === pageName || (pageName === 'index.html' && linkHref === './') || (pageName === '' && linkHref === 'index.html')) {
      link.classList.add('active');
    } else {
      link.classList.remove('active');
    }
  });
}

/* --- Scroll Reveal Animations --- */
function initScrollEffects() {
  const reveals = document.querySelectorAll('.reveal');

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('revealed');
          // Once animated, we don't need to observe it anymore
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px' // Trigger slightly before it enters viewport completely
    });

    reveals.forEach(el => observer.observe(el));
  } else {
    // Fallback if IntersectionObserver is not supported
    reveals.forEach(el => el.classList.add('revealed'));
  }
}

/* --- Global Inquiry Drawer Management --- */
function initInquiryDrawer() {
  // Create drawer HTML if it doesn't exist yet
  createDrawerElements();

  const overlay = document.querySelector('.inquiry-drawer-overlay');
  const drawer = document.querySelector('.inquiry-drawer');
  const closeBtn = document.querySelector('.drawer-close');
  const badge = document.querySelector('.inquiry-badge-floating');

  // Event listener for opening
  if (badge) {
    badge.addEventListener('click', () => {
      openInquiryDrawer();
    });
  }

  // Event listener for closing
  if (closeBtn) {
    closeBtn.addEventListener('click', () => {
      closeInquiryDrawer();
    });
  }

  if (overlay) {
    overlay.addEventListener('click', () => {
      closeInquiryDrawer();
    });
  }

  // Initial render of items
  renderDrawerItems();
}

function createDrawerElements() {
  // Check if drawer exists
  if (document.querySelector('.inquiry-drawer-overlay')) return;

  // Insert floating badge
  const badgeHTML = `
    <div class="inquiry-badge-floating" id="inquiryFloatingBadge" style="display: none;">
      <i class="fas fa-leaf"></i>
      <span>Enquiry Basket</span>
      <div class="count" id="inquiryCount">0</div>
    </div>
  `;
  document.body.insertAdjacentHTML('beforeend', badgeHTML);

  // Insert Drawer Markup
  const drawerHTML = `
    <div class="inquiry-drawer-overlay" id="inquiryDrawerOverlay"></div>
    <div class="inquiry-drawer" id="inquiryDrawer">
      <div class="drawer-header">
        <h3>Enquiry Basket</h3>
        <button class="drawer-close" id="drawerCloseBtn">&times;</button>
      </div>
      <div class="drawer-content" id="drawerContent">
        <!-- Rendered items go here -->
      </div>
      <div class="drawer-footer">
        <button class="btn btn-primary" id="drawerCheckoutBtn">Proceed to Enquiry</button>
      </div>
    </div>
  `;
  document.body.insertAdjacentHTML('beforeend', drawerHTML);

  // Setup click for checkout button
  const checkoutBtn = document.getElementById('drawerCheckoutBtn');
  if (checkoutBtn) {
    checkoutBtn.addEventListener('click', () => {
      closeInquiryDrawer();
      window.location.href = 'contact.html?source=basket';
    });
  }
}

// Global functions for export / use in other files
window.getInquiryBasket = function() {
  try {
    return JSON.parse(localStorage.getItem('mc_inquiry_basket')) || [];
  } catch (e) {
    return [];
  }
};

window.saveInquiryBasket = function(basket) {
  localStorage.setItem('mc_inquiry_basket', JSON.stringify(basket));
  window.updateInquiryUI();
};

window.addToInquiryBasket = function(id, name, desc) {
  let basket = window.getInquiryBasket();
  if (!basket.some(item => item.id === id)) {
    basket.push({ id, name, desc });
    window.saveInquiryBasket(basket);
    
    // Smooth scroll open drawer to show success
    setTimeout(() => {
      window.openInquiryDrawer();
    }, 300);
  } else {
    // Already in basket, just open to show them
    window.openInquiryDrawer();
  }
};

window.removeFromInquiryBasket = function(id) {
  let basket = window.getInquiryBasket();
  basket = basket.filter(item => item.id !== id);
  window.saveInquiryBasket(basket);
};

window.openInquiryDrawer = function() {
  document.getElementById('inquiryDrawerOverlay').classList.add('open');
  document.getElementById('inquiryDrawer').classList.add('open');
  document.body.style.overflow = 'hidden';
  renderDrawerItems();
};

window.closeInquiryDrawer = function() {
  document.getElementById('inquiryDrawerOverlay').classList.remove('open');
  document.getElementById('inquiryDrawer').classList.remove('open');
  document.body.style.overflow = '';
};

window.updateInquiryUI = function() {
  const basket = window.getInquiryBasket();
  const badge = document.getElementById('inquiryFloatingBadge');
  const countEl = document.getElementById('inquiryCount');
  
  if (badge && countEl) {
    if (basket.length > 0) {
      badge.style.display = 'flex';
      countEl.textContent = basket.length;
    } else {
      badge.style.display = 'none';
    }
  }

  renderDrawerItems();
};

function renderDrawerItems() {
  const basket = window.getInquiryBasket();
  const container = document.getElementById('drawerContent');
  const checkoutBtn = document.getElementById('drawerCheckoutBtn');
  
  if (!container) return;

  if (basket.length === 0) {
    container.innerHTML = `
      <div class="drawer-empty-state">
        <i class="fas fa-shopping-basket" style="font-size: 2.5rem; color: var(--color-border); margin-bottom: var(--space-sm);"></i>
        <p>Your enquiry basket is empty.</p>
        <a href="products.html" class="btn btn-outline" style="margin-top: var(--space-md);">Browse Products</a>
      </div>
    `;
    if (checkoutBtn) checkoutBtn.style.display = 'none';
  } else {
    let itemsHTML = '<div class="drawer-items">';
    basket.forEach(item => {
      itemsHTML += `
        <div class="drawer-item" id="drawer-item-${item.id}">
          <div class="drawer-item-details">
            <div class="drawer-item-title">${item.name}</div>
            <div class="drawer-item-desc">${item.desc}</div>
          </div>
          <button class="drawer-item-remove" onclick="window.removeFromInquiryBasket('${item.id}')">
            <i class="fas fa-trash-alt"></i>
          </button>
        </div>
      `;
    });
    itemsHTML += '</div>';
    container.innerHTML = itemsHTML;
    if (checkoutBtn) checkoutBtn.style.display = 'block';
  }
}

// Initial UI setup update
window.updateInquiryUI();
