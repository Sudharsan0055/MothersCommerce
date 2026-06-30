import re
with open('index.html', 'r', encoding='utf-8') as f:
    html = f.read()

start = html.find('<script>')
if start != -1:
    print(html[start:start+1000])
else:
    print("No script tags found")
