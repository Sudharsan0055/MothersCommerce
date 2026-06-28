import re
import os

files_to_update = {
    'fragrances.html': {
        'title': 'Discover Our Fragrances',
        'subtitle': 'Immerse yourself in nature’s pure essence, captured perfectly in every stick.',
        'image': './assets/images/lavender_incense.webp'
    },
    'products.html': {
        'title': 'Our Collections',
        'subtitle': 'Browse our exclusive catalog of pure botanical incense, cones, and lifestyle products.',
        'image': './assets/images/incense_premium_bundle_1781801699731.png'
    },
    'about-us.html': {
        'title': 'Our Story',
        'subtitle': 'A timeless journey of purity, tradition, and global reach starting from Pondicherry.',
        'image': './assets/images/handmade_incense.webp'
    }
}

for filename, info in files_to_update.items():
    if not os.path.exists(filename):
        print(f"Skipping {filename}, not found.")
        continue
        
    with open(filename, 'r', encoding='utf-8') as f:
        content = f.read()

    # The existing hero section starts with <section class="page-hero" and ends with </section>
    # We will use regex to find and replace it
    pattern = r'<section class="page-hero".*?</section>'
    
    new_hero = f"""<!-- Hero Section (Parallax) -->
    <section class="hero" style="background-image: url('{info['image']}'); height: 60vh; position: relative; display: flex; align-items: center; justify-content: center; text-align: center; background-size: cover; background-position: center; background-attachment: fixed;">
      <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.5);"></div>
      <div class="container" style="position: relative; z-index: 2;">
        <h1 class="reveal" style="color: #ffffff; font-size: 4rem; margin-bottom: 1rem; text-shadow: 0 4px 12px rgba(0,0,0,0.5); font-family: var(--font-serif);">{info['title']}</h1>
        <p class="reveal reveal-delay-1" style="color: #f0f0f0; max-width: 600px; margin: 0 auto; font-size: 1.25rem; text-shadow: 0 2px 6px rgba(0,0,0,0.5);">{info['subtitle']}</p>
      </div>
    </section>"""
    
    new_content, count = re.subn(pattern, new_hero, content, flags=re.DOTALL)
    
    if count > 0:
        with open(filename, 'w', encoding='utf-8') as f:
            f.write(new_content)
        print(f"Successfully updated hero in {filename}.")
    else:
        print(f"Could not find .page-hero in {filename}.")
