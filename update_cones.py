import re

with open('index.html', 'r', encoding='utf-8') as f:
    html = f.read()

new_tab_cones = """              <div class="savon-panel" id="tab-cones">
                <div class="incense-carousel-container">
                  <button class="carousel-nav carousel-prev" aria-label="Previous category"><i class="fa-solid fa-chevron-left"></i></button>
                  
                  <div class="incense-carousel">
                    
                    <!-- Card 1: 12 Fragrances -->
                    <div class="incense-card">
                      <h4>CONES<br><span>12 FLORAL AND WOODY FRAGRANCES</span></h4>
                      <div class="incense-list-container">
                        <ul class="incense-list">
                          <li><a href="#">Amber</a></li>
                          <li><a href="#">Autumn Leaves</a></li>
                          <li><a href="#">Cedarwood</a></li>
                          <li><a href="#">Frankincense</a></li>
                          <li><a href="#">Gardenia</a></li>
                          <li><a href="#">Jasmine</a></li>
                          <li><a href="#">Lavender</a></li>
                          <li><a href="#">Lotus</a></li>
                          <li><a href="#">Musk</a></li>
                          <li><a href="#">Patchouli</a></li>
                          <li><a href="#">Rose</a></li>
                          <li><a href="#">Sandalwood</a></li>
                        </ul>
                      </div>
                    </div>

                    <!-- Card 2: 18 Fragrances -->
                    <div class="incense-card">
                      <h4>CONES<br><span>18 FLORAL AND WOODY FRAGRANCES</span></h4>
                      <div class="incense-list-container">
                        <ul class="incense-list">
                          <li><a href="#">Amber</a></li>
                          <li><a href="#">Autumn Leaves</a></li>
                          <li><a href="#">Cedarwood</a></li>
                          <li><a href="#">Cinnamon & Spice</a></li>
                          <li><a href="#">Frankincense</a></li>
                          <li><a href="#">Gardenia</a></li>
                          <li><a href="#">Jasmine</a></li>
                          <li><a href="#">Lavender</a></li>
                          <li><a href="#">Lotus</a></li>
                          <li><a href="#">Passion Flower</a></li>
                          <li><a href="#">Patchouli</a></li>
                          <li><a href="#">Rose</a></li>
                          <li><a href="#">Musk</a></li>
                          <li><a href="#">Myrrh</a></li>
                          <li><a href="#">Orange Blossom</a></li>
                          <li><a href="#">Roses & Violets</a></li>
                          <li><a href="#">Sandalwood</a></li>
                          <li><a href="#">Vanilla</a></li>
                        </ul>
                      </div>
                    </div>

                  </div>
                  
                  <button class="carousel-nav carousel-next" aria-label="Next category"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
              </div>"""

pattern = r'<!-- TAB 2: BOTANICAL CONES -->\s*<div class="savon-panel" id="tab-cones">.*?</div>\s*</div>\s*</div>'

# Let's locate precisely
start_idx = html.find('<!-- TAB 2: BOTANICAL CONES -->')
end_idx = html.find('<!-- TAB 3: ESSENTIAL OILS -->')

if start_idx != -1 and end_idx != -1:
    html = html[:start_idx] + '<!-- TAB 2: CONES -->\n' + new_tab_cones + '\n\n' + html[end_idx:]
    with open('index.html', 'w', encoding='utf-8') as f:
        f.write(html)
    print("Updated Cones tab successfully.")
else:
    print("Could not find the bounds.")
