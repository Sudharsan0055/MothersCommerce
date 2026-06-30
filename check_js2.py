import re
with open('index.html', 'r', encoding='utf-8') as f:
    html = f.read()

start = html.find('<script>')
if start != -1:
    script_content = html[start:]
    import textwrap
    lines = script_content.split('\n')
    for i, line in enumerate(lines):
        if 'carousel' in line.lower() or 'savon-panel' in line.lower():
            print(f"{i-2}: {lines[i-2]}")
            print(f"{i-1}: {lines[i-1]}")
            print(f"{i}: {line}")
            print(f"{i+1}: {lines[i+1]}")
            print(f"{i+2}: {lines[i+2]}")
            print("---")
else:
    print("No script tags found")
