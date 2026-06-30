import os
import re

files = ['about-us.html', 'about.html', 'cones.html', 'contact.html', 'essential-oil.html', 'fragrances.html', 'incense.html', 'ingredients.html', 'products.html', 'tapestry.html']

with open('index.html', 'r', encoding='utf-8') as f:
    idx_html = f.read()
    start_tag = '<!-- MEGA MENU WRAPPER -->'
    end_tag = '<!-- /SAVON STYLE MEGA MENU WRAPPER -->'
    start_idx = idx_html.find(start_tag)
    end_idx = idx_html.find(end_tag) + len(end_tag)
    new_mega_menu_block = idx_html[start_idx:end_idx]

for file in files:
    if os.path.exists(file):
        with open(file, 'r', encoding='utf-8') as f:
            content = f.read()
            
        start_tag_old = '<!-- MEGA MENU WRAPPER -->'
        end_tag_old = '<!-- /MEGA MENU WRAPPER -->'
        start_idx_old = content.find(start_tag_old)
        end_idx_old = content.find(end_tag_old) + len(end_tag_old)
        
        if start_idx_old != -1 and end_idx_old != -1:
            old_block = content[start_idx_old:end_idx_old]
            content = content.replace(old_block, new_mega_menu_block)
            with open(file, 'w', encoding='utf-8') as f:
                f.write(content)
            print(f"Updated {file}")
        else:
            print(f"Could not find old block in {file}")
