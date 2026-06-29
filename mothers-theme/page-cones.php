<?php
/*
Template Name: Cones Page
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

    <section class="page-hero" style="background: linear-gradient(rgba(30, 58, 43, 0.8), rgba(30, 58, 43, 0.8)), url('./assets/images/incense_cones_aesthetic_1781801710438.png') no-repeat center/cover; color: var(--color-bg);">
      <div class="container flex-center" style="flex-direction: column; text-align: center;">
        <h1 class="text-reveal-line" style="color: var(--color-gold);">Botanical Cones</h1>
        <p class="reveal reveal-delay-1" style="max-width: 600px; margin: 0 auto; color: var(--color-bg);">Intense, pure aromas for quick space purification and meditation.</p>
      </div>
    </section>
    
    <section class="section" style="background-color: var(--color-surface);">
      <div class="container">
        <div class="grid" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: var(--space-xl);">
          
          <!-- Product 1 -->
          <div class="product-teaser-card reveal">
            <div class="product-teaser-img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/incense_cones_aesthetic_1781801710438.png" alt="Lavender Cones" class="product-teaser-img">
            </div>
            <div class="product-teaser-content">
              <span class="product-tag">Calming</span>
              <h3 style="font-size: 1.5rem;">French Lavender</h3>
              <p style="font-size: 0.95rem;">Pure lavender extracts concentrated into a small cone for an immediate burst of relaxation.</p>
              <div class="product-teaser-actions">
                <span style="font-weight: bold; color: var(--color-terracotta);">Pack of 20</span>
                <a href="contact.html" class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Enquire</a>
              </div>
            </div>
          </div>

          <!-- Product 2 -->
          <div class="product-teaser-card reveal reveal-delay-1">
            <div class="product-teaser-img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/incense_cones_aesthetic_1781801710438.png" alt="Rose Cones" class="product-teaser-img" style="filter: hue-rotate(320deg);">
            </div>
            <div class="product-teaser-content">
              <span class="product-tag">Romantic</span>
              <h3 style="font-size: 1.5rem;">Damask Rose</h3>
              <p style="font-size: 0.95rem;">The sweet, romantic scent of fresh roses. Perfect for creating a welcoming home environment.</p>
              <div class="product-teaser-actions">
                <span style="font-weight: bold; color: var(--color-terracotta);">Pack of 20</span>
                <a href="contact.html" class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Enquire</a>
              </div>
            </div>
          </div>

          <!-- Product 3 -->
          <div class="product-teaser-card reveal reveal-delay-2">
            <div class="product-teaser-img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/incense_cones_aesthetic_1781801710438.png" alt="Frankincense Cones" class="product-teaser-img" style="filter: hue-rotate(40deg);">
            </div>
            <div class="product-teaser-content">
              <span class="product-tag">Spiritual</span>
              <h3 style="font-size: 1.5rem;">Sacred Frankincense</h3>
              <p style="font-size: 0.95rem;">An ancient, purifying resin that clears negative energy and deepens meditation.</p>
              <div class="product-teaser-actions">
                <span style="font-weight: bold; color: var(--color-terracotta);">Pack of 20</span>
                <a href="contact.html" class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Enquire</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>