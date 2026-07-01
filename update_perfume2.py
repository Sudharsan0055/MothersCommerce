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
lis = '\n'.join([f'                        <li><a href=\"#\">{f}</a></li>' for f in fragrances])

new_panel = f'''<!-- TAB 4: PERFUME OILS -->
                <div class="savon-panel" id="tab-perfume">
                  <div class="savon-grid-simple">
                    <div class="savon-col">
                      <h4>Perfume Oils<br><span style="font-size: 0.9rem; color: var(--color-gold); font-weight: normal; text-transform: uppercase;">Pure Floral Essences</span></h4>
                      <ul class="savon-list" style="column-count: 2; column-gap: 2rem;">
{lis}
                      </ul>
                    </div>
                    <div class="savon-image-promo">
                      <img src="./assets/images/essence-1.webp" alt="Perfume Oils">
                    </div>
                  </div>
                </div>'''

# Replace the old tab-perfume panel using regex
content = re.sub(
    r'<!-- TAB 4: PERFUME OILS -->.*?</div>\s*</div>\s*</div>\s*</div>',
    new_panel,
    content,
    flags=re.DOTALL
)

with io.open(html_file, 'w', encoding='utf-8') as f:
    f.write(content)
print("Updated index.html layout for Perfume Oils")
