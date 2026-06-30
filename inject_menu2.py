import re

with open('C:\\Users\\kamar\\recovered_all.txt', 'r', encoding='utf-8') as f:
    html_content = f.read().replace('---CHUNK---', '').strip()

with open('index.html', 'r', encoding='utf-8') as f:
    current_html = f.read()

# Replace the block
pattern = re.compile(r'<!-- MEGA MENU WRAPPER -->.*?<!-- /MEGA MENU WRAPPER -->', re.DOTALL)
if pattern.search(current_html):
    new_html = pattern.sub(html_content, current_html)
    with open('index.html', 'w', encoding='utf-8') as f:
        f.write(new_html)
    print("Injected HTML successfully.")
else:
    print("Could not find the mega menu wrapper in index.html")
