import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# find all style tags
style_tags = re.findall(r'<style>.*?</style>', content, re.DOTALL)
print(f"Found {len(style_tags)} style tags")

for i, tag in enumerate(style_tags):
    # find lines with heritage or h-slide
    lines = tag.split('\n')
    matching_lines = []
    for j, line in enumerate(lines):
        if 'heritage' in line.lower() or 'h-slide' in line.lower() or 'slide' in line.lower():
            matching_lines.append((j, line))
    if matching_lines:
        print(f"\nStyle tag {i} has matching lines:")
        for idx, line in matching_lines:
            # print surrounding lines
            start = max(0, idx - 2)
            end = min(len(lines), idx + 3)
            print(f"--- line {idx} ---")
            for k in range(start, end):
                print(f"{k}: {lines[k]}")
