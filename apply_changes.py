import re

# 1. Update CSS
with open('recovered_css.txt', 'r', encoding='utf-8') as f:
    css_content = f.read().replace('---CHUNK---', '')

with open('assets/css/styles.css', 'r', encoding='utf-8') as f:
    current_css = f.read()

if '/* --- SAVON MEGA MENU STYLES --- */' not in current_css:
    with open('assets/css/styles.css', 'a', encoding='utf-8') as f:
        f.write('\n\n' + css_content)

# 2. Update HTML
with open('recovered_all.txt', 'r', encoding='utf-8') as f:
    html_content = f.read().replace('---CHUNK---', '')

with open('index.html', 'r', encoding='utf-8') as f:
    current_html = f.read()

# The old catalog link might look like:
# <a href="fragrances.html" class="nav-link">Catalog</a>
# or <li class="nav-item">...</li>
# Let's just find the exact block in index.html to replace

# Let's write the html_content to a separate file so we can just use replace_file_content if we want, or do it in python
with open('menu_html_raw.txt', 'w', encoding='utf-8') as f:
    f.write(html_content)

