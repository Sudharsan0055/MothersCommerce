// Common scripts for Mothers Commerce

document.addEventListener('DOMContentLoaded', () => {
  initNavigation();
  initScrollEffects();
  initInquiryDrawer();
  initParallax();
  initMagneticButtons();
  initScentLibrary();
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
    const headerEl = document.querySelector('.header');

    toggle.addEventListener('click', () => {
      toggle.classList.toggle('open');
      mobileMenu.classList.toggle('open');
      if (headerEl) headerEl.classList.toggle('menu-open');
      
      // Prevent scrolling when menu is open
      if (mobileMenu.classList.contains('open')) {
        document.body.style.overflow = 'hidden';
      } else {
        document.body.style.overflow = '';
      }
    });

    // Close mobile menu on clicking a link (unless it's a dropdown toggle)
    const mobileLinks = mobileMenu.querySelectorAll('.nav-link');
    mobileLinks.forEach(link => {
      link.addEventListener('click', (e) => {
        // Don't close if it's the mega menu toggle
        if (link.getAttribute('href') === '#') return;
        
        toggle.classList.remove('open');
        mobileMenu.classList.remove('open');
        if (headerEl) headerEl.classList.remove('menu-open');
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
  const bgSlides = document.querySelectorAll('.why-bg-slide');

  function updateWhySlider(index) {
    currentIndex = index;
    const slideWidth = 100;
    whySlider.style.transform = `translateX(-${currentIndex * slideWidth}%)`;
    
    // Sync background image slider
    if (bgSlides.length > 0) {
      bgSlides.forEach((slide, idx) => {
        if (idx === currentIndex) {
          slide.classList.add('active');
        } else {
          slide.classList.remove('active');
        }
      });
    }
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

/* --- Shop CTA Background Slider Logic --- */
function initCtaSlider() {
  const slides = document.querySelectorAll('.cta-bg-slide');
  if (slides.length === 0) return;

  let currentSlide = 0;
  let slideInterval;

  function nextSlide() {
    slides[currentSlide].classList.remove('active');
    currentSlide = (currentSlide + 1) % slides.length;
    slides[currentSlide].classList.add('active');
  }

  function startInterval() {
    slideInterval = setInterval(nextSlide, 6000); // 6 seconds per slide
  }

  startInterval();
}

document.addEventListener('DOMContentLoaded', initCtaSlider);

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
  const ytPlayer = document.getElementById('ytPlayer');
  const ytPlayerWrap = document.getElementById('ytPlayerWrap');

  if (!overlay) return;

  const startPlaying = () => {
    overlay.style.opacity = '0';
    setTimeout(() => {
      overlay.style.display = 'none';
      if (video) {
        video.muted = false;
        video.play().catch(err => console.log("Video play failed:", err));
      } else if (ytPlayer && ytPlayerWrap) {
        ytPlayerWrap.style.display = 'block';
        ytPlayer.src = "https://www.youtube.com/embed/ku4JxldtkI0?autoplay=1&mute=0&rel=0&showinfo=0&controls=1";
      }
    }, 500); // match CSS transition duration
  };

  overlay.addEventListener('click', startPlaying);
  if (playBtn) {
    playBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      startPlaying();
    });
  }
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

/* --- Footer Smoke Animation --- */
function initFooterSmoke() {
  const canvas = document.getElementById('footer-smoke-canvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');
  let animationFrameId;

  function resize() {
    const parent = canvas.parentElement;
    if (parent) {
      canvas.width = parent.clientWidth || window.innerWidth;
      canvas.height = parent.clientHeight || 450;
    } else {
      canvas.width = window.innerWidth;
      canvas.height = 450;
    }
  }
  window.addEventListener('resize', resize);
  window.addEventListener('load', resize);
  resize();
  setTimeout(resize, 500);
  setTimeout(resize, 2000);

  const particles = [];
  const sources = [
    { x: 0.25, nextSpawn: 0 },
    { x: 0.5, nextSpawn: 0 },
    { x: 0.75, nextSpawn: 0 }
  ];

  class SmokeParticle {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.vx = (Math.random() - 0.5) * 0.45;
      this.vy = -0.4 - Math.random() * 0.5;
      this.baseSize = 35 + Math.random() * 35;
      this.size = this.baseSize;
      this.alpha = 0.14 + Math.random() * 0.12; // visible but delicate wisps
      this.decay = 0.0006 + Math.random() * 0.0006; // dissipates organically
      this.growth = 0.25 + Math.random() * 0.2; // billows out gently
      this.wobbleSpeed = 0.004 + Math.random() * 0.008;
      this.wobbleAngle = Math.random() * Math.PI * 2;
      this.wobbleRange = 0.25 + Math.random() * 0.25;
      const palette = ['212, 175, 55', '235, 225, 210', '180, 140, 90'];
      this.color = palette[Math.floor(Math.random() * palette.length)];
    }

    update() {
      this.x += this.vx + Math.sin(this.wobbleAngle) * this.wobbleRange;
      this.y += this.vy;
      this.wobbleAngle += this.wobbleSpeed;
      this.size += this.growth;
      this.alpha -= this.decay;
    }

    draw() {
      if (this.alpha <= 0) return;
      ctx.save();
      ctx.globalAlpha = this.alpha;
      
      const grad = ctx.createRadialGradient(this.x, this.y, this.size * 0.05, this.x, this.y, this.size);
      grad.addColorStop(0, `rgba(${this.color}, 0.3)`);
      grad.addColorStop(0.35, `rgba(${this.color}, 0.12)`);
      grad.addColorStop(0.7, `rgba(${this.color}, 0.03)`);
      grad.addColorStop(1, `rgba(${this.color}, 0)`);
      
      ctx.fillStyle = grad;
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
      ctx.fill();
      ctx.restore();
    }
  }

  function animate(time) {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    const rect = canvas.getBoundingClientRect();
    const inViewport = rect.top < window.innerHeight && rect.bottom > 0;

    if (inViewport) {
      sources.forEach(source => {
        if (time > source.nextSpawn) {
          const spawnX = source.x * canvas.width + (Math.random() - 0.5) * 50;
          const spawnY = canvas.height + 30;
          particles.push(new SmokeParticle(spawnX, spawnY));
          source.nextSpawn = time + 350 + Math.random() * 500; // pacing spawn rate
        }
      });
    }

    for (let i = particles.length - 1; i >= 0; i--) {
      const p = particles[i];
      p.update();
      p.draw();
      if (p.alpha <= 0 || p.y < -p.size) {
        particles.splice(i, 1);
      }
    }

    animationFrameId = requestAnimationFrame(animate);
  }

  animationFrameId = requestAnimationFrame(animate);
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => {
    initCounters();
    initFooterSmoke();
    initHeritageSmokeBubbles();
  });
} else {
  initCounters();
  initFooterSmoke();
  initHeritageSmokeBubbles();
}

/* --- Heritage Section Smoky Bubble Effects --- */
function initHeritageSmokeBubbles() {
  const canvas = document.getElementById('heritage-bubble-canvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');
  let animationFrameId;
  let particles = [];
  
  const resize = () => {
    const rect = canvas.parentElement.getBoundingClientRect();
    canvas.width = rect.width;
    canvas.height = rect.height;
  };
  resize();
  window.addEventListener('resize', resize);
  
  let isVisible = false;
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        isVisible = entry.isIntersecting;
        if (isVisible && !animationFrameId) {
          animate();
        } else if (!isVisible && animationFrameId) {
          cancelAnimationFrame(animationFrameId);
          animationFrameId = null;
        }
      });
    }, { threshold: 0.01 });
    observer.observe(canvas.parentElement);
  } else {
    isVisible = true;
  }
  
  class SmokeBubble {
    constructor() {
      this.reset(true);
    }
    
    reset(initial = false) {
      this.x = Math.random() * canvas.width;
      this.y = initial ? Math.random() * canvas.height : canvas.height + 50;
      this.size = 15 + Math.random() * 30;
      this.speedY = 0.2 + Math.random() * 0.4;
      this.wobble = Math.random() * Math.PI * 2;
      this.wobbleSpeed = 0.01 + Math.random() * 0.015;
      this.wobbleRange = 0.2 + Math.random() * 0.4;
      this.alpha = 0.01;
      this.maxAlpha = 0.06 + Math.random() * 0.08;
      this.fadeState = 'in';
      this.floatHeight = canvas.height * (0.15 + Math.random() * 0.65);
      
      const r = Math.random();
      if (r < 0.65) {
        this.color = '212, 175, 55'; // Sandalwood Gold
      } else if (r < 0.85) {
        this.color = '194, 125, 86'; // Terracotta
      } else {
        this.color = '250, 248, 245'; // Cream
      }
    }
    
    update() {
      this.y -= this.speedY;
      this.wobble += this.wobbleSpeed;
      this.x += Math.sin(this.wobble) * this.wobbleRange;
      
      if (this.fadeState === 'in') {
        this.alpha += 0.002;
        if (this.alpha >= this.maxAlpha) {
          this.alpha = this.maxAlpha;
          this.fadeState = 'float';
        }
      } else if (this.y < this.floatHeight || this.y < 40) {
        this.fadeState = 'out';
      }
      
      if (this.fadeState === 'out') {
        this.alpha -= 0.002;
        if (this.alpha <= 0) {
          this.reset();
        }
      }
    }
    
    draw() {
      ctx.beginPath();
      const gradient = ctx.createRadialGradient(
        this.x, this.y, this.size * 0.1,
        this.x, this.y, this.size
      );
      gradient.addColorStop(0, `rgba(${this.color}, ${this.alpha * 1.6})`);
      gradient.addColorStop(0.5, `rgba(${this.color}, ${this.alpha * 0.6})`);
      gradient.addColorStop(1, 'rgba(250, 248, 245, 0)');
      
      ctx.fillStyle = gradient;
      ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
      ctx.fill();
    }
  }
  
  const particleCount = 20;
  for (let i = 0; i < particleCount; i++) {
    particles.push(new SmokeBubble());
  }
  
  const animate = () => {
    if (!isVisible) {
      animationFrameId = null;
      return;
    }
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    particles.forEach(p => {
      p.update();
      p.draw();
    });
    animationFrameId = requestAnimationFrame(animate);
  };
  
  if (isVisible) {
    animate();
  }
}

/* --- Scent Library Filtering Logic --- */
function initScentLibrary() {
  const filterContainer = document.querySelector('.fragrance-filters');
  const cards = document.querySelectorAll('.fragrance-card');
  if (!filterContainer || !cards.length) return;

  const buttons = filterContainer.querySelectorAll('.btn-filter');

  buttons.forEach(button => {
    button.addEventListener('click', () => {
      const filterValue = button.getAttribute('data-filter');

      // Toggle active class on filter buttons
      buttons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');

      // Toggle hidden/revealed class on cards
      cards.forEach(card => {
        const isFeatured = card.getAttribute('data-featured') === 'true';
        const cardCategory = card.getAttribute('data-category');

        let show = false;
        if (filterValue === 'all') {
          show = true;
        } else if (filterValue === 'featured') {
          show = isFeatured;
        } else {
          show = (cardCategory === filterValue);
        }

        if (show) {
          card.classList.remove('hidden');
          // Ensure reveal animations trigger
          setTimeout(() => {
            card.classList.add('revealed');
          }, 50);
        } else {
          card.classList.add('hidden');
        }
      });
    });
  });
}



document.addEventListener('DOMContentLoaded', function() {
  // Savon Mega Menu Tabs
  const savonTabs = document.querySelectorAll('.savon-tab');
  const savonPanels = document.querySelectorAll('.savon-panel');

  if(savonTabs.length > 0) {
    savonTabs.forEach(tab => {
      tab.addEventListener('mouseenter', function(e) {
        
        // Remove active class from all tabs and panels
        savonTabs.forEach(t => t.classList.remove('active'));
        savonPanels.forEach(p => p.classList.remove('active'));
        
        // Add active class to clicked tab
        this.classList.add('active');
        
        // Show corresponding panel
        const targetId = this.getAttribute('data-target');
        const targetPanel = document.getElementById(targetId);
        if (targetPanel) {
          targetPanel.classList.add('active');
        }
      });
    });
  }
});



document.addEventListener('DOMContentLoaded', function() {
  // Mega menu carousel logic for multiple carousels
  const carouselContainers = document.querySelectorAll('.incense-carousel-container');
  carouselContainers.forEach(container => {
    const carousel = container.querySelector('.incense-carousel');
    const prevBtn = container.querySelector('.carousel-prev');
    const nextBtn = container.querySelector('.carousel-next');
    
    if (carousel && prevBtn && nextBtn) {
      prevBtn.addEventListener('click', function(e) {
        e.preventDefault();
        carousel.scrollBy({ left: -340, behavior: 'smooth' });
      });

      nextBtn.addEventListener('click', function(e) {
        e.preventDefault();
        carousel.scrollBy({ left: 340, behavior: 'smooth' });
      });
    }
  });

  // MEGA MENU DYNAMIC BACKGROUNDS
  const tabs = document.querySelectorAll('.savon-tab');
  const bgLayers = document.querySelectorAll('.mega-bg-layer');
  
  console.log('Mega Menu Init: Found ' + tabs.length + ' tabs and ' + bgLayers.length + ' bg layers.');

  tabs.forEach(tab => {
    tab.addEventListener('mouseenter', function() {
      const targetId = this.getAttribute('data-target'); // e.g., 'tab-cones'
      console.log('Hovered tab, target is:', targetId);
      
      // Hide all backgrounds
      bgLayers.forEach(layer => layer.classList.remove('active'));
      
      // Show matching background
      const targetBg = document.getElementById('bg-' + targetId);
      if (targetBg) {
        targetBg.classList.add('active');
        console.log('Activated background:', 'bg-' + targetId);
      } else {
        console.error('Could not find background with ID:', 'bg-' + targetId);
      }
    });
  });
});
