import re

with open('assets/css/styles.css', 'r', encoding='utf-8') as f:
    css = f.read()

# Replace the pseudo-element to use ::before instead of ::after so it doesn't conflict with the nav-link hover underline
css = css.replace('.has-mega-menu > a::after {', '.has-mega-menu > a::before {')

with open('assets/css/styles.css', 'w', encoding='utf-8') as f:
    f.write(css)

print("Fixed pseudo-element conflict.")
