from bs4 import BeautifulSoup

filepath = r"C:\Users\kamar\.gemini\antigravity-ide\brain\4d64b738-c1d4-4065-9c96-cdfcd3a2a2fb\.system_generated\steps\1073\content.md"
with open(filepath, 'r', encoding='utf-8') as f:
    html = f.read()
    
# Remove markdown frontmatter
html = html.split('---', 1)[-1]

soup = BeautifulSoup(html, 'html.parser')

with open("about_us_extracted.txt", "w", encoding="utf-8") as out_f:
    for text_element in soup.find_all(['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p']):
        text = text_element.get_text(strip=True)
        if text:
            out_f.write(f"{text_element.name}: {text}\n")
