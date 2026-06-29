<?php
/*
Template Name: Fragrances Page
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
    <section class="hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/lavender_incense.webp'); height: 60vh; position: relative; display: flex; align-items: center; justify-content: center; text-align: center; background-size: cover; background-position: center; background-attachment: fixed;">
      <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.5);"></div>
      <div class="container" style="position: relative; z-index: 2;">
        <h1 class="reveal" style="color: #ffffff; font-size: 4rem; margin-bottom: 1rem; text-shadow: 0 4px 12px rgba(0,0,0,0.5); font-family: var(--font-serif);">Discover Our Fragrances</h1>
        <p class="reveal reveal-delay-1" style="color: #f0f0f0; max-width: 600px; margin: 0 auto; font-size: 1.25rem; text-shadow: 0 2px 6px rgba(0,0,0,0.5);">Immerse yourself in nature’s pure essence, captured perfectly in every stick.</p>
      </div>
    </section>
    
    <section class="section">
      <div class="container">
        <div class="text-center" style="max-width: 700px; margin: 0 auto 4rem auto;">
          <h2 style="color: var(--color-primary); margin-bottom: 1rem;">Nature's Palette</h2>
          <p>We blend the finest natural resins, floral extracts, and pure essential oils to craft scents that elevate your mood and space. Browse our most beloved fragrance profiles below.</p>
        </div>

        <div style="display: flex; flex-direction: column; gap: var(--space-3xl);">
          
          <!-- Fragrance 1 -->
          <div class="split-section" style="align-items: center;">
            <div class="split-image-wrapper reveal" style="height: 400px;">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/incense_cones_aesthetic_1781801710438.png" alt="Sandalwood" class="split-image">
            </div>
            <div class="split-content reveal reveal-delay-1">
              <span class="product-tag">Woody & Grounding</span>
              <h2 style="color: var(--color-primary); margin: 0.5rem 0 1.5rem 0;">Mysore Sandalwood</h2>
              <p style="font-size: 1.1rem; line-height: 1.8; color: var(--color-text);">
                A deep, rich, and creamy aroma that instantly grounds the spirit. Our Sandalwood is sourced ethically and blended with traditional resins to create a scent that lingers long after the incense has finished burning.
              </p>
              <ul style="margin-top: 1.5rem; list-style-type: none; padding: 0;">
                <li style="margin-bottom: 0.5rem;"><i class="fa-solid fa-check" style="color: var(--color-gold); margin-right: 10px;"></i> Ideal for meditation and yoga</li>
                <li style="margin-bottom: 0.5rem;"><i class="fa-solid fa-check" style="color: var(--color-gold); margin-right: 10px;"></i> Promotes relaxation and mental clarity</li>
              </ul>
            </div>
          </div>

          <!-- Fragrance 2 -->
          <div class="split-section" style="align-items: center; direction: rtl;">
            <div class="split-image-wrapper reveal" style="height: 400px; direction: ltr;">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Patchouli.webp" alt="Patchouli" class="split-image">
            </div>
            <div class="split-content reveal reveal-delay-1" style="direction: ltr;">
              <span class="product-tag">Earthy & Exotic</span>
              <h2 style="color: var(--color-primary); margin: 0.5rem 0 1.5rem 0;">Pure Patchouli</h2>
              <p style="font-size: 1.1rem; line-height: 1.8; color: var(--color-text);">
                Sweet, earthy, and highly aromatic. Patchouli has been a staple in Indian perfumery for centuries. Our blend captures the raw, herbaceous quality of the leaves, offering a scent that is both calming and uplifting.
              </p>
              <ul style="margin-top: 1.5rem; list-style-type: none; padding: 0;">
                <li style="margin-bottom: 0.5rem;"><i class="fa-solid fa-check" style="color: var(--color-gold); margin-right: 10px;"></i> Acts as a natural mood elevator</li>
                <li style="margin-bottom: 0.5rem;"><i class="fa-solid fa-check" style="color: var(--color-gold); margin-right: 10px;"></i> Distinctively sweet, musky undertones</li>
              </ul>
            </div>
          </div>

          <!-- Fragrance 3 -->
          <div class="split-section" style="align-items: center;">
            <div class="split-image-wrapper reveal" style="height: 400px;">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero_incense_mood_1781801686159.png" alt="Jasmine" class="split-image">
            </div>
            <div class="split-content reveal reveal-delay-1">
              <span class="product-tag">Floral & Sweet</span>
              <h2 style="color: var(--color-primary); margin: 0.5rem 0 1.5rem 0;">Night-Blooming Jasmine</h2>
              <p style="font-size: 1.1rem; line-height: 1.8; color: var(--color-text);">
                Known as the "Queen of the Night", our Jasmine fragrance is incredibly potent, floral, and romantic. We use real floral extracts to mimic the exact scent of a blooming jasmine vine at dusk.
              </p>
              <ul style="margin-top: 1.5rem; list-style-type: none; padding: 0;">
                <li style="margin-bottom: 0.5rem;"><i class="fa-solid fa-check" style="color: var(--color-gold); margin-right: 10px;"></i> Sweet, intensely floral aroma</li>
                <li style="margin-bottom: 0.5rem;"><i class="fa-solid fa-check" style="color: var(--color-gold); margin-right: 10px;"></i> Elicits feelings of joy and romance</li>
              </ul>
            </div>
          </div>

        </div>

        <div class="text-center" style="margin-top: 4rem;">
          <a href="products.html" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1.1rem;">Shop All Fragrances</a>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>