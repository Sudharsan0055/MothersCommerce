import os
import re

html_file = r'c:\Users\kamar\Downloads\Mothers\index.html'
with open(html_file, 'r', encoding='utf-8') as f:
    content = f.read()

# Split into header, main, and footer using regex
header_match = re.search(r'(.*?</header>)', content, re.DOTALL)
footer_match = re.search(r'(<footer.*)', content, re.DOTALL)

header = header_match.group(1)
footer = footer_match.group(1)

pages = {
    'about-us.html': ('About Us', 'Discover our story and legacy.'),
    'fragrances.html': ('Our Fragrances', 'Explore the art of pure scents.'),
    'products.html': ('All Products', 'Browse our complete catalog.'),
    'incense.html': ('Premium Incense', 'Hand-rolled natural incense sticks.'),
    'cones.html': ('Aromatic Cones', 'Intense and pure botanical cones.'),
    'essential-oil.html': ('Essential Oils', 'Concentrated natural perfume oils.'),
    'tapestry.html': ('Wall Tapestries', 'Artisanal bohemian wall decor.')
}

for filename, (title, desc) in pages.items():
    main_content = f"""
  <main>
    <section class="page-hero">
      <div class="container flex-center" style="flex-direction: column; text-align: center;">
        <h1 class="text-reveal-line">{title}</h1>
        <p class="reveal reveal-delay-1">{desc}</p>
      </div>
    </section>
    
    <section class="section" style="min-height: 40vh; display: flex; align-items: center; justify-content: center;">
      <div class="container text-center">
        <h2>Coming Soon</h2>
        <p style="margin-top: 1rem;">We are currently crafting this page. Please check back later.</p>
        <a href="index.html" class="btn btn-primary" style="margin-top: 2rem;">Back to Home</a>
      </div>
    </section>
  </main>
"""
    full_html = header + main_content + footer
    
    out_path = os.path.join(r'c:\Users\kamar\Downloads\Mothers', filename)
    with open(out_path, 'w', encoding='utf-8') as f:
        f.write(full_html)
        
print('Pages created successfully.')
