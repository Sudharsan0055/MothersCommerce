import glob

html_files = glob.glob('*.html')
old_favicon = '<link rel="icon" type="image/png" href="./assets/images/MF-logo-1.png">'
new_favicon = '<link rel="icon" type="image/webp" href="./assets/images/lotus-logo-golden.webp">'
# Let's also handle the case where it might be png if the browser doesn't support webp favicon,
# but modern browsers do. Alternatively, we can use the png.
new_favicon = '<link rel="icon" type="image/png" href="./assets/images/lotus-logo.png">'

count = 0
for filepath in html_files:
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    if old_favicon in content:
        content = content.replace(old_favicon, new_favicon)
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(content)
        count += 1
        print(f"Updated favicon to lotus-logo in {filepath}")

if count > 0:
    print(f"\\nSuccessfully updated favicon in {count} HTML files.")
else:
    print("\\nNo files were updated. Maybe the old favicon string didn't match.")
