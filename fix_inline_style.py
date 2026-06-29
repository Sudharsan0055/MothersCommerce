import glob
import re

html_files = glob.glob('*.html')

for filepath in html_files:
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    # Remove inline style from has-mega-menu
    content = content.replace('<div class="has-mega-menu" style="position: relative;">', '<div class="has-mega-menu">')
    
    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)

print("Removed inline position:relative from has-mega-menu.")
