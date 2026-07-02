import zipfile
import os
import glob

zip_filename = 'LIVE_DEPLOY_MOTHERS.zip'

if os.path.exists(zip_filename):
    os.remove(zip_filename)

with zipfile.ZipFile(zip_filename, 'w', zipfile.ZIP_DEFLATED) as zf:
    # Add HTML files
    for html_file in glob.glob('*.html'):
        if html_file != 'index_original.html':
            zf.write(html_file, arcname=html_file)
            print(f"Added {html_file}")
            
    # Add assets directory with forward slashes
    for root, dirs, files in os.walk('assets'):
        for file in files:
            full_path = os.path.join(root, file)
            # Ensure POSIX forward slash for archive path
            arcname = full_path.replace(os.sep, '/')
            zf.write(full_path, arcname=arcname)
            print(f"Added {arcname}")

print(f"\nSuccessfully created {zip_filename} with POSIX paths!")
