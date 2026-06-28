import glob
import re

html_files = glob.glob('*.html')

def reorder_links(match):
    prefix = match.group(1)
    inner = match.group(2)
    suffix = match.group(3)
    
    a_tags = re.findall(r'<a[^>]*>.*?</a>\s*', inner, re.DOTALL)
    
    home_tag = ""
    about_tag = ""
    fragrances_tag = ""
    products_tag = ""
    contact_tag = ""
    other_tags = []
    
    for tag in a_tags:
        # Avoid the "Enquire Now" button in mobile menu which also has contact.html
        if 'class="btn' in tag or 'btn-primary' in tag:
            other_tags.append(tag)
        elif 'index.html' in tag:
            home_tag = tag
        elif 'about' in tag:
            about_tag = tag
        elif 'fragrances.html' in tag or 'Ingredients' in tag: # ingredients.html is also used as fragrances in some pages
            fragrances_tag = tag
        elif 'products.html' in tag or 'Collections' in tag:
            products_tag = tag
        elif 'contact.html' in tag:
            contact_tag = tag
        else:
            other_tags.append(tag)
            
    new_inner = home_tag + fragrances_tag + products_tag + about_tag + contact_tag + "".join(other_tags)
    
    return prefix + new_inner + suffix

for filepath in html_files:
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    # Process desktop nav
    content = re.sub(r'(<nav class="nav" id="desktopNav">\s*)(.*?)(</nav>)', reorder_links, content, flags=re.DOTALL)
    
    # Process mobile nav
    content = re.sub(r'(<div class="mobile-menu" id="mobileMenuOverlay">\s*)(.*?)(</div>)', reorder_links, content, flags=re.DOTALL)
    
    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)
        
print("Menus reordered in all HTML files.")
