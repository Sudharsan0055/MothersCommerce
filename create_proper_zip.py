import os
import zipfile
import glob

# Core HTML files to include
core_files = [
    'index.html',
    'about-us.html',
    'incense.html',
    'cones.html',
    'essential-oil.html',
    'fragrances.html',
    'tapestry.html',
    'products.html',
    'ingredients.html',
    'contact.html'
]

zip_filename = 'Mothers_Clean_HTML_Site.zip'

if os.path.exists(zip_filename):
    os.remove(zip_filename)

with zipfile.ZipFile(zip_filename, 'w', zipfile.ZIP_DEFLATED) as zipf:
    for html_file in core_files:
        if os.path.exists(html_file):
            zipf.write(html_file, arcname=html_file)
            print(f"Added {html_file}")
        else:
            print(f"Warning: {html_file} not found")
            
    # Add assets directory
    for root, dirs, files in os.walk('assets'):
        for file in files:
            file_path = os.path.join(root, file)
            # Make sure we don't accidentally zip hidden git/gemini files if they are in assets
            if not '.git' in file_path and not '.gemini' in file_path:
                zipf.write(file_path, arcname=file_path)
                
print(f"Successfully created {zip_filename}")
