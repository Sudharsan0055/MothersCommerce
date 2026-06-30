import re

with open('index.html', 'r', encoding='utf-8') as f:
    html = f.read()

# Find the first mega menu
first_menu_match = re.search(r'<!-- SAVON STYLE MEGA MENU WRAPPER -->.*?<!-- /SAVON STYLE MEGA MENU WRAPPER -->', html, re.DOTALL)
if first_menu_match:
    first_menu = first_menu_match.group(0)
    
    # Replace everything from the first wrapper to the last wrapper with just the first wrapper
    # Using a non-greedy match that goes up to the LAST wrapper is tricky.
    # Instead, let's find the indices.
    start_idx = html.find('<!-- SAVON STYLE MEGA MENU WRAPPER -->')
    end_idx = html.rfind('<!-- /SAVON STYLE MEGA MENU WRAPPER -->') + len('<!-- /SAVON STYLE MEGA MENU WRAPPER -->')
    
    new_html = html[:start_idx] + first_menu + html[end_idx:]
    
    with open('index.html', 'w', encoding='utf-8') as f:
        f.write(new_html)
    print("Cleaned up duplicate menus and inline CSS.")
else:
    print("Could not find mega menu wrapper.")
