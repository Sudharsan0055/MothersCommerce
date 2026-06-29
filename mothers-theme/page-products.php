<?php
/*
Template Name: Products Page
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
    <section class="hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/incense_premium_bundle_1781801699731.png'); height: 60vh; position: relative; display: flex; align-items: center; justify-content: center; text-align: center; background-size: cover; background-position: center; background-attachment: fixed;">
      <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.5);"></div>
      <div class="container" style="position: relative; z-index: 2;">
        <h1 class="reveal" style="color: #ffffff; font-size: 4rem; margin-bottom: 1rem; text-shadow: 0 4px 12px rgba(0,0,0,0.5); font-family: var(--font-serif);">Our Collections</h1>
        <p class="reveal reveal-delay-1" style="color: #f0f0f0; max-width: 600px; margin: 0 auto; font-size: 1.25rem; text-shadow: 0 2px 6px rgba(0,0,0,0.5);">Browse our exclusive catalog of pure botanical incense, cones, and lifestyle products.</p>
      </div>
    </section>
    
    <section class="section" style="background-color: var(--color-bg);">
      <div class="container">
        
        <!-- Informational Notice Banner -->
        <div class="catalog-notice reveal">
          <i class="fa-solid fa-circle-info"></i>
          <div>
            <strong>Please Note:</strong> We do not sell our products directly online. This website serves as a showcase catalog of our natural collections. For retail orders, sample palettes, custom incense blending, or wholesale inquiries, please click the "Contact Us" links or get in touch through our contact form.
          </div>
        </div>

        <div class="product-grid-container">
          
          <!-- Card 1: Incense Sticks -->
          <div class="product-display-card reveal">
            <div class="product-display-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2023/01/Incense-Sticks-1.jpg" alt="Incense Sticks" loading="lazy">
            </div>
            <div class="product-display-content">
              <span class="product-tag">Signature Masala</span>
              <h3>Incense Sticks</h3>
              <p>Our premium incense sticks are handcrafted and hand-rolled according to the traditional age-old masala method, combining pure essential oils, honey, resins, and botanical dust for a clean and slow burn.</p>
              <div class="product-display-actions">
                <a href="incense.html" class="btn btn-primary" style="width: 100%;">Explore Incense Collection <i class="fa-solid fa-arrow-right" style="margin-left: 10px;"></i></a>
              </div>
            </div>
          </div>

          <!-- Card 2: Tapestry -->
          <div class="product-display-card reveal reveal-delay-1">
            <div class="product-display-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2023/01/Tapestry-1.jpg" alt="Woven Tapestry" loading="lazy">
            </div>
            <div class="product-display-content">
              <span class="product-tag">Artisanal Decor</span>
              <h3>Artisanal Tapestry</h3>
              <p>Beautiful, intricately designed wall tapestries featuring traditional mandala patterns and classic visual templates to create a peaceful, meditative atmosphere in your home.</p>
              <div class="product-display-actions">
                <a href="tapestry.html" class="btn btn-primary" style="width: 100%;">Explore Tapestries <i class="fa-solid fa-arrow-right" style="margin-left: 10px;"></i></a>
              </div>
            </div>
          </div>

          <!-- Card 3: Cones -->
          <div class="product-display-card reveal reveal-delay-2">
            <div class="product-display-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2023/01/Cones-1.jpg" alt="Incense Cones" loading="lazy">
            </div>
            <div class="product-display-content">
              <span class="product-tag">Concentrated Scent</span>
              <h3>Incense Cones</h3>
              <p>Potent and compact, our natural incense cones are hand-molded from the finest botanical ingredients and resins, delivering a rich burst of botanical aroma ideal for smaller spaces.</p>
              <div class="product-display-actions">
                <a href="cones.html" class="btn btn-primary" style="width: 100%;">Explore Cones <i class="fa-solid fa-arrow-right" style="margin-left: 10px;"></i></a>
              </div>
            </div>
          </div>

          <!-- Card 4: Perfume Oils -->
          <div class="product-display-card reveal">
            <div class="product-display-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2023/01/perfume-oil-1.jpg" alt="Perfume Oils" loading="lazy">
            </div>
            <div class="product-display-content">
              <span class="product-tag">Personal Fragrance</span>
              <h3>Perfume Oils</h3>
              <p>Premium floral and wood-based perfume oil concentrates. Sourced from the finest flowers and botanical extracts to express rich, complex, and long-lasting personal aromas.</p>
              <div class="product-display-actions">
                <a href="essential-oil.html" class="btn btn-primary" style="width: 100%;">Explore Perfume Oils <i class="fa-solid fa-arrow-right" style="margin-left: 10px;"></i></a>
              </div>
            </div>
          </div>

          <!-- Card 5: Essential Oils -->
          <div class="product-display-card reveal reveal-delay-1">
            <div class="product-display-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2023/01/essential-oil-1.jpg" alt="Essential Oils" loading="lazy">
            </div>
            <div class="product-display-content">
              <span class="product-tag">Botanical Extracts</span>
              <h3>Essential Oils</h3>
              <p>100% natural, highly concentrated botanical essential oils. Ideal for diffusers, vaporizers, home aromatherapy, and promoting a holistic lifestyle of wellness.</p>
              <div class="product-display-actions">
                <a href="essential-oil.html" class="btn btn-primary" style="width: 100%;">Explore Essential Oils <i class="fa-solid fa-arrow-right" style="margin-left: 10px;"></i></a>
              </div>
            </div>
          </div>

          <!-- Card 6: Other Products -->
          <div class="product-display-card reveal reveal-delay-2">
            <div class="product-display-img-wrap">
              <img src="https://mothersfragrances.com/wp-content/uploads/2023/01/Other-Products-1.jpg" alt="Other Products" loading="lazy">
            </div>
            <div class="product-display-content">
              <span class="product-tag">Discovery Sets</span>
              <h3>Other Products</h3>
              <p>Discover our specialty selections including Incense Mini Samplers, full Discovery Sets, and curated Gift Palettes to experience a wide variety of our traditional aromas.</p>
              <div class="product-display-actions">
                <a href="contact.html" class="btn btn-primary" style="width: 100%;">Enquire For Details <i class="fa-solid fa-arrow-right" style="margin-left: 10px;"></i></a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Wholesale CTA Section -->
    <section class="section" style="padding-top: 0;">
      <div class="container">
        <div class="wholesale-cta-animated reveal">
          <div class="cta-mesh-bg"></div>
          <div class="cta-aurora-orb cta-orb-1"></div>
          <div class="cta-aurora-orb cta-orb-2"></div>
          <div class="cta-particles-container">
            <div class="cta-particle"></div>
            <div class="cta-particle"></div>
            <div class="cta-particle"></div>
            <div class="cta-particle"></div>
            <div class="cta-particle"></div>
            <div class="cta-particle"></div>
            <div class="cta-particle"></div>
            <div class="cta-particle"></div>
            <div class="cta-particle"></div>
            <div class="cta-particle"></div>
          </div>
          <div class="cta-glass-card">
            <h2>Partner <span>With Us</span></h2>
            <p>We supply premium, fair-trade incense, cones, and essential oils to boutiques and retailers worldwide. Interested in bulk wholesale orders?</p>
            <a href="contact.html" class="btn-cta-gold magnetic">Enquire Wholesale Pricing</a>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>