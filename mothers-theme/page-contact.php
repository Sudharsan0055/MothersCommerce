<?php
/*
Template Name: Contact Page
*/
get_header();
?>

<main class="main">
  <!-- Hero Section -->
  <section class="hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/hero-banner.png'); height: 60vh; position: relative; display: flex; align-items: center; justify-content: center; text-align: center; background-size: cover; background-position: center; background-attachment: fixed;">
    <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.4);"></div>
    <div class="container" style="position: relative; z-index: 2;">
      <h1 class="reveal" style="color: #ffffff; font-size: 4rem; margin-bottom: 1rem; text-shadow: 0 4px 12px rgba(0,0,0,0.5); font-family: var(--font-serif);">Get In Touch</h1>
      <p class="reveal reveal-delay-1" style="color: #f0f0f0; max-width: 600px; margin: 0 auto; font-size: 1.25rem; text-shadow: 0 2px 6px rgba(0,0,0,0.5);">We're always eager to hear from you! Reach out for inquiries, support, or wholesale opportunities.</p>
    </div>
  </section>

  <!-- Interactive Map Section (Redesigned) -->
  <section class="section" style="background-color: #050508; position: relative; overflow: hidden; padding: 6rem 0;">
    <!-- Abstract dark space background patterns -->
    <div style="position: absolute; inset: 0; background-image: radial-gradient(circle at 50% 50%, rgba(212, 175, 55, 0.08) 0%, transparent 60%); pointer-events: none;"></div>
    
    <div class="container" style="position: relative; z-index: 5;">
      <div style="text-align: center; margin-bottom: 2rem;">
        <span class="product-tag reveal" style="background: rgba(212, 175, 55, 0.15); color: var(--color-gold); border: 1px solid rgba(212, 175, 55, 0.3);">Global Network</span>
        <h2 class="reveal" style="color: #ffffff; font-size: 3.2rem; margin-top: 1.5rem; font-family: var(--font-serif); font-weight: 400;">Our Worldwide Presence</h2>
        <p class="reveal reveal-delay-1" style="color: rgba(255,255,255,0.7); max-width: 600px; margin: 1.5rem auto 0; font-size: 1.1rem; line-height: 1.6;">Exporting the purest incense and natural fragrances from Pondicherry to the world.</p>
      </div>

      <!-- Globe Container (Removed overflow:hidden and increased height so globe is fully visible) -->
      <div class="reveal reveal-delay-2" style="position: relative; width: 100%; max-width: 1000px; height: 850px; margin: 0 auto;">
        
        <!-- 3D CSS Spinning Globe -->
        <style>
          .css-globe {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 750px;
            height: 750px;
            border-radius: 50%;
            background: url('https://unpkg.com/three-globe/example/img/earth-dark.jpg');
            background-size: cover;
            box-shadow: inset -40px -40px 80px rgba(0,0,0,0.9), inset 10px 10px 40px rgba(255,255,255,0.15), 0 0 60px rgba(212, 175, 55, 0.15);
            animation: spinGlobe 30s linear infinite;
            opacity: 0.8;
            pointer-events: none;
          }
          
          /* Abstract connections overlay */
          .globe-overlay-lines {
            position: absolute;
            top: 50%; left: 50%; 
            transform: translate(-50%, -50%);
            width: 1000px; 
            height: 850px;
          }

          @keyframes spinGlobe {
            from { background-position: 0 0; }
            to { background-position: 200% 0; }
          }
        </style>
        
        <div class="css-globe"></div>

        <!-- SVG Map Background & Connections -->
        <svg viewBox="0 0 1000 850" class="globe-overlay-lines">
          <defs>
            <linearGradient id="lineGrad" x1="0%" y1="0%" x2="100%" y2="100%">
              <stop offset="0%" stop-color="var(--color-terracotta)" stop-opacity="0.1" />
              <stop offset="100%" stop-color="var(--color-gold)" stop-opacity="0.9" />
            </linearGradient>
            <linearGradient id="lineGradReverse" x1="100%" y1="100%" x2="0%" y2="0%">
              <stop offset="0%" stop-color="var(--color-terracotta)" stop-opacity="0.1" />
              <stop offset="100%" stop-color="var(--color-gold)" stop-opacity="0.9" />
            </linearGradient>
          </defs>
          
          <!-- Connections from Hub (680, 400) to Nodes -->
          <path d="M 680 400 Q 450 250 220 350" fill="transparent" stroke="url(#lineGradReverse)" stroke-width="2.5" stroke-dasharray="8,8">
            <animate attributeName="stroke-dashoffset" values="100;0" dur="3s" repeatCount="indefinite" />
          </path>
          <path d="M 680 400 Q 560 320 450 325" fill="transparent" stroke="url(#lineGradReverse)" stroke-width="2.5" stroke-dasharray="8,8">
            <animate attributeName="stroke-dashoffset" values="100;0" dur="2.5s" repeatCount="indefinite" />
          </path>
          <path d="M 680 400 Q 580 340 490 335" fill="transparent" stroke="url(#lineGradReverse)" stroke-width="2.5" stroke-dasharray="8,8">
            <animate attributeName="stroke-dashoffset" values="100;0" dur="2s" repeatCount="indefinite" />
          </path>
          <path d="M 680 400 Q 750 550 860 600" fill="transparent" stroke="url(#lineGrad)" stroke-width="2.5" stroke-dasharray="8,8">
            <animate attributeName="stroke-dashoffset" values="0;100" dur="2.5s" repeatCount="indefinite" />
          </path>
        </svg>

        <!-- Nodes -->
        <style>
          .map-node { position: absolute; width: 14px; height: 14px; background-color: var(--color-gold); border-radius: 50%; border: 2px solid rgba(0,0,0,0.8); cursor: pointer; transform: translate(-50%, -50%); z-index: 10; transition: var(--transition-smooth); box-shadow: 0 0 15px var(--color-gold); }
          .map-node::after { content: ''; position: absolute; top: 50%; left: 50%; width: 50px; height: 50px; background-color: var(--color-gold); border-radius: 50%; transform: translate(-50%, -50%); animation: pulseMapDark 2.5s infinite ease-out; opacity: 0.4; pointer-events: none; }
          .map-node.hub { background-color: var(--color-terracotta); width: 24px; height: 24px; box-shadow: 0 0 20px var(--color-terracotta); border: 2px solid #fff; }
          .map-node.hub::after { background-color: var(--color-terracotta); width: 100px; height: 100px; opacity: 0.5; }
          .map-node-label { position: absolute; top: -50px; left: 50%; transform: translateX(-50%); background: rgba(5, 5, 8, 0.95); padding: 10px 18px; border-radius: var(--radius-sm); font-size: 0.95rem; font-weight: 600; color: #fff; box-shadow: 0 15px 30px rgba(0,0,0,0.5); opacity: 0; transition: var(--transition-smooth); white-space: nowrap; pointer-events: none; border: 1px solid rgba(212, 175, 55, 0.4); z-index: 20; backdrop-filter: blur(8px); }
          .map-node:hover .map-node-label { opacity: 1; top: -60px; }
          .map-node-label span { display: block; font-size: 0.8rem; color: var(--color-gold); font-weight: 400; margin-top: 4px; }
          @keyframes pulseMapDark { 0% { transform: translate(-50%, -50%) scale(0.3); opacity: 0.9; } 100% { transform: translate(-50%, -50%) scale(1.8); opacity: 0; } }
        </style>
        
        <!-- Y coords shifted down by ~200px to center in new 850px height -->
        <div class="map-node" style="top: 41%; left: 22%;">
          <div class="map-node-label">Mere Cie Deux <span>USA</span></div>
        </div>
        <div class="map-node" style="top: 38%; left: 45%;">
          <div class="map-node-label">Greater Goods <span>United Kingdom</span></div>
        </div>
        <div class="map-node" style="top: 39%; left: 49%;">
          <div class="map-node-label">Mira International <span>Netherlands</span></div>
        </div>
        <div class="map-node hub" style="top: 47%; left: 68%;">
          <div class="map-node-label">Head Office <span>Pondicherry, India</span></div>
        </div>
        <div class="map-node" style="top: 70%; left: 86%;">
          <div class="map-node-label">Exotic Designers <span>Australia</span></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact & Distributors Grid -->
  <section class="section" style="background-color: var(--color-bg);">
    <div class="container">
      <div style="display: grid; grid-template-columns: 1fr 1.2fr; gap: 5rem; align-items: start;">
        
        <!-- Left Column: Head Office & Form -->
        <div class="reveal" style="display: flex; flex-direction: column; gap: 3rem;">
          <div style="background: rgba(30,58,43,0.03); padding: 2.5rem; border-radius: var(--radius-md); border: 1px solid var(--color-border);">
            <h3 style="color: var(--color-primary); margin-bottom: 1.5rem; font-size: 1.8rem; font-family: var(--font-serif);">Head Office (India)</h3>
            <p style="margin-bottom: 2rem; line-height: 1.6; color: var(--color-text);"><strong>M/s. Mother's Commerce Company Pvt. Ltd.</strong><br>No.40, 1st Floor, Montorsier Street, Pondicherry &ndash; 605 001.</p>
            
            <div style="display: flex; flex-direction: column; gap: 1rem;">
              <div style="display: flex; align-items: center;"><i class="fa-solid fa-phone" style="color: var(--color-terracotta); width: 35px; font-size: 1.2rem;"></i> +91 413-2333 349</div>
              <div style="display: flex; align-items: center;"><i class="fa-solid fa-phone" style="color: var(--color-terracotta); width: 35px; font-size: 1.2rem;"></i> +91 413-2342 442</div>
              <div style="display: flex; align-items: center;"><i class="fa-solid fa-fax" style="color: var(--color-terracotta); width: 35px; font-size: 1.2rem;"></i> +91 413-2330 603</div>
              <div style="display: flex; align-items: center;"><i class="fa-solid fa-envelope" style="color: var(--color-terracotta); width: 35px; font-size: 1.2rem;"></i> motherscommerce@gmail.com</div>
              <div style="display: flex; align-items: center;"><i class="fa-solid fa-globe" style="color: var(--color-terracotta); width: 35px; font-size: 1.2rem;"></i> www.mothersfragrances.com</div>
            </div>
          </div>
          
          <div style="background: var(--color-surface); padding: 2.5rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); box-shadow: var(--shadow-sm);">
            <h3 style="color: var(--color-primary); margin-bottom: 2rem; font-size: 1.8rem; font-family: var(--font-serif);">Send a Message</h3>
            <form>
              <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-size: 0.85rem; color: var(--color-primary); font-weight: 600; margin-bottom: 0.6rem; text-transform: uppercase; letter-spacing: 0.05em;">Your Name</label>
                <input type="text" style="width: 100%; padding: 0.85rem 1rem; border: 1px solid var(--color-border); border-radius: var(--radius-sm); font-family: inherit; background-color: var(--color-bg); transition: var(--transition-fast);" onfocus="this.style.borderColor='var(--color-primary)'; this.style.boxShadow='0 0 0 3px rgba(30,58,43,0.1)'" onblur="this.style.borderColor='var(--color-border)'; this.style.boxShadow='none'">
              </div>
              <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-size: 0.85rem; color: var(--color-primary); font-weight: 600; margin-bottom: 0.6rem; text-transform: uppercase; letter-spacing: 0.05em;">Email Address</label>
                <input type="email" style="width: 100%; padding: 0.85rem 1rem; border: 1px solid var(--color-border); border-radius: var(--radius-sm); font-family: inherit; background-color: var(--color-bg); transition: var(--transition-fast);" onfocus="this.style.borderColor='var(--color-primary)'; this.style.boxShadow='0 0 0 3px rgba(30,58,43,0.1)'" onblur="this.style.borderColor='var(--color-border)'; this.style.boxShadow='none'">
              </div>
              <div style="margin-bottom: 2rem;">
                <label style="display: block; font-size: 0.85rem; color: var(--color-primary); font-weight: 600; margin-bottom: 0.6rem; text-transform: uppercase; letter-spacing: 0.05em;">Message</label>
                <textarea rows="5" style="width: 100%; padding: 0.85rem 1rem; border: 1px solid var(--color-border); border-radius: var(--radius-sm); font-family: inherit; resize: vertical; background-color: var(--color-bg); transition: var(--transition-fast);" onfocus="this.style.borderColor='var(--color-primary)'; this.style.boxShadow='0 0 0 3px rgba(30,58,43,0.1)'" onblur="this.style.borderColor='var(--color-border)'; this.style.boxShadow='none'"></textarea>
              </div>
              <button type="button" class="btn btn-primary" style="width: 100%; justify-content: center; padding: 1rem;">Send Message</button>
            </form>
          </div>
        </div>

        <!-- Right Column: Worldwide Distributors -->
        <div class="reveal reveal-delay-1" style="background: rgba(194, 125, 86, 0.02); padding: 3rem; border-radius: var(--radius-md); border: 1px solid rgba(194, 125, 86, 0.1);">
          <h3 style="color: var(--color-primary); margin-bottom: 2.5rem; font-size: 2rem; border-bottom: 2px solid var(--color-terracotta); display: inline-block; padding-bottom: 0.5rem; font-family: var(--font-serif);">Worldwide Distributors</h3>
          
          <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            
            <div style="padding: 2rem; background-color: var(--color-surface); border-radius: var(--radius-sm); border-left: 4px solid var(--color-terracotta); box-shadow: var(--shadow-sm); transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateX(8px)'; this.style.boxShadow='var(--shadow-md)'" onmouseout="this.style.transform='translateX(0)'; this.style.boxShadow='var(--shadow-sm)'">
              <h4 style="color: var(--color-primary); margin-bottom: 1rem; font-size: 1.4rem;">Mere Cie Deux <span style="font-weight: 400; color: var(--color-text-light); font-size: 1.1rem; margin-left: 5px;">(USA)</span></h4>
              <p style="color: var(--color-text); line-height: 1.6; margin-bottom: 1.2rem; font-size: 1.05rem;">Tara Haack, 123 River Road Claremont, NH 03743 USA</p>
              <div style="display: flex; flex-direction: column; gap: 0.8rem; color: var(--color-text); font-size: 0.95rem;">
                <span><i class="fa-solid fa-phone" style="color: var(--color-terracotta); margin-right: 10px; width: 20px;"></i> 206-276-5945</span>
                <span><i class="fa-solid fa-envelope" style="color: var(--color-terracotta); margin-right: 10px; width: 20px;"></i> info@mereciedeux.com</span>
                <span><i class="fa-solid fa-globe" style="color: var(--color-terracotta); margin-right: 10px; width: 20px;"></i> www.mereciedeux.com</span>
              </div>
            </div>

            <div style="padding: 2rem; background-color: var(--color-surface); border-radius: var(--radius-sm); border-left: 4px solid var(--color-terracotta); box-shadow: var(--shadow-sm); transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateX(8px)'; this.style.boxShadow='var(--shadow-md)'" onmouseout="this.style.transform='translateX(0)'; this.style.boxShadow='var(--shadow-sm)'">
              <h4 style="color: var(--color-primary); margin-bottom: 1rem; font-size: 1.4rem;">Greater Goods <span style="font-weight: 400; color: var(--color-text-light); font-size: 1.1rem; margin-left: 5px;">(UK)</span></h4>
              <p style="color: var(--color-text); line-height: 1.6; margin-bottom: 1.2rem; font-size: 1.05rem;">Greater Goods Ltd, 44 Rock Road, Midsomer Norton, BA3 2AQ</p>
              <div style="display: flex; flex-direction: column; gap: 0.8rem; color: var(--color-text); font-size: 0.95rem;">
                <span><i class="fa-solid fa-fax" style="color: var(--color-terracotta); margin-right: 10px; width: 20px;"></i> 01761 / 417040</span>
                <span><i class="fa-solid fa-envelope" style="color: var(--color-terracotta); margin-right: 10px; width: 20px;"></i> info@greatergoods.co.uk</span>
                <span><i class="fa-solid fa-globe" style="color: var(--color-terracotta); margin-right: 10px; width: 20px;"></i> www.mothersfragrances.com</span>
              </div>
            </div>

            <div style="padding: 2rem; background-color: var(--color-surface); border-radius: var(--radius-sm); border-left: 4px solid var(--color-terracotta); box-shadow: var(--shadow-sm); transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateX(8px)'; this.style.boxShadow='var(--shadow-md)'" onmouseout="this.style.transform='translateX(0)'; this.style.boxShadow='var(--shadow-sm)'">
              <h4 style="color: var(--color-primary); margin-bottom: 1rem; font-size: 1.4rem;">M/s. Exotic Designers & Importers <span style="font-weight: 400; color: var(--color-text-light); font-size: 1.1rem; margin-left: 5px;">(Australia)</span></h4>
              <p style="color: var(--color-text); line-height: 1.6; margin-bottom: 1.2rem; font-size: 1.05rem;">Unit 3-23 Dudgeons Lane Bangalow NSW 2479 AUSTRALIA</p>
              <div style="display: flex; flex-direction: column; gap: 0.8rem; color: var(--color-text); font-size: 0.95rem;">
                <span><i class="fa-solid fa-phone" style="color: var(--color-terracotta); margin-right: 10px; width: 20px;"></i> 0427 85 88 35</span>
                <span><i class="fa-solid fa-fax" style="color: var(--color-terracotta); margin-right: 10px; width: 20px;"></i> 61-2-6680 9864</span>
                <span><i class="fa-solid fa-envelope" style="color: var(--color-terracotta); margin-right: 10px; width: 20px;"></i> exoticdesigners@hotmail.com</span>
                <span><i class="fa-solid fa-globe" style="color: var(--color-terracotta); margin-right: 10px; width: 20px;"></i> mothersfragranceincense.com.au</span>
              </div>
            </div>

            <div style="padding: 2rem; background-color: var(--color-surface); border-radius: var(--radius-sm); border-left: 4px solid var(--color-terracotta); box-shadow: var(--shadow-sm); transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateX(8px)'; this.style.boxShadow='var(--shadow-md)'" onmouseout="this.style.transform='translateX(0)'; this.style.boxShadow='var(--shadow-sm)'">
              <h4 style="color: var(--color-primary); margin-bottom: 1rem; font-size: 1.4rem;">M/s. Mira International <span style="font-weight: 400; color: var(--color-text-light); font-size: 1.1rem; margin-left: 5px;">(Netherlands)</span></h4>
              <p style="color: var(--color-text); line-height: 1.6; margin-bottom: 1.2rem; font-size: 1.05rem;">Achterwerf 312, 1357 DG Almere Haven, The Netherlands.</p>
              <div style="display: flex; flex-direction: column; gap: 0.8rem; color: var(--color-text); font-size: 0.95rem;">
                <span><i class="fa-solid fa-phone" style="color: var(--color-terracotta); margin-right: 10px; width: 20px;"></i> +00-31-36-5400183</span>
                <span><i class="fa-solid fa-envelope" style="color: var(--color-terracotta); margin-right: 10px; width: 20px;"></i> miraint@worldonline.nl</span>
                <span><i class="fa-solid fa-globe" style="color: var(--color-terracotta); margin-right: 10px; width: 20px;"></i> www.wierook.nl</span>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Google Map Section -->
  <section style="width: 100%; height: 450px; margin-top: 2rem;">
    <iframe src="https://maps.google.com/maps?q=Mothers%20Commerce,%20Montorsier%20St,%20Pondicherry&t=&z=16&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>
</main>

<?php get_footer(); ?>