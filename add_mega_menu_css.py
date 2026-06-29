with open('assets/css/styles.css', 'a', encoding='utf-8') as f:
    f.write('''
/* --- MEGA MENU STYLES --- */
.has-mega-menu {
  position: static; /* Let the mega menu position relative to the nearest positioned ancestor (usually the header container) */
}

.mega-menu {
  position: absolute;
  top: 100%;
  left: 0;
  width: 100%;
  background: var(--color-bg);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  padding: 3rem;
  opacity: 0;
  visibility: hidden;
  transform: translateY(15px);
  transition: opacity 0.4s ease, transform 0.4s ease, visibility 0.4s;
  z-index: 1000;
  border-top: 2px solid var(--color-gold);
  
  display: grid;
  grid-template-columns: 1fr 1fr 1.2fr;
  gap: 3rem;
  align-items: start;
}

/* On hover of the parent, show the mega menu */
.has-mega-menu:hover .mega-menu {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}

.mega-menu-column {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.mega-menu-heading {
  font-family: var(--font-serif);
  font-size: 1.5rem;
  color: var(--color-primary);
  border-bottom: 1px solid var(--color-border);
  padding-bottom: 0.5rem;
  margin-bottom: 0.5rem;
}

.mega-menu-list {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
}

.mega-menu-list li a {
  font-family: var(--font-sans);
  color: var(--color-text-main);
  text-decoration: none;
  font-size: 0.95rem;
  transition: color 0.3s ease, transform 0.3s ease;
  display: inline-block;
}

.mega-menu-list li a:hover {
  color: var(--color-terracotta);
  transform: translateX(5px);
}

/* Featured Column */
.mega-menu-featured {
  position: relative;
  border-radius: var(--radius-sm);
  overflow: hidden;
  height: 100%;
  min-height: 250px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.mega-menu-featured img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: 1;
  transition: transform 0.6s ease;
}

.mega-menu-featured:hover img {
  transform: scale(1.05);
}

.mega-menu-featured::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0.2));
  z-index: 2;
}

.mega-menu-featured-content {
  position: relative;
  z-index: 3;
  text-align: center;
  color: #fff;
  padding: 2rem;
}

.mega-menu-featured-content h3 {
  font-family: var(--font-serif);
  font-size: 1.8rem;
  margin-bottom: 0.5rem;
  color: var(--color-gold);
}

.mega-menu-featured-content p {
  font-size: 0.9rem;
  margin-bottom: 1rem;
  color: #f0f0f0;
}

/* Ensure the parent nav wrapper can contain the mega menu absolutely */
.header .container {
  position: relative;
}

/* Mobile Mega Menu Adjustments */
.mobile-has-mega-menu > a {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.mobile-mega-menu {
  display: none;
  padding-left: 1rem;
  margin-top: 1rem;
  border-left: 2px solid var(--color-border);
}

.mobile-has-mega-menu.active .mobile-mega-menu {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.mobile-mega-column-heading {
  font-family: var(--font-serif);
  color: var(--color-primary);
  font-size: 1.2rem;
  margin-bottom: 0.5rem;
}

.mobile-mega-list {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.mobile-mega-list a {
  font-size: 0.9rem;
  color: var(--color-text-light);
  text-decoration: none;
}
''')
print("CSS updated.")
