import re

with open('assets/css/styles.css', 'r', encoding='utf-8') as f:
    css = f.read()

# Remove the old gap fix
css = css.replace('''/* --- FIX MEGA MENU GAP --- */
.has-mega-menu {
  /* Extend the hover area down to the absolute menu so it doesn't close when moving mouse */
  padding-bottom: 40px;
  margin-bottom: -40px;
}''', '')

# Ensure has-mega-menu is inline-flex or block so it behaves nicely in the flex nav
css = css.replace('''
.has-mega-menu {
  position: static; /* Let the mega menu position relative to the nearest positioned ancestor (usually the header container) */
}''', '''
.has-mega-menu {
  position: static; 
  display: flex;
  align-items: center;
}

/* Use a pseudo-element on the link to bridge the gap to the absolute mega menu */
.has-mega-menu > a::after {
  content: '';
  position: absolute;
  top: 100%;
  left: -20px;
  right: -20px;
  height: 50px;
  background: transparent;
}
''')

# Also, the mega menu should probably not have top: 100% relative to the header container if it's too far down.
# Let's adjust top to a fixed value from the header if needed, but top: 100% on header .container is fine as long as the gap is bridged.

with open('assets/css/styles.css', 'w', encoding='utf-8') as f:
    f.write(css)

print("Fixed CSS for mega menu gap bridge.")
