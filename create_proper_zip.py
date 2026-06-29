import os
import zipfile
import glob

def create_deploy_zip():
    zip_filename = 'mothers_fragrances_deploy.zip'
    print(f"Creating {zip_filename} with forward slashes...")
    
    with zipfile.ZipFile(zip_filename, 'w', zipfile.ZIP_DEFLATED) as zipf:
        # Add HTML files
        html_files = glob.glob('*.html')
        for file in html_files:
            zipf.write(file, file)
            print(f"Added: {file}")
            
        # Add assets folder
        for root, dirs, files in os.walk('assets'):
            for file in files:
                file_path = os.path.join(root, file)
                # Convert backslashes to forward slashes for the archive name
                arcname = file_path.replace(os.sep, '/')
                zipf.write(file_path, arcname)
                print(f"Added: {arcname}")
                
    print("Zip created successfully.")

if __name__ == "__main__":
    create_deploy_zip()
