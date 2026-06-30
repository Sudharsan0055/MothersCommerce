import re

# 1. Update CSS
with open('C:\\Users\\kamar\\recovered_css.txt', 'r', encoding='utf-8') as f:
    css_content = f.read().replace('---CHUNK---', '')

with open('assets/css/styles.css', 'r', encoding='utf-8') as f:
    current_css = f.read()

if '/* --- SAVON MEGA MENU STYLES --- */' not in current_css:
    with open('assets/css/styles.css', 'a', encoding='utf-8') as f:
        f.write('\n\n' + css_content)

# 2. Update HTML
with open('C:\\Users\\kamar\\recovered_all.txt', 'r', encoding='utf-8') as f:
    html_content = f.read().replace('---CHUNK---', '').strip()

with open('index.html', 'r', encoding='utf-8') as f:
    current_html = f.read()

# Replace the Catalog link
# Look for <li class="nav-item">...Catalog...</li> or similar
# Let's find: <a href="fragrances.html" class="nav-link">Catalog</a>
old_catalog = '<a href="fragrances.html" class="nav-link">Catalog</a>'

if old_catalog in current_html:
    current_html = current_html.replace(old_catalog, html_content)
    with open('index.html', 'w', encoding='utf-8') as f:
        f.write(current_html)
    print("Injected HTML successfully.")
else:
    print("Could not find old catalog link in index.html")

