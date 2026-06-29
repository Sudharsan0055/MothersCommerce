<?php
/*
Template Name: About Us Page
*/
get_header();
?>

<main>

    <?php
    // Required for Elementor and standard WordPress content
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    endif;
    ?>

    <!-- Hero Section (Parallax) -->
    <section class="hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/handmade_incense.webp'); height: 60vh; position: relative; display: flex; align-items: center; justify-content: center; text-align: center; background-size: cover; background-position: center; background-attachment: fixed;">
      <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.5);"></div>
      <div class="container" style="position: relative; z-index: 2;">
        <h1 class="reveal" style="color: #ffffff; font-size: 4rem; margin-bottom: 1rem; text-shadow: 0 4px 12px rgba(0,0,0,0.5); font-family: var(--font-serif);">Our Story</h1>
        <p class="reveal reveal-delay-1" style="color: #f0f0f0; max-width: 600px; margin: 0 auto; font-size: 1.25rem; text-shadow: 0 2px 6px rgba(0,0,0,0.5);">A timeless journey of purity, tradition, and global reach starting from Pondicherry.</p>
      </div>
    </section>
    
    <section class="section">
      <div class="container split-section">
        <div class="split-content reveal">
          <h2 style="color: var(--color-primary); font-size: 2.5rem; margin-bottom: 1.5rem;">A Commitment to Purity & People</h2>
          <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 1.5rem; color: var(--color-text);">
            Founded with a vision to create 100% natural, chemical-free incense, The Mother's Fragrances is rooted in the rich spiritual heritage of India. Every incense stick and cone we offer is a testament to the ancient art of hand-rolling (Agarbatti).
          </p>
          <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 2rem; color: var(--color-text);">
            We strictly avoid dipping our incense in synthetic solvents. Instead, we use a traditional blend of pure essential oils, floral dust, resins, and wood powders. Our commitment extends beyond purity—we are deeply dedicated to fair trade principles and women’s empowerment, providing ethical employment to hundreds of women in our community.
          </p>
          <div style="display: flex; gap: 2rem; margin-top: 2rem;">
            <div>
              <h4 style="color: var(--color-gold); font-size: 2rem; margin-bottom: 0.5rem;">40+</h4>
              <p style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 600;">Years of Legacy</p>
            </div>
            <div>
              <h4 style="color: var(--color-gold); font-size: 2rem; margin-bottom: 0.5rem;">100%</h4>
              <p style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 600;">Natural Ingredients</p>
            </div>
          </div>
        </div>
        <div class="split-image-wrapper reveal reveal-delay-1">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/process_kneading.png" alt="Hand rolling incense" class="split-image" style="object-position: center;">
        </div>
      </div>
    </section>

    <section class="section" style="background-color: rgba(250, 248, 245, 0.5);">
      <div class="container">
        <div class="text-center" style="max-width: 700px; margin: 0 auto 4rem auto;">
          <h2 style="color: var(--color-primary); margin-bottom: 1rem;">Our Core Values</h2>
          <p>Everything we do is guided by our respect for nature and our dedication to the communities that craft our products.</p>
        </div>
        
        <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
          <div class="pillar-card reveal">
            <i class="fa-solid fa-leaf pillar-icon"></i>
            <h3>Chemical-Free</h3>
            <p>We refuse to use synthetic fragrances or chemical dips. Our scents are derived entirely from nature's essential oils and botanical extracts.</p>
          </div>
          <div class="pillar-card reveal reveal-delay-1">
            <i class="fa-solid fa-hand-holding-heart pillar-icon"></i>
            <h3>Fair Trade</h3>
            <p>We believe in ethical commerce. Fair wages, safe working conditions, and community development are at the heart of our operations.</p>
          </div>
          <div class="pillar-card reveal reveal-delay-2">
            <i class="fa-solid fa-seedling pillar-icon"></i>
            <h3>Sustainable</h3>
            <p>Our packaging is eco-friendly, and we continuously strive to minimize our environmental footprint while celebrating Earth's raw materials.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="text-center" style="max-width: 700px; margin: 0 auto 4rem auto;">
          <h2 style="color: var(--color-primary); margin-bottom: 1rem;">The Art of Crafting</h2>
          <p>Each incense stick goes through a meticulous journey before it reaches your home.</p>
        </div>
        
        <div class="process-grid reveal">
          <div class="process-step">
            <div class="process-img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/process_sourcing.png" alt="Sourcing Ingredients">
            </div>
            <h4>1. Sourcing</h4>
            <p style="font-size: 0.9rem;">Gathering pure resins, flowers, and woods.</p>
          </div>
          <div class="process-step">
            <div class="process-img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/process_kneading.png" alt="Kneading Dough">
            </div>
            <h4>2. Kneading</h4>
            <p style="font-size: 0.9rem;">Blending the raw materials into a fragrant dough.</p>
          </div>
          <div class="process-step">
            <div class="process-img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/process_rolling.png" alt="Hand Rolling">
            </div>
            <h4>3. Rolling</h4>
            <p style="font-size: 0.9rem;">Expertly hand-rolling onto bamboo sticks.</p>
          </div>
          <div class="process-step">
            <div class="process-img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero_incense_mood_1781801686159.png" alt="Curing and Packaging">
            </div>
            <h4>4. Curing</h4>
            <p style="font-size: 0.9rem;">Sun-drying to lock in the pure, lasting aromas.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>