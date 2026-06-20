with open('index.html', 'r', encoding='utf-8') as f:
    lines = f.readlines()

print("Searching for 'heritage-slide' styling in index.html:")
for i, line in enumerate(lines):
    if 'heritage-slide' in line:
        print(f"{i+1}: {line.strip()}")

print("\nSearching for '.active' in index.html:")
for i, line in enumerate(lines):
    if '.active' in line:
        print(f"{i+1}: {line.strip()}")
