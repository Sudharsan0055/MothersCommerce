import glob

html_files = glob.glob('*.html')

for filepath in html_files:
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Cache bust styles.css
    content = content.replace('href="./assets/css/styles.css"', 'href="./assets/css/styles.css?v=2.1"')
    content = content.replace('href="./assets/css/styles.css?v=2.0"', 'href="./assets/css/styles.css?v=2.1"')
    content = content.replace('href="assets/css/styles.css"', 'href="./assets/css/styles.css?v=2.1"')

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)

print("Cache busted styles.css in all HTML files.")
