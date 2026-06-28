import os

with open('index.html', 'r', encoding='utf-8') as f:
    index_content = f.read()

# Extract header and footer
# split at <main> and </main>

header_split = index_content.split('<main>')
if len(header_split) != 2:
    print("Failed to find main")
header_part = header_split[0]
footer_part = index_content.split('</main>')[1]

# Title change
header_part = header_part.replace("<title>Mothers Fragrances | The True Craft of Natural Incense</title>", "<title>Contact Us - The Mother's Fragrances</title>")
# Modify nav link to be active
header_part = header_part.replace('<a href="contact.html" class="nav-link">', '<a href="contact.html" class="nav-link active">')
header_part = header_part.replace('<a href="index.html" class="nav-link active">', '<a href="index.html" class="nav-link">')

main_content = """<main class="main">
  <!-- Hero Section -->
  <section class="hero" style="background-image: url('./assets/images/hero-banner.png'); height: 60vh; position: relative; display: flex; align-items: center; justify-content: center; text-align: center; background-size: cover; background-position: center; background-attachment: fixed;">
    <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.4);"></div>
    <div class="container" style="position: relative; z-index: 2;">
      <h1 class="reveal" style="color: #ffffff; font-size: 4rem; margin-bottom: 1rem; text-shadow: 0 4px 12px rgba(0,0,0,0.5); font-family: var(--font-serif);">Get In Touch</h1>
      <p class="reveal reveal-delay-1" style="color: #f0f0f0; max-width: 600px; margin: 0 auto; font-size: 1.25rem; text-shadow: 0 2px 6px rgba(0,0,0,0.5);">We're always eager to hear from you! Reach out for inquiries, support, or wholesale opportunities.</p>
    </div>
  </section>

  <!-- Interactive Map Section -->
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
</main>"""

new_contact = header_part + main_content + footer_part

with open('contact.html', 'w', encoding='utf-8') as f:
    f.write(new_contact)
