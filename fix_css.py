import re

with open('assets/css/styles.css', 'r', encoding='utf-8') as f:
    css = f.read()

# Add position: relative to the a tag
pattern_wrapper = r'(\.savon-mega-menu-wrapper\s*\{\s*position:\s*static;\s*display:\s*flex;\s*align-items:\s*center;\s*\})'
replacement = r'\1\n\n.savon-mega-menu-wrapper > a {\n  position: relative;\n}'

if re.search(pattern_wrapper, css):
    css = re.sub(pattern_wrapper, replacement, css)
    with open('assets/css/styles.css', 'w', encoding='utf-8') as f:
        f.write(css)
    print("Fixed hover CSS bug")
else:
    print("Could not find the wrapper in CSS")
