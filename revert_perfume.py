import io
import re

html_file = 'index.html'
with io.open(html_file, 'r', encoding='utf-8') as f:
    content = f.read()

fragrances = [
    'Amber', 'Autumn Leaves', 'Box Lavender', 'Cedarwood', 'Champaca', 
    'Christmas Oil', 'English Lavender', 'Evening Rose', 'Frankincense', 
    'French Lavender Gardenia', 'Honey Suckle', 'Jasmine Lavender', 'Le Perfume', 
    'LiLac', 'Lilly of the Valley', 'Magnolia', 'Musk', 'Narcissus', 
    'Patchouli', 'Rose', 'Spice wood', 'Violets', 'White Lotus', 'Wood Lilly'
]
lis = '\n'.join([f'                            <li><a href=\"#\">{f}</a></li>' for f in fragrances])

new_panel = f'''<!-- TAB 4: PERFUME OILS -->
                <div class="savon-panel" id="tab-perfume">
                  <div class="incense-carousel-container">
                    
                    <div class="incense-carousel">
                      
                      <!-- Card 1: Perfume Oils -->
                      <div class="incense-card">
                        <div class="incense-image-placeholder" style="background-image: url('assets/images/essence-1.webp'); background-size: cover;">
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
                    
                  </div>
                </div>'''

# Replace the current tab-perfume panel (which is grid-simple now)
content = re.sub(
    r'<!-- TAB 4: PERFUME OILS -->.*?</div>\s*</div>\s*</div>',
    new_panel,
    content,
    flags=re.DOTALL
)

with io.open(html_file, 'w', encoding='utf-8') as f:
    f.write(content)
print("Reverted to carousel card layout without arrows, updated image to essence-1.webp")
