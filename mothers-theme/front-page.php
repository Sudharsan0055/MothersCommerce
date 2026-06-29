<?php get_header(); ?>

    <?php
    // Required for Elementor and standard WordPress content
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    endif;
    ?>

<!-- Mobile Drawer Menu -->
  <div class="mobile-menu" id="mobileMenuOverlay">
    <!-- MOBILE MEGA MENU -->
    <div class="mobile-has-mega-menu" style="margin-bottom: 0.5rem;">
      <a href="#" class="nav-link" onclick="this.parentElement.classList.toggle('active'); return false;">
        Catalog <i class="fa-solid fa-angle-down"></i>
      </a>
      <div class="mobile-mega-menu">
        <div>
          <h4 class="mobile-mega-column-heading">Products</h4>
          <ul class="mobile-mega-list">
            <li><a href="incense.html">Incense Sticks</a></li>
            <li><a href="cones.html">Botanical Cones</a></li>
            <li><a href="essential-oil.html">Essential Oils</a></li>
            <li><a href="tapestry.html">Tapestries</a></li>
          </ul>
        </div>
        <div style="margin-top: 1rem;">
          <h4 class="mobile-mega-column-heading">Fragrances</h4>
          <ul class="mobile-mega-list">
            <li><a href="fragrances.html">All Fragrances</a></li>
            <li><a href="ingredients.html">Ingredients</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /MOBILE MEGA MENU -->
<a href="index.html" class="nav-link">Home</a>
    <a href="fragrances.html" class="nav-link">Fragrances</a>
    <a href="products.html" class="nav-link">Products</a>
    <a href="about-us.html" class="nav-link">About Us</a>
    <a href="contact.html" class="nav-link">Contact</a>
    <a href="contact.html" class="btn btn-primary" style="margin-top: var(--space-md);">Enquire Now</a>
  </div>

  <main>
    <!-- Hero Section -->
    <section class="hero">
      <!-- Full-bleed background slider -->
      <div class="hero-bg-slider" id="heroSlider">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero_incense_mood_1781801686159.png" alt="Aesthetic setup of handcrafted natural incense burning with elegant smoke" class="hero-slide active">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/incense_cones_aesthetic_1781801710438.png" alt="Natural botanical cones" class="hero-slide">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/handmade_incense.webp" alt="Handcrafted natural aromatic incense sticks" class="hero-slide">
      </div>
      
      <!-- Overlay to darken background image -->
      <div class="hero-overlay"></div>
      
      <!-- Cinematic particle canvas -->
      <canvas id="heroCanvas"></canvas>
      <!-- Film grain overlay -->
      <div class="hero-grain"></div>
      
      <!-- Glowing orbs -->
      <div class="hero-orb hero-orb-1"></div>
      <div class="hero-orb hero-orb-2"></div>
      <div class="hero-orb hero-orb-3"></div>

      <!-- Glassmorphic content card centered -->
      <div class="hero-container">
        <div class="hero-card">
          <div class="hero-badge"><i class="fa-solid fa-spa" style="margin-right:6px;"></i>Handcrafted with Love</div>
          <h1>The Mother's Fragrances.<br>Pure Aroma.<br><span>Nature's Best.</span></h1>
          <div class="hero-shimmer-line"></div>
          <p>Discover our exquisite collection of hand-rolled incense, cones, essential oils, and beautiful tapestries designed to elevate your lifestyle and spiritual practice.</p>
          <div class="hero-actions">
            <a href="products.html" class="btn btn-terracotta magnetic"><i class="fa-solid fa-bag-shopping" style="margin-right:8px;"></i>Shop All Products</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Legacy / Introduction Section -->
    <section class="section">
      <div class="container">
        <div class="split-section">
          <div class="split-image-wrapper reveal-left">
            <div class="story-slider-wrapper">
              <div class="story-slider" id="storySlider">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pondicherry.png" alt="Incense maker rolling incense manually in a warm lit Pondicherry workshop" class="story-slide active">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/process_sourcing.png" alt="Sourcing natural botanical ingredients" class="story-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/process_rolling.png" alt="Artisans rolling incense paste by hand" class="story-slide">
              </div>
              <div class="story-slider-overlay"></div>
              
              <!-- Story Slider Controls -->
              <div class="story-slider-controls">
                <button class="story-dot active" data-index="0" aria-label="Story Slide 1"></button>
                <button class="story-dot" data-index="1" aria-label="Story Slide 2"></button>
                <button class="story-dot" data-index="2" aria-label="Story Slide 3"></button>
              </div>
            </div>
          </div>
          <div class="split-content reveal-right reveal-delay-2">
            <h2 class="italic text-serif" style="color: var(--color-terracotta); font-size: 1.25rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: var(--space-xs);">Our Story</h2>
            <h2 class="text-reveal-line" style="font-size: 2.8rem; margin-bottom: var(--space-md); font-weight: 500;">A Legacy of Pure Scents</h2>
            <p style="font-size: 1.05rem; margin-bottom: var(--space-md); line-height: 1.8;">
              The Mother's Fragrances is dedicated to crafting the finest natural incense, essential oils, and aromatic products. We preserve the ancient tradition of natural incense-making, avoiding synthetic chemicals and toxic binders. 
            </p>
            <p style="font-size: 1.05rem; margin-bottom: var(--space-lg); line-height: 1.8;">
              Our products start with pure sandalwood powder, raw resins, essential oils, and sun-dried flower petals. Every item we offer is designed to bring peace, tranquility, and natural beauty into your living spaces.
            </p>
            <a href="about-us.html" class="btn btn-outline">Read More</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Core Pillars Section (Why Choose Us) -->
    <section class="section why-choose-us-section">
      <!-- Background slider -->
      <div class="why-bg-slider" id="whySliderBg">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sandalwood_incense.webp" alt="Pure sandalwood incense" class="why-bg-slide active">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lavender_incense.webp" alt="Lavender incense sticks" class="why-bg-slide">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero_incense.webp" alt="Premium incense cones and sticks" class="why-bg-slide">
      </div>
      <!-- Background overlay to darken image and make text readable -->
      <div class="why-overlay"></div>
      
      <!-- Background incense stick smoke canvas -->
      <canvas id="whySmokeCanvas" style="position: absolute; inset: 0; width: 100%; height: 100%; pointer-events: none; z-index: 2; opacity: 0.6; display: block;"></canvas>
      <!-- Glowing animated background orbs -->
      <div class="why-orb why-orb-1"></div>
      <div class="why-orb why-orb-2"></div>
      
      <div class="container" style="position: relative; z-index: 3;">
        <div style="text-align: center; max-width: var(--max-width-narrow); margin: 0 auto var(--space-3xl) auto;" class="reveal">
          <h2 class="italic text-serif" style="color: var(--color-gold); font-size: 1.2rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: var(--space-xs);">Why Choose Us</h2>
          <h2 style="font-size: 2.5rem; color: var(--color-bg);">The The Mother's Fragrances Difference</h2>
          <p style="margin-top: var(--space-xs); color: rgba(250, 248, 245, 0.7);">We ensure the highest quality in every incense stick, cone, and drop of oil we produce.</p>
        </div>

        <div class="why-slider-wrapper reveal">
          <div class="why-slider" id="whySlider">
            <!-- Card 1 -->
            <div class="pillar-card-wrapper">
              <div class="pillar-card">
                <div class="pillar-icon"><i class="fa-solid fa-leaf"></i></div>
                <h3>100% Natural Ingredients</h3>
                <p>Zero synthetic charcoal, zero toxic chemical binders, and zero synthetic fragrances. Pure botanical elements.</p>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="pillar-card-wrapper">
              <div class="pillar-card">
                <div class="pillar-icon"><i class="fa-solid fa-hands-holding-circle"></i></div>
                <h3>Handcrafted Perfection</h3>
                <p>Each product is carefully handcrafted by artisans, maintaining a tradition that guarantees premium scent profiles.</p>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="pillar-card-wrapper">
              <div class="pillar-card">
                <div class="pillar-icon"><i class="fa-solid fa-spa"></i></div>
                <h3>Holistic Lifestyle</h3>
                <p>From meditation incense to beautiful tapestries, our catalog is designed to enrich your holistic lifestyle.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Featured Collections Teaser -->
    <section class="section feat-collections-section" style="padding: 0; background: var(--color-bg);">
      <!-- Section Header -->
      <div class="container" style="padding-top: var(--space-4xl); padding-bottom: var(--space-2xl);">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: var(--space-md);" class="reveal">
          <div>
            <h2 class="italic text-serif" style="color: var(--color-terracotta); font-size: 1.2rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: var(--space-xs);">Featured Collections</h2>
            <h2 style="font-size: 2.5rem;">Crafted Aroma Families</h2>
          </div>
          <a href="products.html" class="btn btn-outline">View Catalog</a>
        </div>
      </div>

      <!-- Full-width Immersive Slider -->
      <div class="feat-slider-outer reveal">
        <div class="feat-slider-track" id="featSlider">

          <!-- Slide 1: Incense -->
          <div class="feat-slide">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/incense_premium_bundle_1781801699731.png" alt="Natural Incense" class="feat-slide-bg">
            <div class="feat-slide-overlay"></div>
            <div class="feat-slide-content">
              <div class="feat-slide-tag">Incense</div>
              <h2 class="feat-slide-title">Premium Hand-Rolled<br>Incense</h2>
              <p class="feat-slide-desc">Rich, woody, and floral fragrances. Made using traditional techniques for a clean and long-lasting burn.</p>
              <a href="incense.html" class="btn feat-slide-btn">Explore Collection</a>
            </div>
          </div>

          <!-- Slide 2: Cones -->
          <div class="feat-slide">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/incense_cones_aesthetic_1781801710438.png" alt="Incense Cones" class="feat-slide-bg">
            <div class="feat-slide-overlay"></div>
            <div class="feat-slide-content">
              <div class="feat-slide-tag">Cones</div>
              <h2 class="feat-slide-title">Aromatic Incense<br>Cones</h2>
              <p class="feat-slide-desc">Compact and potent. Our natural cones deliver an intense burst of pure botanical aroma for your space.</p>
              <a href="cones.html" class="btn feat-slide-btn">Explore Collection</a>
            </div>
          </div>

          <!-- Slide 3: Oils -->
          <div class="feat-slide">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/essential_oils_bottles_1781801723388.png" alt="Perfume & Essential Oils" class="feat-slide-bg">
            <div class="feat-slide-overlay"></div>
            <div class="feat-slide-content">
              <div class="feat-slide-tag">Oils</div>
              <h2 class="feat-slide-title">Perfume &amp; Essential<br>Oils</h2>
              <p class="feat-slide-desc">Highly concentrated natural oils. Perfect for diffusers, personal fragrance, and holistic healing.</p>
              <a href="essential-oil.html" class="btn feat-slide-btn">Explore Collection</a>
            </div>
          </div>

          <!-- Slide 4: Tapestry -->
          <div class="feat-slide">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mandala_wall_tapestry_1781801736289.png" alt="Artisanal Tapestry" class="feat-slide-bg">
            <div class="feat-slide-overlay"></div>
            <div class="feat-slide-content">
              <div class="feat-slide-tag">Tapestry</div>
              <h2 class="feat-slide-title">Artisanal Wall<br>Tapestries</h2>
              <p class="feat-slide-desc">Beautiful, intricately designed fabrics to adorn your walls and create a spiritual ambiance.</p>
              <a href="tapestry.html" class="btn feat-slide-btn">Explore Collection</a>
            </div>
          </div>

        </div>

        <!-- Arrow Navigation (hidden) -->
        <button class="feat-arrow feat-prev" id="featPrev" aria-label="Previous" style="display:none;"><i class="fa-solid fa-chevron-left"></i></button>
        <button class="feat-arrow feat-next" id="featNext" aria-label="Next" style="display:none;"><i class="fa-solid fa-chevron-right"></i></button>
      </div>
    </section>

    <!-- Signature Scent Library Showcase Section -->
    



    <!-- The Artisanal Process (Immersive Dark Slider) -->
    <section class="heritage-section" id="heritageSection">
      <!-- Smoky Bubble Canvas Background -->
      <canvas id="heritage-bubble-canvas" style="position: absolute; inset: 0; width: 100%; height: 100%; pointer-events: none; z-index: 1;"></canvas>
      <!-- Animated aurora orbs -->
      <div class="heritage-aurora">
        <div class="h-orb h-orb-1"></div>
        <div class="h-orb h-orb-2"></div>
        <div class="h-orb h-orb-3"></div>
      </div>

      <!-- Header -->
      <div class="heritage-hdr reveal">
        <span class="heritage-hdr-eye">Our Heritage</span>
        <h2>The 4 Steps of Purity</h2>
        <p>We preserve the ancient Indian tradition of hand-rolling, ensuring zero chemical compression and maximum aroma retention.</p>
      </div>

      <!-- Slider -->
      <div class="heritage-slider-wrap">
        <div class="heritage-slides" id="heritageSlides">

          <!-- Slide 1 -->
          <div class="heritage-slide active">
            <div class="h-slide-text">
              <div class="h-slide-step-num">01</div>
              <div class="h-slide-tag">Step One</div>
              <h3 class="h-slide-title">Sourcing</h3>
              <p class="h-slide-desc">Selecting only the finest pure botanical resins, gums, and woods. Each raw material is hand-inspected for aroma purity and natural quality before entering our process.</p>
              <div class="h-slide-icon"><i class="fa-solid fa-seedling"></i></div>
            </div>
            <div class="h-slide-img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/process_sourcing.png" alt="Sourcing natural botanical ingredients">
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="heritage-slide">
            <div class="h-slide-text">
              <div class="h-slide-step-num">02</div>
              <div class="h-slide-tag">Step Two</div>
              <h3 class="h-slide-title">Kneading</h3>
              <p class="h-slide-desc">Blending premium ingredients by hand into a fragrant, chemical-free aromatic dough. No machines, no shortcuts — only the artisan's touch creates this consistency.</p>
              <div class="h-slide-icon"><i class="fa-solid fa-hands"></i></div>
            </div>
            <div class="h-slide-img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/process_kneading.png" alt="Kneading the aromatic paste">
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="heritage-slide">
            <div class="h-slide-text">
              <div class="h-slide-step-num">03</div>
              <div class="h-slide-tag">Step Three</div>
              <h3 class="h-slide-title">Hand-Rolling</h3>
              <p class="h-slide-desc">Skilled artisans roll the aromatic paste onto natural bamboo splints with expert precision. Each stick is formed with a perfect density — never compressed by machine.</p>
              <div class="h-slide-icon"><i class="fa-solid fa-fire-flame-curved"></i></div>
            </div>
            <div class="h-slide-img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/process_rolling.png" alt="Hand rolling the incense sticks">
            </div>
          </div>

          <!-- Slide 4 -->
          <div class="heritage-slide">
            <div class="h-slide-text">
              <div class="h-slide-step-num">04</div>
              <div class="h-slide-tag">Step Four</div>
              <h3 class="h-slide-title">Sun Curing</h3>
              <p class="h-slide-desc">Slowly air and sun-dried over days in the open Pondicherry breeze. This natural curing locks in the deep, resonant aromas that make our incense truly exceptional.</p>
              <div class="h-slide-icon"><i class="fa-solid fa-sun"></i></div>
            </div>
            <div class="h-slide-img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pondicherry.png" alt="Sun curing the finished incense">
            </div>
          </div>

        </div>

        <!-- Step indicator dots -->
        <div class="heritage-dots" id="heritageDots">
          <div class="h-dot active" data-idx="0"></div>
          <div class="h-dot" data-idx="1"></div>
          <div class="h-dot" data-idx="2"></div>
          <div class="h-dot" data-idx="3"></div>
        </div>
      </div>
    </section>

<section class="section fragrances-showcase-section" id="scentLibrary">
      <div class="container">
        <!-- Section Header -->
        <div class="text-center" style="margin-bottom: var(--space-3xl);" class="reveal">
          <span class="product-tag" style="color: var(--color-gold); border-color: rgba(212, 175, 55, 0.25);">Botanical Palette</span>
          <h2 class="text-serif" style="color: var(--color-bg); font-size: 2.5rem; margin: 0.5rem 0 1rem 0;">Our Signature Scent Library</h2>
          <p style="max-width: 650px; margin: 0 auto; color: rgba(250, 248, 245, 0.7); font-size: 1.1rem;">
            Each of our handcrafted products is built around a single botanical scent profile. Discover our signature palette of 22 natural fragrances.
          </p>
        </div>

        <!-- Category Filter Tabs -->
        <div class="fragrance-filters reveal reveal-delay-1">
          <button class="btn btn-filter active" data-filter="featured">Featured Signature</button>
          <button class="btn btn-filter" data-filter="floral">Floral &amp; Romantic</button>
          <button class="btn btn-filter" data-filter="woody">Woody &amp; Earthy</button>
          <button class="btn btn-filter" data-filter="sweet">Sweet &amp; Spicy</button>
          <button class="btn btn-filter" data-filter="all">View All</button>
        </div>

        <!-- Fragrances Grid -->
        <div class="fragrance-grid reveal reveal-delay-2" id="fragranceGrid">
          <!-- Fragrance Card: Amber -->
          <div class="fragrance-card" data-category="sweet" data-featured="true">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/amber.jpg" alt="Amber" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Sweet & Spicy</span>
              <h3>Amber</h3>
              <p class="frag-desc">Delightfully soft and sweet. A dreamy fragrance that is calming and pleasant upon your emotions.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Autumn Leaves -->
          <div class="fragrance-card hidden" data-category="sweet" data-featured="false">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Autumn-Leaves.jpg" alt="Autumn Leaves" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Sweet & Spicy</span>
              <h3>Autumn Leaves</h3>
              <p class="frag-desc">Delightfully soft and sweet. A dreamy fragrance that is calming and pleasant upon your emotions.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Cinnamon & Spice -->
          <div class="fragrance-card" data-category="sweet" data-featured="true">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Cinnamon-and-Spice.jpg" alt="Cinnamon & Spice" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Sweet & Spicy</span>
              <h3>Cinnamon & Spice</h3>
              <p class="frag-desc">Delightfully soft and sweet. A dreamy fragrance that is calming and pleasant upon your emotions.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Evening Rose -->
          <div class="fragrance-card hidden" data-category="floral" data-featured="false">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Evening-Rose.jpg" alt="Evening Rose" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Floral & Romantic</span>
              <h3>Evening Rose</h3>
              <p class="frag-desc">Clear, strong, warm, and a little sweet. The fragrance of tuberose, pleasant and exotic.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Frankincense -->
          <div class="fragrance-card hidden" data-category="woody" data-featured="false">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Frankincense.jpg" alt="Frankincense" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Woody & Earthy</span>
              <h3>Frankincense</h3>
              <p class="frag-desc">A pleasantly sweet and slightly herbal fragrance. Olibanum resin is the basis of this fragrance.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Gardenia -->
          <div class="fragrance-card hidden" data-category="floral" data-featured="false">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Gardenia.jpg" alt="Gardenia" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Floral & Romantic</span>
              <h3>Gardenia</h3>
              <p class="frag-desc">The rich fragrance of the gardenia flower. A special scent with an abundance of interesting characteristics.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Honeysuckle -->
          <div class="fragrance-card hidden" data-category="floral" data-featured="false">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Honeysuckle.jpg" alt="Honeysuckle" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Floral & Romantic</span>
              <h3>Honeysuckle</h3>
              <p class="frag-desc">An especially sweet scent, a little stronger than our other floral fragrances. An active fragrance. The sweet simplicity of this fragrance shines as bright as the Southern sun.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Jasmine -->
          <div class="fragrance-card" data-category="floral" data-featured="true">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Jasmine.jpg" alt="Jasmine" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Floral & Romantic</span>
              <h3>Jasmine</h3>
              <p class="frag-desc">Soft and mild. This fragrance is a little dry and green. Jasmine is a scent of purity, it is pleasant and soothing. The scents are extremely rich, complex, and long-lasting.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Lavender -->
          <div class="fragrance-card" data-category="floral" data-featured="true">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Lavender.jpg" alt="Lavender" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Floral & Romantic</span>
              <h3>Lavender</h3>
              <p class="frag-desc">One of our mildest fragrances, dry and fresh with a calming effect. Use lavender to have a restful sleep.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Lotus -->
          <div class="fragrance-card hidden" data-category="floral" data-featured="false">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Lotus.jpg" alt="Lotus" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Floral & Romantic</span>
              <h3>Lotus</h3>
              <p class="frag-desc">A wonderfully pleasant and sweet fragrance. Lotus is inspiring and makes you feel happy. Lotus is also much appreciated by children.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Musk -->
          <div class="fragrance-card" data-category="woody" data-featured="true">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Musk.jpg" alt="Musk" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Woody & Earthy</span>
              <h3>Musk</h3>
              <p class="frag-desc">A very fine floral musk with an adventurous note. A happy surprise. This fragrance initiates activity, which can help you study and work. A personal favorite of many people.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Myrrh -->
          <div class="fragrance-card hidden" data-category="woody" data-featured="false">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Myrrh.jpg" alt="Myrrh" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Woody & Earthy</span>
              <h3>Myrrh</h3>
              <p class="frag-desc">A very remarkable scent. Active, happy, and adventurous. A mild, but the unique fragrance that you will never forget.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Orange Blossom -->
          <div class="fragrance-card hidden" data-category="floral" data-featured="false">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Orange-Blossom.jpg" alt="Orange Blossom" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Floral & Romantic</span>
              <h3>Orange Blossom</h3>
              <p class="frag-desc">A special, slightly heavier floral fragrance. It is used in perfume making, has been written about as an aphrodisiac, and is the state flower of Florida.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Oriental Rose -->
          <div class="fragrance-card hidden" data-category="floral" data-featured="false">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Rose.jpg" alt="Oriental Rose" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Floral & Romantic</span>
              <h3>Oriental Rose</h3>
              <p class="frag-desc">A very special rose fragrance with a hint of sandalwood, which inspires creativity. A fragrance for adventurous people.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Passion Flower -->
          <div class="fragrance-card hidden" data-category="floral" data-featured="false">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Passion-Flower.jpg" alt="Passion Flower" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Floral & Romantic</span>
              <h3>Passion Flower</h3>
              <p class="frag-desc">Passion Flower A mild, but remarkable fragrance, which will fascinate you and inspires creativity. Very well suited as a special gift.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Patchouli -->
          <div class="fragrance-card" data-category="woody" data-featured="true">
            <div class="frag-img-wrap">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Patchouli.webp" alt="Patchouli" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Woody & Earthy</span>
              <h3>Patchouli</h3>
              <p class="frag-desc">The strong and unmistakable fragrance of patchouli leaves, softened with a hint of rose and enriched with a variety of herbs.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Rose -->
          <div class="fragrance-card" data-category="floral" data-featured="true">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Rose.jpg" alt="Rose" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Floral & Romantic</span>
              <h3>Rose</h3>
              <p class="frag-desc">The fragrance of red roses with a touch of mint. Delightful, clean, and friendly. Perfect to be used at the end of a long day to aid relaxation.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Roses and Violets -->
          <div class="fragrance-card hidden" data-category="floral" data-featured="false">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Roses-and-Violets.jpg" alt="Roses and Violets" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Floral & Romantic</span>
              <h3>Roses and Violets</h3>
              <p class="frag-desc">A fragrance with a smile, wonderfully sweet with the presence of violets. Our most happy fragrance and the favorite of children.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Sandalwood -->
          <div class="fragrance-card" data-category="woody" data-featured="true">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/sandalwood.jpg" alt="Sandalwood" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Woody & Earthy</span>
              <h3>Sandalwood</h3>
              <p class="frag-desc">The king of fragrances. One hundred percent sandalwood enriched with sandalwood oil. Our most popular fragrance.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Spicewood -->
          <div class="fragrance-card hidden" data-category="woody" data-featured="false">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Spicewood.jpg" alt="Spicewood" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Woody & Earthy</span>
              <h3>Spicewood</h3>
              <p class="frag-desc">Clears the atmosphere and has a disinfecting effect. It also keeps mosquitos and other insects at a distance.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Vanilla -->
          <div class="fragrance-card hidden" data-category="sweet" data-featured="false">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Vanilla.jpg" alt="Vanilla" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Sweet & Spicy</span>
              <h3>Vanilla</h3>
              <p class="frag-desc">The sweetness of vanilla and heliotrope makes this our sweetest fragrance. Complete, full, and happy.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- Fragrance Card: Wild Flower -->
          <div class="fragrance-card hidden" data-category="woody" data-featured="false">
            <div class="frag-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2022/12/Wild-Flowers.jpg" alt="Wild Flower" loading="lazy">
            </div>
            <div class="frag-card-content">
              <span class="frag-cat-label">Woody & Earthy</span>
              <h3>Wild Flower</h3>
              <p class="frag-desc">The woodiest of our floral fragrances. Warm, rich, and relaxing.</p>
              <a href="fragrances.html" class="frag-explore-link">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Bottom Link -->
        <div class="text-center reveal" style="margin-top: var(--space-3xl);">
          <a href="fragrances.html" class="btn btn-outline" style="color: var(--color-bg); border-color: rgba(255, 255, 255, 0.2); background-color: rgba(255, 255, 255, 0.02);">Explore Scent Profiles</a>
        </div>
      </div>
    </section>




    <!-- Featured Ingredients (Raw Materials) -->
    <section class="section">
      <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--space-xl); flex-wrap: wrap; gap: var(--space-md);" class="reveal">
          <div>
            <h2 class="italic text-serif" style="color: var(--color-terracotta); font-size: 1.2rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: var(--space-xs);">Raw Materials</h2>
            <h2 style="font-size: 2.5rem;">Nature's Finest Elements</h2>
          </div>
          <a href="ingredients.html" class="btn btn-outline">Explore Ingredients</a>
        </div>
        <div class="ingredients-grid reveal reveal-delay-1">
          <a href="ingredients.html#sandalwood" class="ingredient-card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ingredients-bg.png" alt="Pure Sandalwood" class="ingredient-img">
            <div class="ingredient-overlay">
              <div class="ingredient-card-header">
                <h3>Pure Sandalwood</h3>
                <div class="decorative-line"></div>
              </div>
              <p class="ingredient-desc">The golden foundation of Indian incense, providing a creamy, woody base.</p>
              <div class="ingredient-action">Explore Scent <i class="fa-solid fa-arrow-right-long"></i></div>
            </div>
          </a>
          <a href="ingredients.html#frankincense" class="ingredient-card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/global-shipping.png" alt="Fossilized Amber" class="ingredient-img">
            <div class="ingredient-overlay">
              <div class="ingredient-card-header">
                <h3>Fossilized Amber</h3>
                <div class="decorative-line"></div>
              </div>
              <p class="ingredient-desc">Warm and deeply sweet resin used in our premium luxury collections.</p>
              <div class="ingredient-action">Explore Scent <i class="fa-solid fa-arrow-right-long"></i></div>
            </div>
          </a>
          <a href="ingredients.html" class="ingredient-card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-banner.png" alt="Himalayan Spices" class="ingredient-img">
            <div class="ingredient-overlay">
              <div class="ingredient-card-header">
                <h3>Himalayan Spices</h3>
                <div class="decorative-line"></div>
              </div>
              <p class="ingredient-desc">Cardamom, clove, and cinnamon that add a vibrant, spicy top note.</p>
              <div class="ingredient-action">Explore Scent <i class="fa-solid fa-arrow-right-long"></i></div>
            </div>
          </a>
        </div>
      </div>
    </section>

    <!-- Video Section (YouTube) -->
    <section class="section video-section" id="videoSection" style="background-color: var(--color-bg-dark); color: var(--color-bg); padding: 0;">
      <div class="video-container reveal" id="videoContainer">
        <!-- Cover overlay shown before play -->
        <div class="video-overlay" id="videoOverlay">
          <div class="video-cover-text">
            <span class="video-eyebrow">Watch</span>
            <h2 style="color: #faf8f5; font-size: 3rem; text-shadow: 2px 2px 12px rgba(0,0,0,0.7); margin-bottom: 1rem; font-family: var(--font-serif);">Experience the Process</h2>
            <p style="color: rgba(250,248,245,0.75); font-size: 1.05rem; max-width: 450px; margin: 0 auto 1.5rem auto; line-height: 1.7;">Watch how our artisans craft every stick with pure botanical ingredients and centuries-old tradition.</p>
          </div>
          <button class="play-btn magnetic" id="playVideoBtn" aria-label="Play video">
            <i class="fa-solid fa-play"></i>
          </button>
        </div>
        <!-- Cover image shown until play -->
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/incense_premium_bundle_1781801699731.png" alt="Experience the incense making process" class="video-cover-img" id="videoCoverImg">
        <!-- YouTube iframe injected on play -->
        <div id="ytPlayerWrap" style="display:none; position:absolute; inset:0; z-index:5;">
          <iframe id="ytPlayer"
            width="100%" height="100%"
            src=""
            frameborder="0"
            allow="autoplay; fullscreen; picture-in-picture"
            allowfullscreen
            style="position:absolute; inset:0; width:100%; height:100%;">
          </iframe>
        </div>
      </div>
    </section>


    <!-- Testimonials -->
    <section class="section testimonials-section">
      <!-- Ambient Orbs -->
      <div class="t-orb t-orb-1"></div>
      <div class="t-orb t-orb-2"></div>
      
      <div class="container" style="position: relative; z-index: 2;">
        <div style="text-align: center; max-width: var(--max-width-narrow); margin: 0 auto var(--space-xl) auto;" class="reveal">
          <h2 class="italic text-serif" style="color: var(--color-terracotta); font-size: 1.2rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: var(--space-xs);">Loved by Many</h2>
          <h2 style="font-size: 2.5rem; color: var(--color-primary);">What Our Customers Say</h2>
        </div>
        
        <div class="testimonial-grid">
          <!-- Card 1 -->
          <div class="testimonial-card reveal">
            <div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
            <p class="testimonial-text">"The Mother's Fragrances provides the highest quality natural incense I've ever burned. The aromas are distinctly premium and transform my home."</p>
            <div class="testimonial-author-info">
              <div class="testimonial-avatar">SJ</div>
              <div class="testimonial-meta">
                <span class="testimonial-author">Sarah Jenkins</span>
                <span class="testimonial-company">Verified Buyer</span>
              </div>
            </div>
          </div>
          
          <!-- Card 2 -->
          <div class="testimonial-card reveal reveal-delay-1">
            <div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
            <p class="testimonial-text">"Finding true hand-rolled, chemical-free incense is difficult. The Mother's Fragrances is now my go-to for essential oils and meditation cones."</p>
            <div class="testimonial-author-info">
              <div class="testimonial-avatar">DA</div>
              <div class="testimonial-meta">
                <span class="testimonial-author">David Alistair</span>
                <span class="testimonial-company">Verified Buyer</span>
              </div>
            </div>
          </div>
          
          <!-- Card 3 -->
          <div class="testimonial-card reveal reveal-delay-2">
            <div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
            <p class="testimonial-text">"The tapestries are beautifully detailed and the fragrances are incredible. Highly recommend the sandalwood line!"</p>
            <div class="testimonial-author-info">
              <div class="testimonial-avatar">ET</div>
              <div class="testimonial-meta">
                <span class="testimonial-author">Emma Torres</span>
                <span class="testimonial-company">Verified Buyer</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Shop CTA -->
    <section class="section">
      <div class="container">
        <div class="wholesale-cta reveal">
          <!-- Background slider -->
          <div class="cta-bg-slider" id="ctaSliderBg">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/b2b_wholesale_cta.png" alt="Incense bundles" class="cta-bg-slide active">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/incense_premium_bundle_1781801699731.png" alt="Premium incense bundle" class="cta-bg-slide">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mandala_wall_tapestry_1781801736289.png" alt="Mandala wall tapestry" class="cta-bg-slide">
          </div>
          <!-- Background overlay -->
          <div class="cta-overlay"></div>
          
          <!-- Glowing orbs -->
          <div class="cta-orb cta-orb-1"></div>
          <div class="cta-orb cta-orb-2"></div>

          <div class="cta-content">
            <h2 class="text-reveal-line">Ready to Transform Your Space?</h2>
            <p>Explore our complete catalog of natural incense, cones, and oils today.</p>
            <a href="products.html" class="btn btn-terracotta magnetic" style="padding: 1rem 2rem; font-size: 1.1rem; border-radius: 50px;">Shop Now</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Counters Section -->
    <section class="section counters-section">
      <div class="container">
        <div class="grid-4">
          <div class="counter-item reveal">
            <div class="counter-num"><span class="count-up" data-target="40">0</span>+</div>
            <div class="counter-title">Years of Craft Heritage</div>
          </div>
          <div class="counter-item reveal reveal-delay-1">
            <div class="counter-num"><span class="count-up" data-target="100">0</span>%</div>
            <div class="counter-title">Pure Natural Ingredients</div>
          </div>
          <div class="counter-item reveal reveal-delay-2">
            <div class="counter-num"><span class="count-up" data-target="30">0</span>+</div>
            <div class="counter-title">Global Export Ports</div>
          </div>
          <div class="counter-item reveal reveal-delay-3">
            <div class="counter-num"><span class="count-up" data-target="200">0</span>+</div>
            <div class="counter-title">Artisan Women Supported</div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->

<?php get_footer(); ?>