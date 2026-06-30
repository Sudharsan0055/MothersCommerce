import re

with open('index.html', 'r', encoding='utf-8') as f:
    html = f.read()

# First, add the 5th card
card_5 = """
                    <!-- Card 5: Additional Fragrances -->
                    <div class="incense-card">
                      <h4>MOTHERS FRAGRANCES<br><span>ADDITIONAL FRAGRANCES</span></h4>
                      <div class="incense-list-container">
                        <ul class="incense-list">
                          <li><a href="#">English Lavender</a></li>
                          <li><a href="#">French Lavender</a></li>
                          <li><a href="#">Spicewood wood</a></li>
                          <li><a href="#">Wood Lavender</a></li>
                        </ul>
                      </div>
                    </div>
"""

# Insert card 5 before the closing div of incense-carousel
pattern = r'(<div class="incense-card">\s*<h4>MOTHER INDIA FRAGRANCES.*?</ul>\s*</div>\s*</div>\s*)(</div>\s*<button class="carousel-nav carousel-next")'
match = re.search(pattern, html, re.DOTALL)
if match:
    new_html = html[:match.start(2)] + card_5 + html[match.start(2):]
    html = new_html
else:
    print("Could not find the insertion point for Card 5.")

# Now, wrap the carousel container in the grid and add images
pattern_start = r'(<div class="savon-panel active" id="tab-incense">\s*)(<div class="incense-carousel-container">)'
match_start = re.search(pattern_start, html)

pattern_end = r'(<button class="carousel-nav carousel-next".*?</button>\s*</div>\s*)(</div>\s*<!-- TAB 2: BOTANICAL CONES -->)'
match_end = re.search(pattern_end, html, re.DOTALL)

if match_start and match_end:
    grid_start = '<div class="savon-grid-simple" style="grid-template-columns: 2.2fr 1fr; gap: 2rem;">\n                  <div class="savon-col" style="border: none; padding-bottom: 0; margin-bottom: 0;">\n                    '
    
    images_html = """
                  </div>
                  <div style="display: flex; flex-direction: column; gap: 1.5rem; justify-content: center;">
                    <div class="savon-image-promo" style="height: 200px; border-radius: var(--radius-sm);">
                      <img src="./assets/images/sandalwood_incense.webp" alt="Sandalwood Incense" style="height: 100%; object-fit: cover;">
                      <div class="savon-promo-label">Best Seller</div>
                    </div>
                    <div class="savon-image-promo" style="height: 200px; border-radius: var(--radius-sm);">
                      <img src="./assets/images/handmade_incense.webp" alt="Handmade Incense" style="height: 100%; object-fit: cover;">
                      <div class="savon-promo-label">New Arrivals</div>
                    </div>
                  </div>
                </div>
"""
    
    html = html[:match_start.start(2)] + grid_start + html[match_start.start(2):match_end.end(1)] + images_html + html[match_end.end(1):]
    
    with open('index.html', 'w', encoding='utf-8') as f:
        f.write(html)
    print("Successfully added card and images.")
else:
    print("Could not find the boundaries for the tab-incense panel.")
