import os

with open('contact.html', 'r', encoding='utf-8') as f:
    content = f.read()

# We need to replace the section that starts with: <!-- Interactive Map Section (Redesigned) -->
# and ends with the closing </section> of the map.

start_tag = '<!-- Interactive Map Section (Redesigned) -->'
end_tag = '<!-- Contact & Distributors Grid -->'

start_idx = content.find(start_tag)
end_idx = content.find(end_tag)

if start_idx != -1 and end_idx != -1:
    old_section = content[start_idx:end_idx]
    
    new_section = """<!-- Interactive Map Section (Redesigned) -->
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

  """
    
    new_content = content[:start_idx] + new_section + content[end_idx:]
    with open('contact.html', 'w', encoding='utf-8') as f:
        f.write(new_content)
    print("Globe fixed successfully.")
else:
    print("Could not find start/end tags.")
