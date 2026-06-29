<?php
/*
Template Name: Essential Oil Page
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

    <section class="page-hero" style="background: linear-gradient(rgba(30, 58, 43, 0.8), rgba(30, 58, 43, 0.8)), url('<?php echo get_template_directory_uri(); ?>/assets/images/essential_oils_bottles_1781801723388.png') no-repeat center/cover; color: var(--color-bg);">
      <div class="container flex-center" style="flex-direction: column; text-align: center;">
        <h1 class="text-reveal-line" style="color: var(--color-gold);">Essential & Perfume Oils</h1>
        <p class="reveal reveal-delay-1" style="max-width: 600px; margin: 0 auto; color: var(--color-bg);">Highly concentrated botanical extracts for personal fragrance and home diffusers.</p>
      </div>
    </section>
    
    <section class="section" style="background-color: var(--color-surface);">
      <div class="container">
        
        <div class="text-center" style="max-width: 700px; margin: 0 auto 3rem auto;">
          <h2 style="color: var(--color-primary); margin-bottom: 1rem;">How to Use</h2>
          <p>Our oils are highly concentrated. Use 2-3 drops in an oil warmer or ultrasonic diffuser. For personal use as a perfume, apply sparingly to pulse points. Please patch-test before applying directly to skin.</p>
        </div>

        <div class="grid" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: var(--space-xl);">
          
          <!-- Product 1 -->
          <div class="product-teaser-card reveal">
            <div class="product-teaser-img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/essential_oils_bottles_1781801723388.png" alt="Sandalwood Oil" class="product-teaser-img">
            </div>
            <div class="product-teaser-content">
              <span class="product-tag">Perfume Oil</span>
              <h3 style="font-size: 1.5rem;">Sandalwood Extract</h3>
              <p style="font-size: 0.95rem;">A thick, rich, and creamy oil. Excellent as a base note or a standalone personal fragrance.</p>
              <div class="product-teaser-actions">
                <span style="font-weight: bold; color: var(--color-terracotta);">10ml Glass Bottle</span>
                <a href="contact.html" class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Enquire</a>
              </div>
            </div>
          </div>

          <!-- Product 2 -->
          <div class="product-teaser-card reveal reveal-delay-1">
            <div class="product-teaser-img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/essential_oils_bottles_1781801723388.png" alt="Jasmine Oil" class="product-teaser-img" style="filter: hue-rotate(60deg);">
            </div>
            <div class="product-teaser-content">
              <span class="product-tag">Perfume Oil</span>
              <h3 style="font-size: 1.5rem;">Jasmine Absolute</h3>
              <p style="font-size: 0.95rem;">A powerful floral extract that captures the sweet, intoxicating scent of night-blooming jasmine.</p>
              <div class="product-teaser-actions">
                <span style="font-weight: bold; color: var(--color-terracotta);">10ml Glass Bottle</span>
                <a href="contact.html" class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Enquire</a>
              </div>
            </div>
          </div>

          <!-- Product 3 -->
          <div class="product-teaser-card reveal reveal-delay-2">
            <div class="product-teaser-img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/essential_oils_bottles_1781801723388.png" alt="Patchouli Oil" class="product-teaser-img" style="filter: hue-rotate(120deg);">
            </div>
            <div class="product-teaser-content">
              <span class="product-tag">Essential Oil</span>
              <h3 style="font-size: 1.5rem;">Aged Patchouli</h3>
              <p style="font-size: 0.95rem;">A dark, earthy essential oil that has been aged to remove sharpness, leaving a sweet musky aroma.</p>
              <div class="product-teaser-actions">
                <span style="font-weight: bold; color: var(--color-terracotta);">10ml Glass Bottle</span>
                <a href="contact.html" class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Enquire</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>
