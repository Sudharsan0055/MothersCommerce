import os

with open('contact.html', 'r', encoding='utf-8') as f:
    content = f.read()

# I will replace the SVG map background with a CSS spinning globe
old_svg_part = """<svg viewBox="0 0 1000 500" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;">
          <defs>
            <linearGradient id="lineGrad" x1="0%" y1="0%" x2="100%" y2="100%">
              <stop offset="0%" stop-color="var(--color-terracotta)" stop-opacity="0.2" />
              <stop offset="100%" stop-color="var(--color-gold)" stop-opacity="0.8" />
            </linearGradient>
            <linearGradient id="lineGradReverse" x1="100%" y1="100%" x2="0%" y2="0%">
              <stop offset="0%" stop-color="var(--color-terracotta)" stop-opacity="0.2" />
              <stop offset="100%" stop-color="var(--color-gold)" stop-opacity="0.8" />
            </linearGradient>
          </defs>
          
          <!-- Connections from Hub (680, 200) to Nodes -->
          <!-- To USA (220, 150) -->
          <path d="M 680 200 Q 450 50 220 150" fill="transparent" stroke="url(#lineGradReverse)" stroke-width="2" stroke-dasharray="8,8">
            <animate attributeName="stroke-dashoffset" values="100;0" dur="3s" repeatCount="indefinite" />
          </path>
          
          <!-- To UK (450, 125) -->
          <path d="M 680 200 Q 560 120 450 125" fill="transparent" stroke="url(#lineGradReverse)" stroke-width="2" stroke-dasharray="8,8">
            <animate attributeName="stroke-dashoffset" values="100;0" dur="2.5s" repeatCount="indefinite" />
          </path>
          
          <!-- To Netherlands (490, 135) -->
          <path d="M 680 200 Q 580 140 490 135" fill="transparent" stroke="url(#lineGradReverse)" stroke-width="2" stroke-dasharray="8,8">
            <animate attributeName="stroke-dashoffset" values="100;0" dur="2s" repeatCount="indefinite" />
          </path>

          <!-- To Australia (860, 400) -->
          <path d="M 680 200 Q 750 350 860 400" fill="transparent" stroke="url(#lineGrad)" stroke-width="2" stroke-dasharray="8,8">
            <animate attributeName="stroke-dashoffset" values="0;100" dur="2.5s" repeatCount="indefinite" />
          </path>
        </svg>"""

new_globe_part = """
        <!-- 3D CSS Spinning Globe -->
        <style>
          .css-globe {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 800px;
            height: 800px;
            border-radius: 50%;
            background: url('https://unpkg.com/three-globe/example/img/earth-dark.jpg');
            background-size: cover;
            box-shadow: inset -50px -50px 100px rgba(0,0,0,0.8), inset 20px 20px 50px rgba(255,255,255,0.1), 0 0 30px rgba(212, 175, 55, 0.2);
            animation: spinGlobe 30s linear infinite;
            opacity: 0.6;
            pointer-events: none;
          }
          
          /* Abstract connections overlay */
          .globe-overlay-lines {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
          }

          @keyframes spinGlobe {
            from { background-position: 0 0; }
            to { background-position: 200% 0; }
          }
        </style>
        
        <div class="css-globe"></div>

        <!-- SVG Map Background & Connections -->
        <svg viewBox="0 0 1000 500" class="globe-overlay-lines">
          <defs>
            <linearGradient id="lineGrad" x1="0%" y1="0%" x2="100%" y2="100%">
              <stop offset="0%" stop-color="var(--color-terracotta)" stop-opacity="0.1" />
              <stop offset="100%" stop-color="var(--color-gold)" stop-opacity="0.9" />
            </linearGradient>
            <linearGradient id="lineGradReverse" x1="100%" y1="100%" x2="0%" y2="0%">
              <stop offset="0%" stop-color="var(--color-terracotta)" stop-opacity="0.1" />
              <stop offset="100%" stop-color="var(--color-gold)" stop-opacity="0.9" />
            </linearGradient>
          </defs>
          
          <!-- Connections from Hub (680, 200) to Nodes -->
          <path d="M 680 200 Q 450 50 220 150" fill="transparent" stroke="url(#lineGradReverse)" stroke-width="2.5" stroke-dasharray="8,8">
            <animate attributeName="stroke-dashoffset" values="100;0" dur="3s" repeatCount="indefinite" />
          </path>
          <path d="M 680 200 Q 560 120 450 125" fill="transparent" stroke="url(#lineGradReverse)" stroke-width="2.5" stroke-dasharray="8,8">
            <animate attributeName="stroke-dashoffset" values="100;0" dur="2.5s" repeatCount="indefinite" />
          </path>
          <path d="M 680 200 Q 580 140 490 135" fill="transparent" stroke="url(#lineGradReverse)" stroke-width="2.5" stroke-dasharray="8,8">
            <animate attributeName="stroke-dashoffset" values="100;0" dur="2s" repeatCount="indefinite" />
          </path>
          <path d="M 680 200 Q 750 350 860 400" fill="transparent" stroke="url(#lineGrad)" stroke-width="2.5" stroke-dasharray="8,8">
            <animate attributeName="stroke-dashoffset" values="0;100" dur="2.5s" repeatCount="indefinite" />
          </path>
        </svg>
"""

if old_svg_part in content:
    new_content = content.replace(old_svg_part, new_globe_part)
    with open('contact.html', 'w', encoding='utf-8') as f:
        f.write(new_content)
    print("Globe injected successfully.")
else:
    print("Could not find the SVG part.")
