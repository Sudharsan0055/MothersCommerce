import os

pages = [
    'index.html','about.html','about-us.html','contact.html',
    'cones.html','essential-oil.html','fragrances.html',
    'incense.html','ingredients.html','products.html','tapestry.html'
]

root = r'c:\Users\kamar\Downloads\Mothers'

for page in pages:
    path = os.path.join(root, page)
    with open(path, 'r', encoding='utf-8') as f:
        lines = f.readlines()

    out = []
    in_header = False
    in_mobile = False
    header_replaced = False
    footer_replaced = False
    i = 0

    while i < len(lines):
        line = lines[i]
        stripped = line.strip()

        # ── Header block: from <!-- Navigation Header --> to </header> ──
        if not header_replaced and '<!-- Navigation Header -->' in line:
            out.append('  <div id="site-header"></div>\n')
            in_header = True
            depth = 0
            i += 1
            continue

        if in_header:
            depth += stripped.count('<header')
            depth -= stripped.count('</header>')
            if '</header>' in stripped and depth <= 0:
                in_header = False
                in_mobile = True  # next: skip mobile drawer
            i += 1
            continue

        # ── Mobile drawer: skip from <!-- Mobile Drawer --> to closing </div> ──
        if in_mobile:
            mob_depth = 0
            j = i
            # Find the start of the mobile-menu div
            while j < len(lines):
                l = lines[j]
                if 'mobile-menu' in l and '<div' in l:
                    break
                j += 1
            # Now count divs to find its closing </div>
            while j < len(lines):
                l = lines[j]
                mob_depth += l.count('<div') - l.count('</div>')
                j += 1
                if mob_depth <= 0:
                    break
            i = j
            in_mobile = False
            header_replaced = True
            continue

        # ── Footer comment line: skip it ──
        if '<!-- Footer -->' in line and not footer_replaced:
            i += 1
            continue

        # ── Footer block: from <footer class="footer"> to </footer> ──
        if not footer_replaced and '<footer class="footer"' in line:
            out.append('  <div id="site-footer"></div>\n')
            while i < len(lines):
                if '</footer>' in lines[i]:
                    i += 1
                    break
                i += 1
            footer_replaced = True
            continue

        # ── Inject includes.js before main.js ──
        if '<script' in line and 'main.js' in line and 'includes.js' not in line:
            out.append('  <script src="./assets/js/includes.js"></script>\n')

        out.append(line)
        i += 1

    with open(path, 'w', encoding='utf-8') as f:
        f.writelines(out)

    h = 'YES' if header_replaced else 'NO '
    ft = 'YES' if footer_replaced else 'NO '
    print(f'{page:25s}  header={h}  footer={ft}')

print('\nAll done.')
