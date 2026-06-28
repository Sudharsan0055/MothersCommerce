import glob
import re

html_files = glob.glob("*.html")
for filepath in html_files:
    if filepath == "index_original.html":
        continue
    with open(filepath, "r", encoding="utf-8") as f:
        content = f.read()
    
    # We replace the specific span in the logo-text
    # Using regex to handle potential whitespace variations
    content = re.sub(r'\n\s*<span>Pure Aromas</span>', '', content)

    with open(filepath, "w", encoding="utf-8") as f:
        f.write(content)

print("Removed 'Pure Aromas' span from the header in all HTML files.")
