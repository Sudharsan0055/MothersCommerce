<?php
/*
Template Name: About Page
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
    <section class="page-hero">
      <div class="container">
        <h1 class="reveal">Our Story & Heritage</h1>
        <p class="reveal reveal-delay-1">Deep roots in Pondicherry, crafting therapeutic aromas for the global stage since 1986.</p>
      </div>
    </section>

    <!-- Narrative Section -->
    <section class="section">
      <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1.1fr; gap: var(--space-3xl); align-items: center;">
          <div class="reveal">
            <h2 class="italic text-serif" style="color: var(--color-terracotta); font-size: 1.25rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: var(--space-xs);">Spirit of Place</h2>
            <h2 style="font-size: 2.8rem; margin-bottom: var(--space-md);">Pondicherry: Scent, Silence, & Art</h2>
            <p style="font-size: 1.05rem; margin-bottom: var(--space-md); line-height: 1.8;">
              Pondicherry (Puducherry), on India's southern coast, is a unique blend of French colonial elegance, Tamil heritage, and deep spiritual exploration. It is a town where quiet cobblestone streets meet the crashing waves of the Bay of Bengal, and where silence is practiced as an art.
            </p>
            <p style="font-size: 1.05rem; margin-bottom: var(--space-md); line-height: 1.8;">
              It was in this atmosphere of reflection and artisanal purity that Mothers Commerce was founded. Inspired by the local traditions of botanical healing and meditation, we sought to create an incense that reflects this peace—clean-burning, honest, and completely natural.
            </p>
            <p style="font-size: 1.05rem; line-height: 1.8;">
              Over four decades, our workshop has grown, but our location and philosophy remain unchanged. Every stick of incense we ship to London, New York, or Sydney carries a breath of Pondicherry's coastal calm.
            </p>
          </div>
          <div class="reveal reveal-delay-2" style="position: relative;">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pondicherry.png" alt="Traditional houses in Pondicherry's French quarter" style="width: 100%; border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);">
            <div style="position: absolute; bottom: -20px; right: -20px; background-color: var(--color-primary); color: var(--color-bg); padding: var(--space-md) var(--space-lg); border-radius: var(--radius-md); box-shadow: var(--shadow-md);" class="text-sans">
              <span style="font-size: 1.5rem; font-weight: bold; color: var(--color-gold); display: block; line-height: 1.2;">1986</span>
              <span style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; color: rgba(250, 248, 245, 0.7);">Handcrafting Began</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Timeline Section -->
    <section class="section" style="background-color: rgba(30, 58, 43, 0.01); border-top: 1px solid var(--color-border); border-bottom: 1px solid var(--color-border);">
      <div class="container">
        <div style="text-align: center; max-width: var(--max-width-narrow); margin: 0 auto var(--space-3xl) auto;" class="reveal">
          <h2 class="italic text-serif" style="color: var(--color-terracotta); font-size: 1.2rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: var(--space-xs);">Our Journey</h2>
          <h2 style="font-size: 2.5rem;">40 Years of Natural Devotion</h2>
        </div>

        <div class="timeline-container">
          <div class="timeline-line"></div>
          
          <!-- Item 1 -->
          <div class="timeline-item reveal">
            <div class="timeline-badge">1</div>
            <div class="timeline-content">
              <span class="timeline-year">1986</span>
              <h3>The Humble Start</h3>
              <p>Mothers Commerce is registered in Pondicherry. We start with 5 local women artisans roll-kneading traditional masala dough under a thatched roof, supplying local ashrams.</p>
            </div>
          </div>

          <!-- Item 2 -->
          <div class="timeline-item reveal">
            <div class="timeline-badge">2</div>
            <div class="timeline-content">
              <span class="timeline-year">1996</span>
              <h3>First International Shipments</h3>
              <p>Recognizing the growing desire for synthetic-free aromatherapy abroad, we export our first container of raw flora incense to boutique shops in the United Kingdom.</p>
            </div>
          </div>

          <!-- Item 3 -->
          <div class="timeline-item reveal">
            <div class="timeline-badge">3</div>
            <div class="timeline-content">
              <span class="timeline-year">2008</span>
              <h3>Sandalwood Sustainability</h3>
              <p>We commit to direct sourcing contracts with state-regulated forests and seed-planting programs, ensuring all Mysore sandalwood used in our sticks is fully sustainable.</p>
            </div>
          </div>

          <!-- Item 4 -->
          <div class="timeline-item reveal">
            <div class="timeline-badge">4</div>
            <div class="timeline-content">
              <span class="timeline-year">Today</span>
              <h3>Silicon Valley Grade Export</h3>
              <p>Now supporting a community of 200+ artisan women, we export premium compliant incense lines to key clients across the UK, USA, Australia, and 20 other countries.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Quote Block -->
    <section class="section quote-section">
      <div class="container quote-content reveal">
        <h2>"We do not make incense to fill spaces with smoke, but to invite clarity into minds. When there is no synthetic chemical, there is only nature's calm."</h2>
        <div class="quote-author">&mdash; Mothers Commerce, Artisanal Director</div>
      </div>
    </section>

    <!-- Artisanal Process Steps -->
    <section class="section">
      <div class="container">
        <div style="display: grid; grid-template-columns: 0.9fr 1.1fr; gap: var(--space-3xl); align-items: start;">
          <div class="reveal" style="position: sticky; top: 120px;">
            <h2 class="italic text-serif" style="color: var(--color-terracotta); font-size: 1.25rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: var(--space-xs);">How it is made</h2>
            <h2 style="font-size: 2.8rem; margin-bottom: var(--space-md);">The Hand-Rolled Artisanal Standard</h2>
            <p style="font-size: 1.05rem; line-height: 1.8; margin-bottom: var(--space-md);">
              Most commercial incense brands use machine-extruded charcoal paste loaded with chemical binders and dipped in synthetic perfumes. It is cheap, fast, and generates highly toxic smoke.
            </p>
            <p style="font-size: 1.05rem; line-height: 1.8;">
              At Mothers Commerce, we stick to the slow, ancient way. Each step respects the raw botany and the hands that shape it.
            </p>
          </div>
          
          <div style="display: flex; flex-direction: column; gap: var(--space-xl);">
            <!-- Step 1 -->
            <div class="process-card reveal">
              <div class="process-num">01</div>
              <div class="process-body">
                <h3>Botanical Sourcing</h3>
                <p>We source sandalwood logs, dried flowers, botanical gums, and pure steam-distilled essential oils. Sourcing is fair-trade certified and organic.</p>
              </div>
            </div>

            <!-- Step 2 -->
            <div class="process-card reveal reveal-delay-1">
              <div class="process-num">02</div>
              <div class="process-body">
                <h3>Masala Dough Kneading</h3>
                <p>Instead of toxic binders, we combine the powder with natural tree gums and pure wild honey, hand-kneading them into a rich aromatic dough.</p>
              </div>
            </div>

            <!-- Step 3 -->
            <div class="process-card reveal reveal-delay-2">
              <div class="process-num">03</div>
              <div class="process-body">
                <h3>Precision Hand-Rolling</h3>
                <p>Our women artisans take small portions of dough and roll it onto clean bamboo sticks on flat wooden boards. A high-skill task requiring uniform density.</p>
              </div>
            </div>

            <!-- Step 4 -->
            <div class="process-card reveal reveal-delay-3">
              <div class="process-num">04</div>
              <div class="process-body">
                <h3>Shade-Curing & Inspection</h3>
                <p>The rolled sticks are dried slowly in aerated, sun-protected rooms to lock in volatile essential oils. Every single stick is visually and aroma-inspected before packaging.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>
