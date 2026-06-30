import re

with open('index.html', 'r', encoding='utf-8') as f:
    lines = f.readlines()

div_depth = 0
for i, line in enumerate(lines):
    # Find all <div ...> and </div> on this line
    open_divs = len(re.findall(r'<div\b[^>]*>', line))
    close_divs = len(re.findall(r'</div\s*>', line))
    
    div_depth += open_divs - close_divs
    
    if 2330 <= i <= 2340:
        print(f'Line {i+1}: depth={div_depth} line={line.strip()}')
