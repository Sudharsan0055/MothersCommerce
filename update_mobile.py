import os
import re

files = ['about-us.html', 'about.html', 'cones.html', 'contact.html', 'essential-oil.html', 'fragrances.html', 'incense.html', 'ingredients.html', 'products.html', 'tapestry.html']

new_mobile_menu = ''
with open('index.html', 'r', encoding='utf-8') as f:
    idx_html = f.read()
    start_tag = '<div class="mobile-menu" id="mobileMenuOverlay">'
    end_tag = '<footer class="footer">'
    start_idx = idx_html.find(start_tag)
    end_idx = idx_html.find(end_tag)
    if start_idx != -1 and end_idx != -1:
        new_mobile_menu = idx_html[start_idx:end_idx]

if not new_mobile_menu:
    print('Failed to extract new mobile menu')
    exit(1)

for file in files:
    if os.path.exists(file):
        with open(file, 'r', encoding='utf-8') as f:
            content = f.read()
        
        # In the original files, there might be an old mobile menu.
        # It's usually right before the footer.
        # Let's completely remove any existing `<div class="mobile-menu"...` and then inject the new one before the footer.
        
        # Remove existing mobile menu
        pattern = re.compile(r'<div class="mobile-menu".*?</div>(?=\s*(?:<footer|<script|</body>))', re.DOTALL)
        content = pattern.sub('', content)
        
        # Inject new mobile menu right before the footer
        content = content.replace('<footer class="footer">', new_mobile_menu + '\n<footer class="footer">')
        
        with open(file, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f'Updated {file}')
