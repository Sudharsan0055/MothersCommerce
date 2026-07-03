import re
import os

core_files = [
    'about-us.html',
    'incense.html',
    'cones.html',
    'essential-oil.html',
    'fragrances.html',
    'tapestry.html',
    'products.html',
    'ingredients.html',
    'contact.html'
]

with open('index.html', 'r', encoding='utf-8') as f:
    index_html = f.read()

# Extract chunks from index.html
header_match = re.search(r'(<!-- Navigation Header -->.*?</header>)', index_html, re.DOTALL)
mobile_menu_match = re.search(r'(<!-- Mobile Drawer Menu -->.*?</div>\s*</div>\s*</div>)', index_html, re.DOTALL)
footer_match = re.search(r'(<footer class="footer">.*?</footer>)', index_html, re.DOTALL)

if not header_match or not mobile_menu_match or not footer_match:
    print("Could not extract one or more sections from index.html")
    exit(1)

header_content = header_match.group(1)
mobile_menu_content = mobile_menu_match.group(1)
footer_content = footer_match.group(1)

# The mobile menu regex might be a bit tricky depending on the exact divs.
# Let's use a simpler regex based on the exact start/end markers in index.html.
mobile_menu_match2 = re.search(r'(<!-- Mobile Drawer Menu -->\s*<div class="mobile-menu" id="mobileMenuOverlay">.*?</nav>\s*</div>\s*</div>\s*</div>\s*</div>\s*</div>)', index_html, re.DOTALL)
# Actually, the mobile drawer ends right before <main>
mobile_menu_alt = re.search(r'(<!-- Mobile Drawer Menu -->.*?)(\s*<main>)', index_html, re.DOTALL)
if mobile_menu_alt:
    mobile_menu_content = mobile_menu_alt.group(1)
else:
    print("Could not extract mobile menu via alternative regex")

print(f"Header length: {len(header_content)}")
print(f"Mobile Menu length: {len(mobile_menu_content)}")
print(f"Footer length: {len(footer_content)}")

for file in core_files:
    if not os.path.exists(file):
        continue
        
    with open(file, 'r', encoding='utf-8') as f:
        content = f.read()
        
    # Replace header
    content = re.sub(r'<!-- Navigation Header -->.*?</header>', header_content, content, flags=re.DOTALL)
    
    # Replace mobile menu
    content = re.sub(r'<!-- Mobile Drawer Menu -->.*?(?=\s*<main>)', mobile_menu_content, content, flags=re.DOTALL)
    
    # Replace footer
    content = re.sub(r'<footer class="footer">.*?</footer>', footer_content, content, flags=re.DOTALL)
    
    # Update CSS version
    content = re.sub(r'href="\./assets/css/styles\.css\?v=\d+"', 'href="./assets/css/styles.css?v=38"', content)
    
    with open(file, 'w', encoding='utf-8') as f:
        f.write(content)
        
    print(f"Successfully updated {file}")
