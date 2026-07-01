import io
import re

html_file = 'index.html'
with io.open(html_file, 'r', encoding='utf-8') as f:
    content = f.read()

# The items provided by the user
items = [
    'Aroma Lamps & Diffusers', 'Aniseed', 'Basil', 'Bergamot', 'Bois de Rose', 
    'Cajeput', 'Cardamom', 'Cassia', 'Cedarwood', 'Cedarwood Atlas', 
    'Cinnamon Bark', 'Cinnamon Leaf', 'Ciste Spain ABS', 'Citron', 'Citronella', 
    'Clary Sage', 'Clove', 'Dill', 'Eucalyptus', 'Frankincense', 'Geranium', 
    'Ginger', 'Grapefruit', 'Holy basil', 'Juniper berry', 'Labdanum Absolute', 
    'Lavender', 'Lavender ABS', 'Lavender Maillette', 'Lemongrass', 'Lime', 
    'Mandarine', 'Myrrh', 'Neroli', 'Nutmeg', 'Oakmoss ABS', 'Palmorasa', 
    'Patchouli', 'Peppermint', 'Peru balsam', 'Petitgrain', 'Pine', 'Rosemary', 
    'Sandalwood', 'Star Anise', 'Sweet Orange', 'Tea Tree', 'Thyme', 
    'Tolu Balsam', 'Ylang Ylang'
]

lis = '\n'.join([f'                            <li><a href=\"#\">{i}</a></li>' for i in items])

new_panel = f'''<!-- TAB 3: ESSENTIAL OILS -->
                <div class="savon-panel" id="tab-oils">
                  <div class="incense-carousel-container">
                    
                    <div class="incense-carousel">
                      
                      <!-- Card 1: Essential Oils -->
                      <div class="incense-card">
                        <div class="incense-image-placeholder" style="background-image: url('assets/images/essential_oils_bottles_1781801723388.png'); background-size: cover;">
                           <i class="fa-solid fa-droplet" style="opacity: 0.5;"></i>
                        </div>
                        <h4>ESSENTIAL OILS<br><span>PURE EXTRACTS</span></h4>
                        <div class="incense-list-container">
                          <ul class="incense-list">
{lis}
                          </ul>
                        </div>
                      </div>
                      
                    </div>
                    
                  </div>
                </div>'''

# Replace the current tab-oils panel
content = re.sub(
    r'<!-- TAB 3: ESSENTIAL OILS -->.*?</div>\s*</div>\s*</div>',
    new_panel,
    content,
    flags=re.DOTALL
)

with io.open(html_file, 'w', encoding='utf-8') as f:
    f.write(content)
print("Updated tab-oils layout")
