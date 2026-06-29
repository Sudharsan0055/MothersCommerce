import glob
import re

html_files = glob.glob('*.html')

for filepath in html_files:
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Cache bust styles.css properly
    content = re.sub(r'href="\./assets/css/styles\.css[^"]*"', 'href="./assets/css/styles.css?v=20"', content)
    
    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)

print("Properly cache busted styles.css in all HTML files.")
