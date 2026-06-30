import re

with open('index.html', 'r', encoding='utf-8') as f:
    html = f.read()

# Pattern to remove the wrapper before incense-carousel-container
pattern_before = r'<div class="savon-grid-simple" style="grid-template-columns: 2\.2fr 1fr; gap: 2rem;">\s*<div class="savon-col" style="border: none; padding-bottom: 0; margin-bottom: 0;">\s*(<div class="incense-carousel-container">)'

# Pattern to remove the images and closing tags after incense-carousel-container
pattern_after = r'(</div>)\s*</div>\s*<div style="display: flex; flex-direction: column; gap: 1\.5rem; justify-content: center;">.*?</div>\s*</div>\s*</div>\s*(<!-- TAB 2: BOTANICAL CONES -->)'

new_html = re.sub(pattern_before, r'\1', html)
new_html = re.sub(pattern_after, r'\1\n              \2', new_html, flags=re.DOTALL)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(new_html)
print("Images removed.")
