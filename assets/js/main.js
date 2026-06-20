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
    if (!header) return;
    if (window.scrollY > 30) {
      header.classList.add('scrolled');
      header.classList.remove('header-transparent');
    } else {
      header.classList.remove('scrolled');
      header.classList.add('header-transparent');
    }
  });

  // Check initial scroll position
  if (header) {
    if (window.scrollY > 30) {
      header.classList.add('scrolled');
      header.classList.remove('header-transparent');
    } else {
      header.classList.add('header-transparent');
    }
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

  // Helper to check if element is in viewport
  function isInViewport(el) {
    const rect = el.getBoundingClientRect();
    return rect.top < window.innerHeight && rect.bottom > 0;
  }

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('revealed');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.05,
      rootMargin: '0px 0px 0px 0px'
    });

    reveals.forEach(el => observer.observe(el));
    textReveals.forEach(el => observer.observe(el));

    // Immediately reveal elements already in viewport (some browsers miss initial fire)
    setTimeout(() => {
      reveals.forEach(el => {
        if (isInViewport(el)) el.classList.add('revealed');
      });
      textReveals.forEach(el => {
        if (isInViewport(el)) el.classList.add('revealed');
      });
    }, 100);
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

/* --- Hero Slider Logic --- */
function initHeroSlider() {
  const slides = document.querySelectorAll('.hero-slide');
  const textSlides = document.querySelectorAll('.hero-text-slide');
  const dots = document.querySelectorAll('.slider-dot');
  if (slides.length === 0) return;

  let currentSlide = 0;
  let slideInterval;

  function goToSlide(index) {
    slides[currentSlide].classList.remove('active');
    if (dots.length > 0) dots[currentSlide].classList.remove('active');
    if (textSlides.length > 0) textSlides[currentSlide].classList.remove('active');
    
    currentSlide = index;
    
    slides[currentSlide].classList.add('active');
    if (dots.length > 0) dots[currentSlide].classList.add('active');
    if (textSlides.length > 0) textSlides[currentSlide].classList.add('active');
  }

  function nextSlide() {
    let next = (currentSlide + 1) % slides.length;
    goToSlide(next);
  }

  // Set interval
  slideInterval = setInterval(nextSlide, 5000); // 5 seconds per slide

  // Dot clicks
  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      clearInterval(slideInterval);
      goToSlide(index);
      slideInterval = setInterval(nextSlide, 5000);
    });
  });
}

/* --- Our Story Slider Logic --- */
function initStorySlider() {
  const slides = document.querySelectorAll('.story-slide');
  const dots = document.querySelectorAll('.story-dot');
  if (slides.length === 0) return;

  let currentSlide = 0;
  let slideInterval;

  function goToSlide(index) {
    slides[currentSlide].classList.remove('active');
    if (dots.length > 0) dots[currentSlide].classList.remove('active');
    
    currentSlide = index;
    
    slides[currentSlide].classList.add('active');
    if (dots.length > 0) dots[currentSlide].classList.add('active');
  }

  function nextSlide() {
    let next = (currentSlide + 1) % slides.length;
    goToSlide(next);
  }

  // Set interval
  slideInterval = setInterval(nextSlide, 4500); // 4.5 seconds per slide

  // Dot clicks
  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      clearInterval(slideInterval);
      goToSlide(index);
      slideInterval = setInterval(nextSlide, 4500);
    });
  });
}

document.addEventListener('DOMContentLoaded', initStorySlider);

/* --- Why Choose Us Slider Logic --- */
function initWhySlider() {
  const whySlider = document.getElementById('whySlider');
  const prevBtn = document.querySelector('.why-prev');
  const nextBtn = document.querySelector('.why-next');
  
  if (!whySlider) return;
  if (whySlider.dataset.initialized) return;
  whySlider.dataset.initialized = 'true';

  const totalSlides = 3;
  let currentIndex = 0;
  let slideInterval;

  function updateWhySlider(index) {
    currentIndex = index;
    const slideWidth = 100;
    whySlider.style.transform = `translateX(-${currentIndex * slideWidth}%)`;
  }

  function nextSlide() {
    let next = (currentIndex + 1) % totalSlides;
    updateWhySlider(next);
  }

  function prevSlide() {
    let prev = (currentIndex - 1 + totalSlides) % totalSlides;
    updateWhySlider(prev);
  }

  function startInterval() {
    slideInterval = setInterval(nextSlide, 30000); // 30 seconds
  }

  startInterval();

  if (prevBtn) {
    prevBtn.addEventListener('click', () => {
      clearInterval(slideInterval);
      prevSlide();
      startInterval();
    });
  }

  if (nextBtn) {
    nextBtn.addEventListener('click', () => {
      clearInterval(slideInterval);
      nextSlide();
      startInterval();
    });
  }
}

document.addEventListener('DOMContentLoaded', initWhySlider);

/* --- Featured Collections Slider Logic --- */
function initCollectionSlider() {
  const slider = document.getElementById('collectionSlider');
  const dots = document.querySelectorAll('.collection-dot');
  if (!slider || dots.length === 0) return;

  const totalSlides = 4;
  let currentIndex = 0;
  let slideInterval;

  function updateCollectionSlider(index) {
    currentIndex = index;
    // Remove active class from all dots
    dots.forEach(d => d.classList.remove('active'));
    // Add active class to current dot
    dots[currentIndex].classList.add('active');
    // Move slider
    slider.style.transform = `translateX(-${currentIndex * 100}%)`;
  }

  function nextSlide() {
    let next = (currentIndex + 1) % totalSlides;
    updateCollectionSlider(next);
  }

  // Set auto-play
  slideInterval = setInterval(nextSlide, 5000); // 5 seconds

  // Clickable dots
  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      clearInterval(slideInterval);
      updateCollectionSlider(index);
      slideInterval = setInterval(nextSlide, 5000);
    });
  });
}

document.addEventListener('DOMContentLoaded', initCollectionSlider);
/* --- Video Player Logic --- */
function initVideoPlayer() {
  const overlay = document.getElementById('videoOverlay');
  const playBtn = document.getElementById('playVideoBtn');
  const video = document.getElementById('processVideo');

  if (!overlay || !video) return;

  // When play is clicked, hide overlay and play the video
  overlay.addEventListener('click', () => {
    overlay.style.opacity = '0';
    setTimeout(() => {
      overlay.style.display = 'none';
      video.muted = false; // Unmute for user to hear the audio
      video.play().catch(err => console.log("Video play failed:", err));
    }, 500); // match CSS transition duration
  });
}

// Ensure functions are called
document.addEventListener('DOMContentLoaded', () => {
  initHeroSlider();
  initVideoPlayer();
});

/* --- Counters Animation --- */
function initCounters() {
  const counters = document.querySelectorAll('.count-up');
  if (counters.length === 0) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const target = entry.target;
        const targetValue = parseInt(target.getAttribute('data-target'), 10);
        const duration = 2000; // ms
        const frameDuration = 1000 / 60;
        const totalFrames = Math.round(duration / frameDuration);
        let frame = 0;

        const counterInterval = setInterval(() => {
          frame++;
          const progress = frame / totalFrames;
          const currentCount = Math.round(targetValue * progress);

          target.innerText = currentCount;

          if (frame >= totalFrames) {
            target.innerText = targetValue;
            clearInterval(counterInterval);
          }
        }, frameDuration);

        observer.unobserve(target);
      }
    });
  }, { threshold: 0.1 });

  counters.forEach(counter => {
    observer.observe(counter);
  });
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => {
    initCounters();
  });
} else {
  initCounters();
}
