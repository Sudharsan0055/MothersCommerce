import os

files = [
    'about-us.html', 'incense.html', 'cones.html', 'essential-oil.html', 
    'fragrances.html', 'tapestry.html', 'products.html', 'ingredients.html', 'contact.html'
]

with open('index.html', 'r', encoding='utf-8') as f:
    idx = f.read()

# Extract from index.html safely
head_start = idx.find('<!-- Navigation Header -->')
head_end = idx.find('</header>') + len('</header>')
header = idx[head_start:head_end]

mob_start = idx.find('<!-- Mobile Drawer Menu -->')
mob_end = idx.find('<main>')
mobile = idx[mob_start:mob_end].strip() + '\n\n  '

foot_start = idx.find('<footer class="footer">')
foot_end = idx.find('</footer>') + len('</footer>')
footer = idx[foot_start:foot_end]

print(f"Header: {len(header)} chars, Mobile: {len(mobile)} chars, Footer: {len(footer)} chars")

for filename in files:
    if not os.path.exists(filename):
        continue
    with open(filename, 'r', encoding='utf-8') as f:
        c = f.read()
        
    # Replace header
    hs = c.find('<!-- Navigation Header -->')
    he = c.find('</header>') + len('</header>')
    if hs != -1 and he != -1:
        c = c[:hs] + header + c[he:]
        
    # Replace mobile menu
    ms = c.find('<!-- Mobile Drawer Menu -->')
    me = c.find('<main>')
    if ms != -1 and me != -1:
        c = c[:ms] + mobile + c[me:]
        
    # Replace footer
    fs = c.find('<footer class="footer">')
    fe = c.find('</footer>') + len('</footer>')
    if fs != -1 and fe != -1:
        c = c[:fs] + footer + c[fe:]
        
    # CSS cache bust
    import re
    c = re.sub(r'href="\./assets/css/styles\.css\?v=\d+"', 'href="./assets/css/styles.css?v=38"', c)
    
    with open(filename, 'w', encoding='utf-8') as f:
        f.write(c)
        
    print(f"Synced {filename}")
