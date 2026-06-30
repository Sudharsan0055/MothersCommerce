import re

with open('index.html', 'r', encoding='utf-8') as f:
    lines = f.readlines()

depth = 0
for i, line in enumerate(lines):
    open_divs = len(re.findall(r'<div\b[^>]*>', line))
    close_divs = len(re.findall(r'</div\s*>', line))
    depth += open_divs - close_divs
    if i + 1 == 2340:
        print(f"Depth at line 2340 (before Home): {depth}")
    
print(f"Final depth: {depth}")
