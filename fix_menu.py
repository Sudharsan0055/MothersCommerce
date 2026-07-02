import os
import glob

html_files = glob.glob('*.html')

menu_html = """
  <!-- Mobile Drawer Menu -->
  <div class="mobile-menu" id="mobileMenuOverlay">
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
    <a href="index.html" class="nav-link">Home</a>
    <a href="fragrances.html" class="nav-link">Fragrances</a>
    <a href="products.html" class="nav-link">Products</a>
    <a href="about-us.html" class="nav-link">About Us</a>
    <a href="contact.html" class="nav-link">Contact</a>
    <a href="contact.html" class="btn btn-primary" style="margin-top: var(--space-md);">Enquire Now</a>
  </div>
"""

for file in html_files:
    with open(file, 'r', encoding='utf-8') as f:
        content = f.read()
    
    if 'class="mobile-menu"' not in content:
        print(f"Fixing {file}")
        # Insert after </header>
        content = content.replace('</header>', '</header>' + menu_html)
        with open(file, 'w', encoding='utf-8') as f:
            f.write(content)
    else:
        print(f"Already has menu: {file}")
