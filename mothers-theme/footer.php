<footer class="footer">
    <canvas id="footer-smoke-canvas" style="position: absolute; inset: 0; width: 100%; height: 100%; pointer-events: none; z-index: 1;"></canvas>
    <div class="container">
      <div class="footer-top">
        <div class="footer-brand">
          <a href="<?php echo home_url(); ?>" class="logo-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-logo-golden.webp" alt="The Mother's Fragrances Logo" class="logo-img" style="height: 38px; width: auto; margin-right: var(--space-xs); filter: drop-shadow(0px 2px 4px rgba(0,0,0,0.15));">
            <div class="logo-text">The Mother's Fragrances</div>
          </a>
          <p style="margin-top: var(--space-sm);">Manufacturers of 100% botanical, chemical-free incense sticks, cones, and essential oils. Sourced from nature, rolled by hand.</p>
        </div>
        
        <div>
          <h4>Explore</h4>
          <div class="footer-links">
            <a href="<?php echo home_url(); ?>">Home</a>
            <a href="<?php echo site_url('/about-us'); ?>">About Us</a>
            <a href="<?php echo site_url('/fragrances'); ?>">Fragrances</a>
            <a href="<?php echo site_url('/products'); ?>">Products</a>
            <a href="<?php echo site_url('/contact'); ?>">Contact</a>
          </div>
        </div>

        <div>
          <h4>Collections</h4>
          <div class="footer-links">
            <a href="<?php echo site_url('/incense'); ?>">Incense</a>
            <a href="<?php echo site_url('/cones'); ?>">Cones</a>
            <a href="<?php echo site_url('/essential-oil'); ?>">Essential Oils</a>
            <a href="<?php echo site_url('/tapestry'); ?>">Tapestry</a>
          </div>
        </div>

        <div class="footer-newsletter">
          <h4>Join Our Community</h4>
          <p>Subscribe for updates on our latest products and exclusive offers.</p>
          <form class="newsletter-form" onsubmit="event.preventDefault(); alert('Thank you for subscribing!'); this.reset();">
            <input type="email" placeholder="Your email address..." class="newsletter-input" required>
            <button type="submit" class="newsletter-btn" aria-label="Subscribe"><i class="fa-solid fa-arrow-right"></i></button>
          </form>
        </div>
      </div>

      <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> The Mother's Fragrances. All rights reserved.</p>
        <div class="footer-socials">
          <a href="https://www.instagram.com/mothers_fragrances/?hl=en" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="https://www.facebook.com/Mothersfragrances/" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js?v=19"></script>
  
  <?php wp_footer(); ?>
</body>
</html>
