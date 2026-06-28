import glob

html_files = glob.glob("*.html")
for filepath in html_files:
    if filepath == "index_original.html":
        continue
    with open(filepath, "r", encoding="utf-8") as f:
        content = f.read()
    
    content = content.replace("Mothers Fragrances", "The Mother's Fragrances")
    content = content.replace("mothers fragrances", "The Mother's Fragrances")
    content = content.replace("Mothers fragrances", "The Mother's Fragrances")

    with open(filepath, "w", encoding="utf-8") as f:
        f.write(content)

print("Replaced 'Mothers Fragrances' with 'The Mother's Fragrances' in all HTML files.")
