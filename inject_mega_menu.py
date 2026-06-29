import glob
import re

html_files = glob.glob('*.html')

desktop_mega_menu_html = """
        <!-- MEGA MENU WRAPPER -->
        <div class="has-mega-menu" style="position: relative;">
          <a href="#" class="nav-link">Catalog <i class="fa-solid fa-angle-down" style="font-size: 0.8em; margin-left: 4px;"></i></a>
          
          <div class="mega-menu">
            <div class="mega-menu-column">
              <h3 class="mega-menu-heading">Shop by Product</h3>
              <ul class="mega-menu-list">
                <li><a href="incense.html">Incense Sticks</a></li>
                <li><a href="cones.html">Botanical Cones</a></li>
                <li><a href="essential-oil.html">Essential Oils</a></li>
                <li><a href="tapestry.html">Mandala Tapestries</a></li>
                <li><a href="products.html">View All Products</a></li>
              </ul>
            </div>
            
            <div class="mega-menu-column">
              <h3 class="mega-menu-heading">Shop by Fragrance</h3>
              <ul class="mega-menu-list">
                <li><a href="fragrances.html#floral">Floral Series</a></li>
                <li><a href="fragrances.html#woody">Woody & Earthy</a></li>
                <li><a href="fragrances.html#spicy">Spicy & Exotic</a></li>
                <li><a href="fragrances.html#sweet">Sweet & Resinous</a></li>
                <li><a href="ingredients.html">Our Natural Ingredients</a></li>
              </ul>
            </div>
            
            <div class="mega-menu-column">
              <div class="mega-menu-featured">
                <img src="./assets/images/incense_premium_bundle_1781801699731.png" alt="Featured Premium Collection">
                <div class="mega-menu-featured-content">
                  <h3>Premium Collection</h3>
                  <p>Discover our best-selling hand-rolled incense bundles.</p>
                  <a href="products.html" class="btn btn-primary" style="padding: 0.5rem 1.5rem; font-size: 0.9rem;">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /MEGA MENU WRAPPER -->
"""

mobile_mega_menu_html = """
    <!-- MOBILE MEGA MENU -->
    <div class="mobile-has-mega-menu" style="margin-bottom: 0.5rem;">
      <a href="#" class="nav-link" onclick="this.parentElement.classList.toggle('active'); return false;">
        Catalog <i class="fa-solid fa-angle-down"></i>
      </a>
      <div class="mobile-mega-menu">
        <div>
          <h4 class="mobile-mega-column-heading">Products</h4>
          <ul class="mobile-mega-list">
            <li><a href="incense.html">Incense Sticks</a></li>
            <li><a href="cones.html">Botanical Cones</a></li>
            <li><a href="essential-oil.html">Essential Oils</a></li>
            <li><a href="tapestry.html">Tapestries</a></li>
          </ul>
        </div>
        <div style="margin-top: 1rem;">
          <h4 class="mobile-mega-column-heading">Fragrances</h4>
          <ul class="mobile-mega-list">
            <li><a href="fragrances.html">All Fragrances</a></li>
            <li><a href="ingredients.html">Ingredients</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /MOBILE MEGA MENU -->
"""

for filepath in html_files:
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
        
    if '<!-- MEGA MENU WRAPPER -->' in content:
        continue
        
    # Inject into Desktop Navigation before Home
    # The desktop nav starts with <nav class="nav" id="desktopNav"> and then <a href="index.html"
    content = re.sub(
        r'(<nav class="nav" id="desktopNav">\s*)',
        r'\\1' + desktop_mega_menu_html,
        content,
        count=1
    )
    
    # Inject into Mobile Navigation before Home
    # The mobile nav starts with <div class="mobile-menu" id="mobileMenuOverlay"> and then <a href="index.html"
    content = re.sub(
        r'(<div class="mobile-menu" id="mobileMenuOverlay">\s*)',
        r'\\1' + mobile_mega_menu_html,
        content,
        count=1
    )
    
    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)
    print(f"Injected Mega Menu into {filepath}")

print("Injection complete.")
