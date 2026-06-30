import re

with open('index.html', 'r', encoding='utf-8') as f:
    lines = f.readlines()

div_depth = 0
for i, line in enumerate(lines):
    open_divs = len(re.findall(r'<div\b[^>]*>', line))
    close_divs = len(re.findall(r'</div\s*>', line))
    div_depth += open_divs - close_divs
    
    if 'id="tab-cones"' in line:
        print(f'Line {i+1} tab-cones START: depth={div_depth}')
    if 'id="tab-oils"' in line:
        print(f'Line {i+1} tab-oils START: depth={div_depth}')
