<?php
/*
Template Name: Tapestry Page
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

    <section class="page-hero" style="background: linear-gradient(rgba(30, 58, 43, 0.8), rgba(30, 58, 43, 0.8)), url('./assets/images/mandala_wall_tapestry_1781801736289.png') no-repeat center/cover; color: var(--color-bg);">
      <div class="container flex-center" style="flex-direction: column; text-align: center;">
        <h1 class="text-reveal-line" style="color: var(--color-gold);">Woven Art & Tapestry</h1>
        <p class="reveal reveal-delay-1" style="max-width: 600px; margin: 0 auto; color: var(--color-bg);">Beautiful, intricate designs to transform your living spaces.</p>
      </div>
    </section>
    
    <section class="section" style="background-color: var(--color-surface);">
      <div class="container">
        
        <div class="text-center" style="max-width: 700px; margin: 0 auto 3rem auto;">
          <h2 style="color: var(--color-primary); margin-bottom: 1rem;">Quality & Craftsmanship</h2>
          <p>Our tapestries are made from 100% premium cotton, featuring vibrant, colorfast prints. Perfect as wall hangings, bed covers, or meditation mats.</p>
        </div>

        <div class="grid" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: var(--space-xl);">
          
          <!-- Product 1 -->
          <div class="product-teaser-card reveal">
            <div class="product-teaser-img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mandala_wall_tapestry_1781801736289.png" alt="Golden Mandala Tapestry" class="product-teaser-img">
            </div>
            <div class="product-teaser-content">
              <span class="product-tag">Wall Hanging</span>
              <h3 style="font-size: 1.5rem;">Golden Mandala</h3>
              <p style="font-size: 0.95rem;">A classic, intricate mandala pattern featuring warm terracotta and gold tones.</p>
              <div class="product-teaser-actions">
                <span style="font-weight: bold; color: var(--color-terracotta);">Size: Large</span>
                <a href="contact.html" class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Enquire</a>
              </div>
            </div>
          </div>

          <!-- Product 2 -->
          <div class="product-teaser-card reveal reveal-delay-1">
            <div class="product-teaser-img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mandala_wall_tapestry_1781801736289.png" alt="Ocean Vibes Tapestry" class="product-teaser-img" style="filter: hue-rotate(200deg);">
            </div>
            <div class="product-teaser-content">
              <span class="product-tag">Bed Cover</span>
              <h3 style="font-size: 1.5rem;">Ocean Blues</h3>
              <p style="font-size: 0.95rem;">A calming, symmetric design in deep indigo and azure blue.</p>
              <div class="product-teaser-actions">
                <span style="font-weight: bold; color: var(--color-terracotta);">Size: Extra Large</span>
                <a href="contact.html" class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Enquire</a>
              </div>
            </div>
          </div>

          <!-- Product 3 -->
          <div class="product-teaser-card reveal reveal-delay-2">
            <div class="product-teaser-img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mandala_wall_tapestry_1781801736289.png" alt="Emerald Forest Tapestry" class="product-teaser-img" style="filter: hue-rotate(100deg);">
            </div>
            <div class="product-teaser-content">
              <span class="product-tag">Meditation Mat</span>
              <h3 style="font-size: 1.5rem;">Emerald Forest</h3>
              <p style="font-size: 0.95rem;">Rich greens and earthy browns woven into a complex, grounding geometric pattern.</p>
              <div class="product-teaser-actions">
                <span style="font-weight: bold; color: var(--color-terracotta);">Size: Medium</span>
                <a href="contact.html" class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Enquire</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>