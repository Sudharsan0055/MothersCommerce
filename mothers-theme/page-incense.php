<?php
/*
Template Name: Incense Page
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

    <section class="page-hero" style="background: linear-gradient(rgba(30, 58, 43, 0.8), rgba(30, 58, 43, 0.8)), url('./assets/images/incense_premium_bundle_1781801699731.png') no-repeat center/cover; color: var(--color-bg);">
      <div class="container flex-center" style="flex-direction: column; text-align: center;">
        <h1 class="text-reveal-line" style="color: var(--color-gold);">Premium Incense</h1>
        <p class="reveal reveal-delay-1" style="max-width: 600px; margin: 0 auto; color: var(--color-bg);">Hand-rolled agarbatti made from nature's purest ingredients.</p>
      </div>
    </section>
    
    <section class="section" style="background-color: var(--color-surface);">
      <div class="container">
        <div class="grid" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: var(--space-xl);">
          
          <!-- Product 1 -->
          <div class="product-teaser-card reveal">
            <div class="product-teaser-img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero_incense_mood_1781801686159.png" alt="Golden Champa" class="product-teaser-img">
            </div>
            <div class="product-teaser-content">
              <span class="product-tag">Floral</span>
              <h3 style="font-size: 1.5rem;">Golden Champa</h3>
              <p style="font-size: 0.95rem;">A sweet, intoxicating blend of the golden Champa flower, balanced with rich resins.</p>
              <div class="product-teaser-actions">
                <span style="font-weight: bold; color: var(--color-terracotta);">Available in 12s, 24s</span>
                <a href="contact.html" class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Enquire</a>
              </div>
            </div>
          </div>

          <!-- Product 2 -->
          <div class="product-teaser-card reveal reveal-delay-1">
            <div class="product-teaser-img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/incense_premium_bundle_1781801699731.png" alt="Mysore Sandalwood" class="product-teaser-img">
            </div>
            <div class="product-teaser-content">
              <span class="product-tag">Woody</span>
              <h3 style="font-size: 1.5rem;">Mysore Sandalwood</h3>
              <p style="font-size: 0.95rem;">The classic, grounding scent of pure Indian sandalwood. Slow-burning and meditative.</p>
              <div class="product-teaser-actions">
                <span style="font-weight: bold; color: var(--color-terracotta);">Available in 12s, 24s</span>
                <a href="contact.html" class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Enquire</a>
              </div>
            </div>
          </div>

          <!-- Product 3 -->
          <div class="product-teaser-card reveal reveal-delay-2">
            <div class="product-teaser-img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/process_kneading.png" alt="Oudh / Agarwood" class="product-teaser-img">
            </div>
            <div class="product-teaser-content">
              <span class="product-tag">Exotic</span>
              <h3 style="font-size: 1.5rem;">Royal Oudh</h3>
              <p style="font-size: 0.95rem;">A deep, complex aroma of aged Agarwood, perfect for creating an atmosphere of luxury.</p>
              <div class="product-teaser-actions">
                <span style="font-weight: bold; color: var(--color-terracotta);">Available in 12s, 24s</span>
                <a href="contact.html" class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Enquire</a>
              </div>
            </div>
          </div>

          <!-- Product 4 -->
          <div class="product-teaser-card reveal">
            <div class="product-teaser-img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Patchouli.webp" alt="Pure Patchouli" class="product-teaser-img">
            </div>
            <div class="product-teaser-content">
              <span class="product-tag">Earthy</span>
              <h3 style="font-size: 1.5rem;">Pure Patchouli</h3>
              <p style="font-size: 0.95rem;">Rich, earthy, and distinctly sweet. A favorite for relaxation and natural air purification.</p>
              <div class="product-teaser-actions">
                <span style="font-weight: bold; color: var(--color-terracotta);">Available in 12s, 24s</span>
                <a href="contact.html" class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Enquire</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>