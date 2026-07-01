import io

with io.open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

bg_html = '''<div class="savon-mega-menu">
            <div class="savon-mega-menu-bg">
              <div class="mega-bg-layer active" id="bg-tab-cones" style="background-image: url('assets/images/frankincense.webp');"></div>
              <div class="mega-bg-layer" id="bg-tab-oils" style="background-image: url('assets/images/essential_oils_bottles_1781801723388.png');"></div>
              <div class="mega-bg-layer" id="bg-tab-perfume" style="background-image: url('assets/images/essence-1.webp');"></div>
            </div>'''

content = content.replace('<div class="savon-mega-menu">', bg_html, 1)

js_html = '''
  <script>
    // MEGA MENU DYNAMIC BACKGROUNDS
    document.addEventListener('DOMContentLoaded', function() {
      const tabs = document.querySelectorAll('.savon-tab');
      const bgLayers = document.querySelectorAll('.mega-bg-layer');

      tabs.forEach(tab => {
        tab.addEventListener('mouseenter', function() {
          const targetId = this.getAttribute('data-target').substring(1); // e.g., 'tab-cones'
          
          // Hide all backgrounds
          bgLayers.forEach(layer => layer.classList.remove('active'));
          
          // Show matching background
          const targetBg = document.getElementById('bg-' + targetId);
          if (targetBg) {
            targetBg.classList.add('active');
          }
        });
      });
    });
  </script>
</body>'''

content = content.replace('</body>', js_html)

with io.open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print("HTML updated")
