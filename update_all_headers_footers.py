import glob

logo_old_header = '<div class="logo-icon">M</div>'
logo_new_header = '<img src="./assets/images/lotus-logo-golden.webp" alt="Mothers Fragrances Logo" class="logo-img" style="height: 38px; width: auto; margin-right: var(--space-xs); filter: drop-shadow(0px 2px 4px rgba(0,0,0,0.15));">'

footer_old_tag = '<footer class="footer">\n    <div class="container">'
footer_old_tag_alt = '<footer class="footer">\r\n    <div class="container">'
footer_new_tag = '<footer class="footer">\n    <canvas id="footer-smoke-canvas" style="position: absolute; inset: 0; width: 100%; height: 100%; pointer-events: none; z-index: 1;"></canvas>\n    <div class="container">'

# Find all HTML files
html_files = glob.glob("*.html")

for filepath in html_files:
    if filepath == "index_original.html":
        continue
    print(f"Updating: {filepath}")
    with open(filepath, "r", encoding="utf-8") as f:
        content = f.read()

    # 1. Update header and footer logo-icons
    # We replace occurrences of <div class="logo-icon">M</div> with the image tag
    content = content.replace(logo_old_header, logo_new_header)

    # 2. Add canvas element to footer
    if footer_old_tag in content:
        content = content.replace(footer_old_tag, footer_new_tag)
    elif footer_old_tag_alt in content:
        content = content.replace(footer_old_tag_alt, footer_new_tag)
    else:
        # Fallback search/replace
        content = content.replace('<footer class="footer">', '<footer class="footer">\n    <canvas id="footer-smoke-canvas" style="position: absolute; inset: 0; width: 100%; height: 100%; pointer-events: none; z-index: 1;"></canvas>')

    with open(filepath, "w", encoding="utf-8") as f:
        f.write(content)

print("All HTML files updated successfully!")
