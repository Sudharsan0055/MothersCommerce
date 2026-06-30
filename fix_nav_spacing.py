import re

with open('assets/css/styles.css', 'r', encoding='utf-8') as f:
    css = f.read()

# Replace .nav gap with explicit 2rem !important
css = re.sub(r'(\.nav\s*\{[^}]*?)gap:\s*var\(--space-xl\);', r'\1gap: 2rem !important;', css)

# Also add fallback margin to .nav-link
css = re.sub(r'(\.nav-link\s*\{)', r'\1\n  margin-left: 1.5rem;', css)

with open('assets/css/styles.css', 'w', encoding='utf-8') as f:
    f.write(css)

# Also check index.html to fix it inline just in case
with open('index.html', 'r', encoding='utf-8') as f:
    html = f.read()

# Make sure desktopNav has inline gap
html = html.replace('<nav class="nav" id="desktopNav">', '<nav class="nav" id="desktopNav" style="gap: 2rem;">')

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(html)

print("Spacing fixed")
