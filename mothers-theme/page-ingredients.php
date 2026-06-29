<?php
/*
Template Name: Ingredients Page
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

    <!-- Page Hero -->
    <section class="page-hero" style="background-image: linear-gradient(rgba(30, 58, 43, 0.8), rgba(30, 58, 43, 0.8)), url('./assets/images/ingredients-bg.png'); background-size: cover; background-position: center;">
      <div class="container">
        <h1 class="reveal">Botanical Library & Purity</h1>
        <p class="reveal reveal-delay-1">Deep dive into the pure woods, resins, and blossoms that make our products. 100% natural, certified clean.</p>
      </div>
    </section>

    <!-- Purity Pledge Grid -->
    <section class="section">
      <div class="container">
        <div style="text-align: center; max-width: var(--max-width-narrow); margin: 0 auto var(--space-3xl) auto;" class="reveal">
          <h2 class="italic text-serif" style="color: var(--color-terracotta); font-size: 1.25rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: var(--space-xs);">Our Pledge</h2>
          <h2 style="font-size: 2.5rem;">Pure Ingredients, Pure Practice</h2>
          <p style="margin-top: var(--space-xs);">Every package stamped with the Mothers Commerce seal contains only botanical elements. We respect the respiratory health of our clients.</p>
        </div>

        <div class="pledge-grid">
          <!-- Pledge 1 -->
          <div class="pledge-card reveal">
            <div class="pledge-icon"><i class="fas fa-ban"></i></div>
            <h3>0% Charcoal Paste</h3>
            <p>Commercial incense uses petroleum charcoal dust as an easy burn core. We burn only pure sawdust and resin pulp.</p>
          </div>
          <!-- Pledge 2 -->
          <div class="pledge-card reveal reveal-delay-1">
            <div class="pledge-icon"><i class="fas fa-tint-slash"></i></div>
            <h3>0% Chemical Binders</h3>
            <p>We reject synthetic glues (DEP/phthalates) that off-gas toxins. We bind our masala dough with wild honey and tree gums.</p>
          </div>
          <!-- Pledge 3 -->
          <div class="pledge-card reveal reveal-delay-2">
            <div class="pledge-icon"><i class="fas fa-tree"></i></div>
            <h3>Sustainable Sandalwood</h3>
            <p>We source only government-supervised Santalum album, funding state replanting projects with every kilogram purchased.</p>
          </div>
          <!-- Pledge 4 -->
          <div class="pledge-card reveal reveal-delay-3">
            <div class="pledge-icon"><i class="fas fa-venus"></i></div>
            <h3>Women Artisans Fair Trade</h3>
            <p>Our incense is rolled exclusively by local women, ensuring safe working conditions, healthcare, and fair living wages.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Ingredients Cabinet Section -->
    <section class="section" style="background-color: rgba(30, 58, 43, 0.01); border-top: 1px solid var(--color-border); border-bottom: 1px solid var(--color-border);">
      <div class="container">
        <div style="text-align: center; max-width: var(--max-width-narrow); margin: 0 auto var(--space-3xl) auto;" class="reveal">
          <h2 class="italic text-serif" style="color: var(--color-terracotta); font-size: 1.25rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: var(--space-xs);">Interactive Library</h2>
          <h2 style="font-size: 2.5rem;">The Botanical Cabinet</h2>
          <p style="margin-top: var(--space-xs);">Click on any botanical element below to explore its origin, harvest methods, and aromatherapy profile.</p>
        </div>

        <div class="cabinet-grid">
          <!-- Sandalwood -->
          <div class="ingredient-card reveal" data-id="sandalwood">
            <div class="ingredient-card-icon"><i class="fas fa-seedling"></i></div>
            <span class="role">Wood Base</span>
            <h3>Mysore Sandalwood</h3>
            <p>Creamy, sweet, and grounding woody core powder. The foundation of masala lines.</p>
          </div>

          <!-- Jasmine -->
          <div class="ingredient-card reveal reveal-delay-1" data-id="jasmine">
            <div class="ingredient-card-icon"><i class="fas fa-spa"></i></div>
            <span class="role">Floral Top Note</span>
            <h3>Mogra Jasmine</h3>
            <p>Uplifting, sweet, and calming fresh flower petals harvested in local farmlands.</p>
          </div>

          <!-- Halmaddi -->
          <div class="ingredient-card reveal reveal-delay-2" data-id="halmaddi">
            <div class="ingredient-card-icon"><i class="fas fa-tint"></i></div>
            <span class="role">Tree Resin Binder</span>
            <h3>Halmaddi Resin</h3>
            <p>Balsamic, soft tree gum used to bind masala incense dough and lock in essential oils.</p>
          </div>

          <!-- Frankincense -->
          <div class="ingredient-card reveal" data-id="frankincense">
            <div class="ingredient-card-icon"><i class="fas fa-fire"></i></div>
            <span class="role">Purifying Resin</span>
            <h3>Sacred Frankincense</h3>
            <p>Crisp, lemony, and purifying amber gum tears tapped from Boswellia forests.</p>
          </div>

          <!-- Honey -->
          <div class="ingredient-card reveal reveal-delay-1" data-id="honey">
            <div class="ingredient-card-icon"><i class="fas fa-apple-alt"></i></div>
            <span class="role">Natural Binder</span>
            <h3>Wild Forest Honey</h3>
            <p>Caramel warmth. Used as an organic binder to replace toxic chemical adhesives.</p>
          </div>

          <!-- Vetiver -->
          <div class="ingredient-card reveal reveal-delay-2" data-id="vetiver">
            <div class="ingredient-card-icon"><i class="fas fa-wind"></i></div>
            <span class="role">Earthy Base</span>
            <h3>Organic Vetiver</h3>
            <p>Grounding damp-earth, cooling roots harvested from Pondicherry coastal soils.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>