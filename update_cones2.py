import re

with open('index.html', 'r', encoding='utf-8') as f:
    html = f.read()

new_tab_cones = """                <div class="savon-panel" id="tab-cones">
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
                </div>

                <!-- TAB 3: ESSENTIAL OILS -->"""

start_str = '<div class="savon-panel" id="tab-cones">'
end_str = '<!-- TAB 3: ESSENTIAL OILS -->'

start_idx = html.find(start_str)
end_idx = html.find(end_str)

if start_idx != -1 and end_idx != -1:
    html = html[:start_idx] + new_tab_cones + html[end_idx + len(end_str):]
    with open('index.html', 'w', encoding='utf-8') as f:
        f.write(html)
    print("Successfully replaced tab-cones.")
else:
    print(f"Could not find bounds. start_idx: {start_idx}, end_idx: {end_idx}")
