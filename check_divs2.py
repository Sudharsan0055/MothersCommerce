import re

with open('index.html', 'r', encoding='utf-8') as f:
    lines = f.readlines()

depth = 0
for i, line in enumerate(lines):
    open_divs = len(re.findall(r'<div\b[^>]*>', line))
    close_divs = len(re.findall(r'</div\s*>', line))
    depth += open_divs - close_divs
    if 2330 <= i + 1 <= 2345:
        print(f"Line {i+1}: Depth {depth} | {line.strip()}")
