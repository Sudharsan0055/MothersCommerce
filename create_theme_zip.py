import os
import zipfile

def create_theme_zip():
    zip_filename = 'mothers-theme-wp.zip'
    theme_dir = 'mothers-theme'
    
    print(f"Creating {zip_filename} with forward slashes...")
    
    with zipfile.ZipFile(zip_filename, 'w', zipfile.ZIP_DEFLATED) as zipf:
        for root, dirs, files in os.walk(theme_dir):
            for file in files:
                file_path = os.path.join(root, file)
                # Convert backslashes to forward slashes for the archive name
                # Keep 'mothers-theme/' prefix so WordPress extracts it into a folder
                arcname = file_path.replace(os.sep, '/')
                zipf.write(file_path, arcname)
                print(f"Added: {arcname}")
                
    print("WordPress Theme Zip created successfully.")

if __name__ == "__main__":
    create_theme_zip()
