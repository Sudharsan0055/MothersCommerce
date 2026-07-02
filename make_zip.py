import zipfile
import os
import glob

zip_filename = 'LIVE_DEPLOY_MOTHERS.zip'

if os.path.exists(zip_filename):
    os.remove(zip_filename)

# Only include the pure static HTML pages and required web assets
allowed_html = [
    'index.html',
    'about-us.html',
    'fragrances.html',
    'products.html',
    'contact.html',
    'ingredients.html',
    'tapestry.html',
    'incense.html',
    'cones.html',
    'essential-oil.html'
]

with zipfile.ZipFile(zip_filename, 'w', zipfile.ZIP_DEFLATED) as zf:
    # Add pure HTML files
    for html_file in allowed_html:
        if os.path.exists(html_file):
            zf.write(html_file, arcname=html_file)
            print(f"Added HTML: {html_file}")
            
    # Add assets directory with forward slashes (Linux/Hostinger POSIX compliant)
    for root, dirs, files in os.walk('assets'):
        for file in files:
            full_path = os.path.join(root, file)
            arcname = full_path.replace(os.sep, '/')
            zf.write(full_path, arcname=arcname)
            print(f"Added Asset: {arcname}")

print(f"\nSuccessfully created pure HTML/CSS/JS deployment package: {zip_filename}")
