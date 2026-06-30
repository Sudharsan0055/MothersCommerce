import os

files = ['about-us.html', 'about.html', 'cones.html', 'contact.html', 'essential-oil.html', 'fragrances.html', 'incense.html', 'ingredients.html', 'products.html', 'tapestry.html']

new_mega_menu = ''
with open('index.html', 'r', encoding='utf-8') as f:
    idx_html = f.read()
    start_tag = '<div class="savon-mega-menu">'
    end_tag = '<!-- /SAVON STYLE MEGA MENU WRAPPER -->'
    start_idx = idx_html.find(start_tag)
    end_idx = idx_html.find(end_tag)
    if start_idx != -1 and end_idx != -1:
        new_mega_menu = idx_html[start_idx:end_idx]

if not new_mega_menu:
    print('Failed to extract new mega menu')
    exit(1)

for file in files:
    if os.path.exists(file):
        with open(file, 'r', encoding='utf-8') as f:
            content = f.read()
        
        import re
        
        pattern = re.compile(r'<div class="mega-menu">.*?</div>\s*</div>\s*<!-- /MEGA MENU WRAPPER -->', re.DOTALL)
        
        replacement = new_mega_menu + '</div>\n        <!-- /SAVON STYLE MEGA MENU WRAPPER -->'
        
        if pattern.search(content):
            new_content = pattern.sub(replacement, content)
            
            # Update wrapper
            new_content = new_content.replace('<div class="has-mega-menu">', '<div class="has-mega-menu savon-mega-menu-wrapper">')
            
            with open(file, 'w', encoding='utf-8') as f:
                f.write(new_content)
            print(f'Updated {file}')
        else:
            print(f'Old header not found in {file}')
