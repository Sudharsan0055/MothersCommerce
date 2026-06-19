// Common scripts for Mothers Commerce

document.addEventListener('DOMContentLoaded', () => {
  initNavigation();
  initScrollEffects();
  initInquiryDrawer();
  initParallax();
  initMagneticButtons();
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
      header.classList.remove('header-transparent');
    } else {
      header.classList.remove('scrolled');
      header.classList.add('header-transparent');
    }
  });

  // Check initial scroll position
  if (window.scrollY > 30) {
    header.classList.add('scrolled');
    header.classList.remove('header-transparent');
  } else {
    header.classList.add('header-transparent');
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
  const textReveals = document.querySelectorAll('.text-reveal-line');

  // Wrap words for text reveal
  textReveals.forEach(el => {
    // Save original HTML in case there are nested tags, but for simple headings split by words
    const text = el.innerText;
    el.innerHTML = '';
    const words = text.split(' ');
    words.forEach((word, i) => {
      const span = document.createElement('span');
      span.className = 'reveal-word';
      span.innerHTML = word + '&nbsp;';
      span.style.transitionDelay = `${i * 0.08}s`;
      el.appendChild(span);
    });
  });

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('revealed');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    });

    reveals.forEach(el => observer.observe(el));
    textReveals.forEach(el => observer.observe(el));
  } else {
    reveals.forEach(el => el.classList.add('revealed'));
    textReveals.forEach(el => el.classList.add('revealed'));
  }
}

/* --- Parallax Effects --- */
function initParallax() {
  const parallaxElements = document.querySelectorAll('.parallax-img');
  window.addEventListener('scroll', () => {
    parallaxElements.forEach(el => {
      const speed = el.getAttribute('data-speed') || 0.15;
      const rect = el.parentElement.getBoundingClientRect();
      const elementCenter = rect.top + (rect.height / 2);
      const viewportCenter = window.innerHeight / 2;
      const distance = elementCenter - viewportCenter;
      
      const yPos = -(distance * speed);
      el.style.transform = `translate3d(0, ${yPos}px, 0) scale(1.1)`;
    });
  }, { passive: true });
}

/* --- Magnetic Buttons --- */
function initMagneticButtons() {
  const magnetics = document.querySelectorAll('.magnetic');
  
  magnetics.forEach(btn => {
    btn.addEventListener('mousemove', (e) => {
      const rect = btn.getBoundingClientRect();
      const x = e.clientX - rect.left - rect.width / 2;
      const y = e.clientY - rect.top - rect.height / 2;
      
      btn.style.transform = `translate(${x * 0.3}px, ${y * 0.3}px)`;
    });
    
    btn.addEventListener('mouseleave', () => {
      btn.style.transform = `translate(0px, 0px)`;
    });
  });
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

 / *   - - -   H e r o   S l i d e r   L o g i c   - - -   * / 
 f u n c t i o n   i n i t H e r o S l i d e r ( )   { 
     c o n s t   s l i d e s   =   d o c u m e n t . q u e r y S e l e c t o r A l l ( ' . h e r o - s l i d e ' ) ; 
     c o n s t   d o t s   =   d o c u m e n t . q u e r y S e l e c t o r A l l ( ' . s l i d e r - d o t ' ) ; 
     i f   ( s l i d e s . l e n g t h   = = =   0 )   r e t u r n ; 
 
     l e t   c u r r e n t S l i d e   =   0 ; 
     l e t   s l i d e I n t e r v a l ; 
 
     f u n c t i o n   g o T o S l i d e ( i n d e x )   { 
         s l i d e s [ c u r r e n t S l i d e ] . c l a s s L i s t . r e m o v e ( ' a c t i v e ' ) ; 
         d o t s [ c u r r e n t S l i d e ] . c l a s s L i s t . r e m o v e ( ' a c t i v e ' ) ; 
         
         c u r r e n t S l i d e   =   i n d e x ; 
         
         s l i d e s [ c u r r e n t S l i d e ] . c l a s s L i s t . a d d ( ' a c t i v e ' ) ; 
         d o t s [ c u r r e n t S l i d e ] . c l a s s L i s t . a d d ( ' a c t i v e ' ) ; 
     } 
 
     f u n c t i o n   n e x t S l i d e ( )   { 
         l e t   n e x t   =   ( c u r r e n t S l i d e   +   1 )   %   s l i d e s . l e n g t h ; 
         g o T o S l i d e ( n e x t ) ; 
     } 
 
     / /   S e t   i n t e r v a l 
     s l i d e I n t e r v a l   =   s e t I n t e r v a l ( n e x t S l i d e ,   5 0 0 0 ) ;   / /   5   s e c o n d s   p e r   s l i d e 
 
     / /   D o t   c l i c k s 
     d o t s . f o r E a c h ( ( d o t ,   i n d e x )   = >   { 
         d o t . a d d E v e n t L i s t e n e r ( ' c l i c k ' ,   ( )   = >   { 
             c l e a r I n t e r v a l ( s l i d e I n t e r v a l ) ; 
             g o T o S l i d e ( i n d e x ) ; 
             s l i d e I n t e r v a l   =   s e t I n t e r v a l ( n e x t S l i d e ,   5 0 0 0 ) ; 
         } ) ; 
     } ) ; 
 } 
 
 / *   - - -   V i d e o   P l a y e r   L o g i c   - - -   * / 
 f u n c t i o n   i n i t V i d e o P l a y e r ( )   { 
     c o n s t   v i d e o   =   d o c u m e n t . g e t E l e m e n t B y I d ( ' p r o c e s s V i d e o ' ) ; 
     c o n s t   p l a y B t n   =   d o c u m e n t . g e t E l e m e n t B y I d ( ' p l a y V i d e o B t n ' ) ; 
     c o n s t   v i d e o C o n t a i n e r   =   d o c u m e n t . q u e r y S e l e c t o r ( ' . v i d e o - c o n t a i n e r ' ) ; 
 
     i f   ( ! v i d e o   | |   ! p l a y B t n )   r e t u r n ; 
 
     p l a y B t n . a d d E v e n t L i s t e n e r ( ' c l i c k ' ,   ( )   = >   { 
         i f   ( v i d e o . p a u s e d )   { 
             v i d e o . p l a y ( ) ; 
             v i d e o C o n t a i n e r . c l a s s L i s t . a d d ( ' p l a y i n g ' ) ; 
             v i d e o . m u t e d   =   f a l s e ;   / /   u n m u t e   o n   e x p l i c i t   p l a y   i f   d e s i r e d ,   o r   k e e p   m u t e d 
         }   e l s e   { 
             v i d e o . p a u s e ( ) ; 
             v i d e o C o n t a i n e r . c l a s s L i s t . r e m o v e ( ' p l a y i n g ' ) ; 
         } 
     } ) ; 
 
     / /   O p t i o n a l :   P a u s e   v i d e o   i f   c l i c k e d   d i r e c t l y 
     v i d e o . a d d E v e n t L i s t e n e r ( ' c l i c k ' ,   ( )   = >   { 
         i f   ( ! v i d e o . p a u s e d )   { 
             v i d e o . p a u s e ( ) ; 
             v i d e o C o n t a i n e r . c l a s s L i s t . r e m o v e ( ' p l a y i n g ' ) ; 
         } 
     } ) ; 
 } 
 
 / /   E n s u r e   f u n c t i o n s   a r e   c a l l e d 
 d o c u m e n t . a d d E v e n t L i s t e n e r ( ' D O M C o n t e n t L o a d e d ' ,   ( )   = >   { 
     i n i t H e r o S l i d e r ( ) ; 
     i n i t V i d e o P l a y e r ( ) ; 
 } ) ; 
  
 