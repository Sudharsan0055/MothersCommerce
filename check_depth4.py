import re

with open('index.html', 'r', encoding='utf-8') as f:
    lines = f.readlines()

div_depth = 0
for i, line in enumerate(lines):
    if 2073 <= i <= 2082:
        print(f'Line {i+1}: depth={div_depth} line={line.strip()}')
    
    open_divs = len(re.findall(r'<div\b[^>]*>', line))
    close_divs = len(re.findall(r'</div\s*>', line))
    div_depth += open_divs - close_divs
