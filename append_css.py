import io

new_css = """
/* --- MEGA MENU DYNAMIC BACKGROUND & ANIMATIONS --- */

.savon-mega-menu {
  /* Replace solid background with glassmorphism */
  background: rgba(253, 252, 248, 0.85) !important; /* light elegant cream */
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  overflow: hidden;
}

/* Container for dynamic backgrounds */
.savon-mega-menu-bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
  pointer-events: none;
}

/* Individual backgrounds */
.mega-bg-layer {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  background-position: center;
  opacity: 0;
  transition: opacity 0.6s ease-in-out, transform 4s ease-out;
  transform: scale(1.02);
}

.mega-bg-layer::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to right, rgba(253, 252, 248, 0.95) 30%, rgba(253, 252, 248, 0.75) 100%);
}

.mega-bg-layer.active {
  opacity: 1;
  transform: scale(1);
}

/* Hover micro-animations for list items */
.incense-list a, .savon-list a {
  position: relative;
  display: inline-block;
  transition: transform 0.3s ease, color 0.3s ease !important;
}

.incense-list a:hover, .savon-list a:hover {
  transform: translateX(6px);
  color: var(--color-gold) !important;
}

/* Image zoom on hover */
.incense-card, .savon-image-promo {
  overflow: hidden;
}

.incense-image-placeholder, .savon-image-promo img {
  transition: transform 0.8s ease !important;
}

.incense-card:hover .incense-image-placeholder, .savon-image-promo:hover img {
  transform: scale(1.08);
}

/* Staggered Entrance Animations */
.savon-sidebar {
  opacity: 0;
  transform: translateX(-20px);
  transition: opacity 0.5s ease 0.1s, transform 0.5s ease 0.1s;
}
.savon-content {
  opacity: 0;
  transform: translateY(15px);
  transition: opacity 0.5s ease 0.2s, transform 0.5s ease 0.2s;
}

.savon-mega-menu-wrapper:hover .savon-sidebar {
  opacity: 1;
  transform: translateX(0);
}
.savon-mega-menu-wrapper:hover .savon-content {
  opacity: 1;
  transform: translateY(0);
}

"""

with io.open('assets/css/styles.css', 'a', encoding='utf-8') as f:
    f.write(new_css)
print("CSS appended")
