import os

with open('contact.html', 'r', encoding='utf-8') as f:
    content = f.read()

old_map_section = """  <!-- Interactive Map Section -->
  <section class="section" style="background-color: var(--color-surface); border-bottom: 1px solid var(--color-border); position: relative; overflow: hidden;">
    <div class="container">
      <div style="text-align: center; margin-bottom: 4rem;">
        <span class="product-tag reveal" style="background: var(--color-terracotta); color: var(--color-bg);">Global Reach</span>
        <h2 class="reveal" style="color: var(--color-primary); font-size: 2.8rem; margin-top: 1rem;">Our Worldwide Presence</h2>
      </div>

      <div class="reveal reveal-delay-1" style="position: relative; width: 100%; max-width: 900px; height: 500px; margin: 0 auto; background-color: rgba(30, 58, 43, 0.03); border-radius: var(--radius-md); border: 1px solid var(--color-border); overflow: hidden; box-shadow: inset 0 0 30px rgba(0,0,0,0.05);">
        <!-- SVG Map Background -->
        <svg viewBox="0 0 1000 500" style="width: 100%; height: 100%; opacity: 0.15; position: absolute; top: 0; left: 0;">
          <!-- Stylized abstract map lines -->
          <path d="M 150 150 Q 300 100 500 200 T 800 250" fill="transparent" stroke="var(--color-primary)" stroke-width="1.5" stroke-dasharray="5,5"/>
          <path d="M 450 150 Q 600 350 750 400" fill="transparent" stroke="var(--color-primary)" stroke-width="1.5" stroke-dasharray="5,5"/>
          <path d="M 500 200 Q 650 250 850 350" fill="transparent" stroke="var(--color-primary)" stroke-width="1.5" stroke-dasharray="5,5"/>
          <circle cx="150" cy="150" r="3" fill="var(--color-primary)" />
          <circle cx="450" cy="150" r="3" fill="var(--color-primary)" />
          <circle cx="500" cy="200" r="3" fill="var(--color-primary)" />
          <circle cx="800" cy="250" r="3" fill="var(--color-primary)" />
          <circle cx="850" cy="350" r="3" fill="var(--color-primary)" />
          <circle cx="750" cy="400" r="3" fill="var(--color-primary)" />
        </svg>

        <!-- Nodes -->
        <style>
          .map-node { position: absolute; width: 14px; height: 14px; background-color: var(--color-terracotta); border-radius: 50%; border: 3px solid var(--color-surface); cursor: pointer; transform: translate(-50%, -50%); z-index: 10; transition: var(--transition-smooth); box-shadow: var(--shadow-sm); }
          .map-node::after { content: ''; position: absolute; top: 50%; left: 50%; width: 45px; height: 45px; background-color: var(--color-terracotta); border-radius: 50%; transform: translate(-50%, -50%); animation: pulseMap 2.5s infinite ease-out; opacity: 0.4; pointer-events: none; }
          .map-node.hub { background-color: var(--color-gold); width: 18px; height: 18px; }
          .map-node.hub::after { background-color: var(--color-gold); width: 70px; height: 70px; }
          .map-node-label { position: absolute; top: -35px; left: 50%; transform: translateX(-50%); background: var(--color-bg); padding: 5px 12px; border-radius: var(--radius-xs); font-size: 0.85rem; font-weight: 600; color: var(--color-primary); box-shadow: var(--shadow-sm); opacity: 0; transition: var(--transition-smooth); white-space: nowrap; pointer-events: none; border: 1px solid var(--color-border); z-index: 20; }
          .map-node:hover .map-node-label { opacity: 1; top: -45px; }
          @keyframes pulseMap { 0% { transform: translate(-50%, -50%) scale(0.3); opacity: 0.7; } 100% { transform: translate(-50%, -50%) scale(1.6); opacity: 0; } }
        </style>
        
        <div class="map-node" style="top: 30%; left: 22%;">
          <div class="map-node-label">USA (Mere Cie Deux)</div>
        </div>
        <div class="map-node" style="top: 25%; left: 45%;">
          <div class="map-node-label">UK (Greater Goods)</div>
        </div>
        <div class="map-node" style="top: 27%; left: 49%;">
          <div class="map-node-label">Netherlands (Mira International)</div>
        </div>
        <div class="map-node hub" style="top: 40%; left: 68%;">
          <div class="map-node-label">India (Head Office)</div>
        </div>
        <div class="map-node" style="top: 80%; left: 86%;">
          <div class="map-node-label">Australia (Exotic Designers)</div>
        </div>
      </div>
    </div>
  </section>"""

new_map_section = """  <!-- Interactive Map Section (Redesigned) -->
  <section class="section" style="background-color: var(--color-primary); position: relative; overflow: hidden; padding: 6rem 0;">
    <!-- Abstract dark mode background patterns -->
    <div style="position: absolute; inset: 0; background-image: radial-gradient(circle at 50% 50%, rgba(255,255,255,0.03) 0%, transparent 70%); pointer-events: none;"></div>
    
    <div class="container">
      <div style="text-align: center; margin-bottom: 4rem;">
        <span class="product-tag reveal" style="background: rgba(212, 175, 55, 0.15); color: var(--color-gold); border: 1px solid rgba(212, 175, 55, 0.3);">Global Network</span>
        <h2 class="reveal" style="color: var(--color-bg); font-size: 3.2rem; margin-top: 1.5rem; font-family: var(--font-serif); font-weight: 400;">Our Worldwide Presence</h2>
        <p class="reveal reveal-delay-1" style="color: rgba(255,255,255,0.7); max-width: 600px; margin: 1.5rem auto 0; font-size: 1.1rem; line-height: 1.6;">Exporting the purest incense and natural fragrances from Pondicherry to the world.</p>
      </div>

      <div class="reveal reveal-delay-2" style="position: relative; width: 100%; max-width: 900px; height: 500px; margin: 0 auto; background-color: rgba(0, 0, 0, 0.2); border-radius: var(--radius-md); border: 1px solid rgba(255,255,255,0.1); overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.3);">
        
        <!-- SVG Map Background & Connections -->
        <svg viewBox="0 0 1000 500" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;">
          <defs>
            <linearGradient id="lineGrad" x1="0%" y1="0%" x2="100%" y2="100%">
              <stop offset="0%" stop-color="var(--color-terracotta)" stop-opacity="0.2" />
              <stop offset="100%" stop-color="var(--color-gold)" stop-opacity="0.8" />
            </linearGradient>
            <linearGradient id="lineGradReverse" x1="100%" y1="100%" x2="0%" y2="0%">
              <stop offset="0%" stop-color="var(--color-terracotta)" stop-opacity="0.2" />
              <stop offset="100%" stop-color="var(--color-gold)" stop-opacity="0.8" />
            </linearGradient>
          </defs>
          
          <!-- Connections from Hub (680, 200) to Nodes -->
          <!-- To USA (220, 150) -->
          <path d="M 680 200 Q 450 50 220 150" fill="transparent" stroke="url(#lineGradReverse)" stroke-width="2" stroke-dasharray="8,8">
            <animate attributeName="stroke-dashoffset" values="100;0" dur="3s" repeatCount="indefinite" />
          </path>
          
          <!-- To UK (450, 125) -->
          <path d="M 680 200 Q 560 120 450 125" fill="transparent" stroke="url(#lineGradReverse)" stroke-width="2" stroke-dasharray="8,8">
            <animate attributeName="stroke-dashoffset" values="100;0" dur="2.5s" repeatCount="indefinite" />
          </path>
          
          <!-- To Netherlands (490, 135) -->
          <path d="M 680 200 Q 580 140 490 135" fill="transparent" stroke="url(#lineGradReverse)" stroke-width="2" stroke-dasharray="8,8">
            <animate attributeName="stroke-dashoffset" values="100;0" dur="2s" repeatCount="indefinite" />
          </path>

          <!-- To Australia (860, 400) -->
          <path d="M 680 200 Q 750 350 860 400" fill="transparent" stroke="url(#lineGrad)" stroke-width="2" stroke-dasharray="8,8">
            <animate attributeName="stroke-dashoffset" values="0;100" dur="2.5s" repeatCount="indefinite" />
          </path>
        </svg>

        <!-- Nodes -->
        <style>
          .map-node { position: absolute; width: 12px; height: 12px; background-color: var(--color-gold); border-radius: 50%; border: 2px solid rgba(0,0,0,0.5); cursor: pointer; transform: translate(-50%, -50%); z-index: 10; transition: var(--transition-smooth); box-shadow: 0 0 10px var(--color-gold); }
          .map-node::after { content: ''; position: absolute; top: 50%; left: 50%; width: 45px; height: 45px; background-color: var(--color-gold); border-radius: 50%; transform: translate(-50%, -50%); animation: pulseMapDark 2.5s infinite ease-out; opacity: 0.3; pointer-events: none; }
          .map-node.hub { background-color: var(--color-terracotta); width: 20px; height: 20px; box-shadow: 0 0 15px var(--color-terracotta); }
          .map-node.hub::after { background-color: var(--color-terracotta); width: 80px; height: 80px; }
          .map-node-label { position: absolute; top: -45px; left: 50%; transform: translateX(-50%); background: rgba(30, 58, 43, 0.95); padding: 8px 16px; border-radius: var(--radius-xs); font-size: 0.9rem; font-weight: 600; color: var(--color-bg); box-shadow: 0 10px 20px rgba(0,0,0,0.3); opacity: 0; transition: var(--transition-smooth); white-space: nowrap; pointer-events: none; border: 1px solid rgba(212, 175, 55, 0.3); z-index: 20; backdrop-filter: blur(5px); }
          .map-node:hover .map-node-label { opacity: 1; top: -55px; }
          .map-node-label span { display: block; font-size: 0.75rem; color: var(--color-gold); font-weight: 400; margin-top: 2px; }
          @keyframes pulseMapDark { 0% { transform: translate(-50%, -50%) scale(0.3); opacity: 0.8; } 100% { transform: translate(-50%, -50%) scale(1.6); opacity: 0; } }
        </style>
        
        <div class="map-node" style="top: 30%; left: 22%;">
          <div class="map-node-label">Mere Cie Deux <span>USA</span></div>
        </div>
        <div class="map-node" style="top: 25%; left: 45%;">
          <div class="map-node-label">Greater Goods <span>United Kingdom</span></div>
        </div>
        <div class="map-node" style="top: 27%; left: 49%;">
          <div class="map-node-label">Mira International <span>Netherlands</span></div>
        </div>
        <div class="map-node hub" style="top: 40%; left: 68%;">
          <div class="map-node-label">Head Office <span>Pondicherry, India</span></div>
        </div>
        <div class="map-node" style="top: 80%; left: 86%;">
          <div class="map-node-label">Exotic Designers <span>Australia</span></div>
        </div>
      </div>
    </div>
  </section>"""

if old_map_section in content:
    new_content = content.replace(old_map_section, new_map_section)
    with open('contact.html', 'w', encoding='utf-8') as f:
        f.write(new_content)
    print("Map section replaced successfully.")
else:
    print("Could not find the exact old map section. Writing fallback script...")
