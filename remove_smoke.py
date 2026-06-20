import glob
import re

# The canvas line to remove from HTML files
canvas_line = '    <canvas id="footer-smoke-canvas" style="position: absolute; inset: 0; width: 100%; height: 100%; pointer-events: none; z-index: 1;"></canvas>'

html_files = glob.glob("*.html")

for filepath in html_files:
    print(f"Processing: {filepath}")
    with open(filepath, "r", encoding="utf-8") as f:
        content = f.read()

    original = content

    # Remove canvas lines (handle both \n and \r\n)
    content = content.replace(canvas_line + '\n', '')
    content = content.replace(canvas_line + '\r\n', '')
    content = content.replace(canvas_line, '')

    # Also remove any footer inline style="position: relative;" that was added to footer tag
    # (from step 1156 which added inline style to footer tag)
    content = re.sub(r'<footer class="footer" style="position: relative;">', '<footer class="footer">', content)

    if content != original:
        with open(filepath, "w", encoding="utf-8") as f:
            f.write(content)
        print(f"  -> Cleaned smoke canvas from {filepath}")
    else:
        print(f"  -> No changes needed in {filepath}")

print("\nAll HTML files processed!")
