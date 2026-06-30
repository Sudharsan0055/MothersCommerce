import re

with open('index.html', 'r', encoding='utf-8') as f:
    lines = f.readlines()

depth = 0
for i, line in enumerate(lines):
    open_divs = len(re.findall(r'<div\b[^>]*>', line))
    close_divs = len(re.findall(r'</div\s*>', line))
    depth += open_divs - close_divs
    if (i+1) in [2230, 2296, 2318, 2335]:
        print(f"Line {i+1}: Depth {depth} | {line.strip()}")
