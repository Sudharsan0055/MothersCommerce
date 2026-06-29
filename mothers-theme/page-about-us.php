<?php
/*
Template Name: About Us Page
*/
include 'header.php';
?>

<main>

    <!-- Hero Section (Parallax) -->
    <section class="hero" style="background-image: url('./assets/images/handmade_incense.webp'); height: 60vh; position: relative; display: flex; align-items: center; justify-content: center; text-align: center; background-size: cover; background-position: center; background-attachment: fixed;">
      <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.5);"></div>
      <div class="container" style="position: relative; z-index: 2;">
        <h1 class="reveal" style="color: #ffffff; font-size: 4rem; margin-bottom: 1rem; text-shadow: 0 4px 12px rgba(0,0,0,0.5); font-family: var(--font-serif);">Our Story</h1>
        <p class="reveal reveal-delay-1" style="color: #f0f0f0; max-width: 600px; margin: 0 auto; font-size: 1.25rem; text-shadow: 0 2px 6px rgba(0,0,0,0.5);">A timeless journey of purity, tradition, and global reach starting from Pondicherry.</p>
      </div>
    </section>
    
    <section class="section">
      <div class="container split-section">
        <div class="split-content reveal">
          <h2 style="color: var(--color-primary); font-size: 2.5rem; margin-bottom: 1.5rem;">Mother’s Commerce Company was established in August 1975</h2>
          <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 1.5rem; color: var(--color-text);">
            Located in the French colony of Pondicherry on the Coromandal Coast of South India in collaboration with American and Dutch associates.
          </p>
          <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 2rem; color: var(--color-text);">
            Our Hand rolled Incense, made according to the age-old masala method without dipping, and our Floral Perfume Oils have been widely recognized as among the very finest quality fragrance product available anywhere. Women who work for us are rewarded with a wage above the legal minimum and far higher than the industry’s average.
          </p>
          <div style="display: flex; gap: 2rem; margin-top: 2rem;">
            <div>
              <h4 style="color: var(--color-gold); font-size: 2rem; margin-bottom: 0.5rem;">1975</h4>
              <p style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 600;">Year Established</p>
            </div>
            <div>
              <h4 style="color: var(--color-gold); font-size: 2rem; margin-bottom: 0.5rem;">100%</h4>
              <p style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 600;">Hand Rolled Masala</p>
            </div>
          </div>
        </div>
        <div class="split-image-wrapper reveal reveal-delay-1">
          <img src="./assets/images/process_kneading.png" alt="Hand rolling incense" class="split-image" style="object-position: center;">
        </div>
      </div>
    </section>

    <!-- Achievements Section -->
    <style>
      .achievement-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 2.5rem;
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.4s ease, background 0.4s ease;
        position: relative;
        overflow: hidden;
      }
      .achievement-card::before {
        content: '';
        position: absolute;
        top: 0; left: -100%;
        width: 50%; height: 100%;
        background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.1), transparent);
        transform: skewX(-25deg);
        transition: left 0.5s ease;
      }
      .achievement-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        background: rgba(255, 255, 255, 0.08);
      }
      .achievement-card:hover::before {
        left: 200%;
      }
    </style>
    <section class="section achievements-section" style="background: linear-gradient(135deg, var(--color-primary, #2c3e50) 0%, #1a1a2e 100%); color: white; position: relative; overflow: hidden; padding: 6rem 0;">
      <!-- Decorative Background Elements -->
      <div style="position: absolute; top: -10%; left: -5%; width: 300px; height: 300px; background: rgba(212, 175, 55, 0.15); border-radius: 50%; filter: blur(60px); z-index: 1;"></div>
      <div style="position: absolute; bottom: -10%; right: -5%; width: 400px; height: 400px; background: rgba(255, 255, 255, 0.08); border-radius: 50%; filter: blur(80px); z-index: 1;"></div>
      
      <div class="container" style="position: relative; z-index: 2;">
        <div class="text-center reveal" style="max-width: 800px; margin: 0 auto 4rem auto;">
          <p style="text-transform: uppercase; letter-spacing: 3px; font-weight: 600; color: var(--color-gold, #d4af37); margin-bottom: 0.5rem; font-size: 0.9rem;">Achievements</p>
          <h2 style="font-size: 3rem; margin-bottom: 1.5rem; color: #ffffff; text-shadow: 0 4px 10px rgba(0,0,0,0.3); font-family: var(--font-serif);">Milestones We Have Achieved</h2>
          <div style="width: 80px; height: 3px; background-color: var(--color-gold, #d4af37); margin: 0 auto; border-radius: 2px;"></div>
        </div>
        
        <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
          
          <!-- Achievement 1 -->
          <div class="achievement-card reveal">
            <div style="font-size: 2.5rem; color: var(--color-gold, #d4af37); margin-bottom: 1.5rem;">
              <i class="fa-solid fa-droplet"></i>
            </div>
            <h3 style="color: #ffffff; font-size: 1.5rem; margin-bottom: 1rem; font-family: var(--font-serif);">The Mother's Fragrances</h3>
            <p style="color: #e0e0e0; line-height: 1.8; font-size: 1.05rem;">Our Hand-rolled Incense, made according to the age-old masala method without dipping, and our Floral perfume Oils have been widely recognized as among the very finest quality.</p>
          </div>

          <!-- Achievement 2 -->
          <div class="achievement-card reveal reveal-delay-1">
            <div style="font-size: 2.5rem; color: var(--color-gold, #d4af37); margin-bottom: 1.5rem;">
              <i class="fa-solid fa-palette"></i>
            </div>
            <h3 style="color: #ffffff; font-size: 1.5rem; margin-bottom: 1rem; font-family: var(--font-serif);">Tapisseries de la Mere</h3>
            <p style="color: #e0e0e0; line-height: 1.8; font-size: 1.05rem;">Our line of Hand-woven Woolen Hangings based on the works of contemporary Western artists and designs are highly praised for both their design and quality craftsmanship.</p>
          </div>

          <!-- Achievement 3 -->
          <div class="achievement-card reveal reveal-delay-2">
            <div style="font-size: 2.5rem; color: var(--color-gold, #d4af37); margin-bottom: 1.5rem;">
              <i class="fa-solid fa-dove"></i>
            </div>
            <h3 style="color: #ffffff; font-size: 1.5rem; margin-bottom: 1rem; font-family: var(--font-serif);">Packed for Peace</h3>
            <p style="color: #e0e0e0; line-height: 1.8; font-size: 1.05rem;">Portions of the proceeds from the sale of our products are donated to international efforts to promote World peace and the economic development of the poor.</p>
          </div>

        </div>
      </div>
    </section>

    <!-- Modern Core Values Section -->
    <style>
      .modern-value-card {
        position: relative;
        background: #ffffff;
        border-radius: 20px;
        padding: 3rem 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        border: 1px solid rgba(0,0,0,0.03);
        z-index: 1;
        text-align: center;
      }
      .modern-value-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 0%;
        background: linear-gradient(135deg, var(--color-primary, #2c3e50), var(--color-terracotta, #c27d56));
        z-index: -1;
        transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
      }
      .modern-value-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
      }
      .modern-value-card:hover::before {
        height: 100%;
      }
      .modern-value-card .value-icon, .modern-value-card h3, .modern-value-card p {
        transition: color 0.5s ease;
      }
      .modern-value-card:hover .value-icon, .modern-value-card:hover h3, .modern-value-card:hover p {
        color: white !important;
      }
      .value-icon {
        font-size: 3.5rem; color: var(--color-terracotta, #c27d56); margin-bottom: 1.5rem;
        display: inline-block;
        transition: transform 0.5s ease;
      }
      .modern-value-card:hover .value-icon {
        transform: scale(1.2) rotate(10deg);
      }
      
      /* Modern Process Section */
      .modern-process-container {
        display: flex;
        justify-content: space-between;
        position: relative;
        flex-wrap: wrap;
        gap: 2rem;
        margin-top: 4rem;
      }
      .modern-process-step {
        flex: 1;
        min-width: 200px;
        text-align: center;
        position: relative;
      }
      .modern-process-img-wrap {
        width: 250px; height: 240px; /* Square look */
        border-radius: 16px; /* Soft corners */
        margin: 0 auto 2rem auto;
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.6s ease;
        border: 4px solid white;
      }
      .modern-process-step:hover .modern-process-img-wrap {
        transform: scale(1.05) translateY(-10px);
        box-shadow: 0 25px 45px rgba(194, 125, 86, 0.3);
      }
      .modern-process-img-wrap img {
        width: 100%; height: 100%; object-fit: cover;
        transition: transform 0.8s ease;
      }
      .modern-process-step:hover .modern-process-img-wrap img {
        transform: scale(1.15);
      }
      .modern-process-number {
        position: absolute;
        top: -15px; 
        right: calc(50% - 135px); /* Adjusted for 250px width */
        width: 45px; height: 45px;
        background: linear-gradient(135deg, var(--color-gold, #d4af37), #b89326);
        color: white;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-weight: bold; font-size: 1.2rem;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        z-index: 10;
        border: 3px solid white;
      }
      .modern-process-connector {
        position: absolute;
        top: 120px; left: calc(50% + 125px);
        width: calc(100% - 250px);
        height: 2px;
        background: linear-gradient(90deg, var(--color-gold, #d4af37) 0%, transparent 100%);
        z-index: 0;
        opacity: 0.4;
      }
      @media (max-width: 992px) { .modern-process-connector { display: none; } }
    </style>

    <section class="section" style="background-color: #faf8f5; position: relative;">
      <div class="container">
        <div class="text-center reveal" style="max-width: 700px; margin: 0 auto 4rem auto;">
          <p style="text-transform: uppercase; letter-spacing: 2px; font-weight: 600; color: var(--color-terracotta, #c27d56); margin-bottom: 0.5rem; font-size: 0.9rem;">Philosophy</p>
          <h2 style="color: var(--color-primary, #2c3e50); margin-bottom: 1rem; font-size: 2.8rem; font-family: var(--font-serif);">Our Core Values</h2>
          <p style="font-size: 1.1rem; color: #555;">Everything we do is guided by our respect for nature and our dedication to the communities that craft our products.</p>
        </div>
        
        <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2.5rem;">
          <div class="modern-value-card reveal">
            <i class="fa-solid fa-leaf value-icon"></i>
            <h3 style="color: var(--color-primary, #2c3e50); font-size: 1.6rem; margin-bottom: 1rem;">Chemical-Free</h3>
            <p style="color: #666; line-height: 1.7;">We refuse to use synthetic fragrances or chemical dips. Our scents are derived entirely from nature's essential oils and botanical extracts.</p>
          </div>
          <div class="modern-value-card reveal reveal-delay-1">
            <i class="fa-solid fa-hand-holding-heart value-icon"></i>
            <h3 style="color: var(--color-primary, #2c3e50); font-size: 1.6rem; margin-bottom: 1rem;">Fair Trade</h3>
            <p style="color: #666; line-height: 1.7;">We believe in ethical commerce. Fair wages, safe working conditions, and community development are at the heart of our operations.</p>
          </div>
          <div class="modern-value-card reveal reveal-delay-2">
            <i class="fa-solid fa-seedling value-icon"></i>
            <h3 style="color: var(--color-primary, #2c3e50); font-size: 1.6rem; margin-bottom: 1rem;">Sustainable</h3>
            <p style="color: #666; line-height: 1.7;">Our packaging is eco-friendly, and we continuously strive to minimize our environmental footprint while celebrating Earth's raw materials.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="section" style="background-color: white;">
      <div class="container">
        <div class="text-center reveal" style="max-width: 700px; margin: 0 auto 1rem auto;">
          <p style="text-transform: uppercase; letter-spacing: 2px; font-weight: 600; color: var(--color-terracotta, #c27d56); margin-bottom: 0.5rem; font-size: 0.9rem;">The Process</p>
          <h2 style="color: var(--color-primary, #2c3e50); margin-bottom: 1rem; font-size: 2.8rem; font-family: var(--font-serif);">The Art of Crafting</h2>
          <p style="font-size: 1.1rem; color: #555;">Each incense stick goes through a meticulous journey before it reaches your home.</p>
        </div>
        
        <div class="modern-process-container reveal">
          <div class="modern-process-step">
            <div class="modern-process-number">1</div>
            <div class="modern-process-img-wrap">
              <img src="./assets/images/process_sourcing.png" alt="Sourcing Ingredients">
            </div>
            <h4 style="color: var(--color-primary, #2c3e50); font-size: 1.3rem; margin-bottom: 0.5rem;">Sourcing</h4>
            <p style="font-size: 0.95rem; color: #666;">Gathering pure resins, flowers, and woods.</p>
            <div class="modern-process-connector"></div>
          </div>
          <div class="modern-process-step" style="transition-delay: 0.1s;">
            <div class="modern-process-number">2</div>
            <div class="modern-process-img-wrap">
              <img src="./assets/images/process_kneading.png" alt="Kneading Dough">
            </div>
            <h4 style="color: var(--color-primary, #2c3e50); font-size: 1.3rem; margin-bottom: 0.5rem;">Kneading</h4>
            <p style="font-size: 0.95rem; color: #666;">Blending the raw materials into a fragrant dough.</p>
            <div class="modern-process-connector"></div>
          </div>
          <div class="modern-process-step" style="transition-delay: 0.2s;">
            <div class="modern-process-number">3</div>
            <div class="modern-process-img-wrap">
              <img src="./assets/images/process_rolling.png" alt="Hand Rolling">
            </div>
            <h4 style="color: var(--color-primary, #2c3e50); font-size: 1.3rem; margin-bottom: 0.5rem;">Rolling</h4>
            <p style="font-size: 0.95rem; color: #666;">Expertly hand-rolling onto bamboo sticks.</p>
            <div class="modern-process-connector"></div>
          </div>
          <div class="modern-process-step" style="transition-delay: 0.3s;">
            <div class="modern-process-number">4</div>
            <div class="modern-process-img-wrap">
              <img src="./assets/images/hero_incense_mood_1781801686159.png" alt="Curing and Packaging">
            </div>
            <h4 style="color: var(--color-primary, #2c3e50); font-size: 1.3rem; margin-bottom: 0.5rem;">Curing</h4>
            <p style="font-size: 0.95rem; color: #666;">Sun-drying to lock in the pure, lasting aromas.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php // include 'footer.php'; // get_footer() replaced, create footer.php if needed ?>