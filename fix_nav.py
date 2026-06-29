import glob

html_files = glob.glob('*.html')

for filepath in html_files:
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # The desktop nav \1
    if '\\x01' in content:
        # replace \x01 before <!-- MEGA MENU WRAPPER -->
        content = content.replace('\\x01\\n        <!-- MEGA MENU WRAPPER -->', '<nav class="nav" id="desktopNav">\\n        <!-- MEGA MENU WRAPPER -->')
        # replace \x01 before <!-- MOBILE MEGA MENU -->
        content = content.replace('\\x01\\n    <!-- MOBILE MEGA MENU -->', '<div class="mobile-menu" id="mobileMenuOverlay">\\n    <!-- MOBILE MEGA MENU -->')
    elif '\\1' in content:
        content = content.replace('\\1\\n        <!-- MEGA MENU WRAPPER -->', '<nav class="nav" id="desktopNav">\\n        <!-- MEGA MENU WRAPPER -->')
        content = content.replace('\\1\\n    <!-- MOBILE MEGA MENU -->', '<div class="mobile-menu" id="mobileMenuOverlay">\\n    <!-- MOBILE MEGA MENU -->')

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)

print("Fixed \\1 in all html files.")
