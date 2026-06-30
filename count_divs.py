import re

with open('index.html', 'r', encoding='utf-8') as f:
    lines = f.readlines()

div_depth = 0
for i, line in enumerate(lines):
    # Find all <div ...> and </div> on this line
    open_divs = len(re.findall(r'<div\b[^>]*>', line))
    close_divs = len(re.findall(r'</div\s*>', line))
    
    # if line contains nav-link Home, let's see the depth!
    if 'class="nav-link">Home' in line:
        print(f'Line {i+1} depth: {div_depth} (Should be same as start of nav)')
    
    div_depth += open_divs - close_divs

print(f'Final depth: {div_depth}')
