import glob
import re

html_files = glob.glob('*.html')

for filepath in html_files:
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # regex replace \1 with <nav class="nav" id="desktopNav"> when it's right before <!-- MEGA MENU WRAPPER -->
    content = re.sub(r'(?:\\x01|\\1)\s*<!-- MEGA MENU WRAPPER -->', '<nav class="nav" id="desktopNav">\\n        <!-- MEGA MENU WRAPPER -->', content)
    
    content = re.sub(r'(?:\\x01|\\1)\s*<!-- MOBILE MEGA MENU -->', '<div class="mobile-menu" id="mobileMenuOverlay">\\n    <!-- MOBILE MEGA MENU -->', content)

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)

print("Fixed nav structures.")
