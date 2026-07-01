import io
import re

html_file = 'index.html'
with io.open(html_file, 'r', encoding='utf-8') as f:
    content = f.read()

# Replace the tab button
content = content.replace(
    '<div class=\"savon-tab\" data-target=\"tab-tapestry\">\n                <i class=\"fa-solid fa-om\"></i> Tapestries\n              </div>',
    '<div class=\"savon-tab\" data-target=\"tab-perfume\">\n                <i class=\"fa-solid fa-bottle-droplet\"></i> Perfume Oils\n              </div>'
)

# Build the new tab-perfume panel
fragrances = [
    'Amber', 'Autumn Leaves', 'Box Lavender', 'Cedarwood', 'Champaca', 
    'Christmas Oil', 'English Lavender', 'Evening Rose', 'Frankincense', 
    'French Lavender Gardenia', 'Honey Suckle', 'Jasmine Lavender', 'Le Perfume', 
    'LiLac', 'Lilly of the Valley', 'Magnolia', 'Musk', 'Narcissus', 
    'Patchouli', 'Rose', 'Spice wood', 'Violets', 'White Lotus', 'Wood Lilly'
]

# Split into two columns for the single card, or just one list. 
# The user asked for a carousel view like cones. Let's make one card in the carousel.
lis = '\n'.join([f'                            <li><a href=\"#\">{f}</a></li>' for f in fragrances])

new_panel = f'''<!-- TAB 4: PERFUME OILS -->
                <div class="savon-panel" id="tab-perfume">
                  <div class="incense-carousel-container">
                    <button class="carousel-nav carousel-prev" aria-label="Previous category"><i class="fa-solid fa-chevron-left"></i></button>
                    
                    <div class="incense-carousel">
                      
                      <!-- Card 1: Perfume Oils -->
                      <div class="incense-card">
                        <div class="incense-image-placeholder" style="background-image: url('assets/images/essential_oils_bottles_1781801723388.png'); background-size: cover;">
                           <i class="fa-solid fa-bottle-droplet" style="opacity: 0.5;"></i>
                        </div>
                        <h4>PERFUME OILS<br><span>PURE FLORAL ESSENCES</span></h4>
                        <div class="incense-list-container">
                          <ul class="incense-list">
{lis}
                          </ul>
                        </div>
                      </div>
                      
                    </div>
                    
                    <button class="carousel-nav carousel-next" aria-label="Next category"><i class="fa-solid fa-chevron-right"></i></button>
                  </div>
                </div>'''

# Replace the old tab-tapestry panel using regex
content = re.sub(
    r'<!-- TAB 4: TAPESTRIES -->.*?</div>\s*</div>\s*</div>',
    new_panel,
    content,
    flags=re.DOTALL
)

with io.open(html_file, 'w', encoding='utf-8') as f:
    f.write(content)
print("Updated index.html")
