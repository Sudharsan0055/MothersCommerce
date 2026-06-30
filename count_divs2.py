import re

with open('index.html', 'r', encoding='utf-8') as f:
    lines = f.readlines()

div_depth = 0
for i, line in enumerate(lines):
    if '<nav' in line:
        print(f'Nav at line {i+1} depth: {div_depth}')
    
    # Find all <div ...> and </div> on this line
    open_divs = len(re.findall(r'<div\b[^>]*>', line))
    close_divs = len(re.findall(r'</div\s*>', line))
    
    div_depth += open_divs - close_divs

