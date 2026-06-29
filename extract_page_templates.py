import os
import glob
import re

theme_dir = 'mothers-theme'
html_files = glob.glob('*.html')
# Exclude index.html as we already processed it
html_files = [f for f in html_files if f != 'index.html' and f != 'live_index.html']

for html_file in html_files:
    page_name = os.path.splitext(html_file)[0]
    template_name = f'page-{page_name}.php'
    
    with open(html_file, 'r', encoding='utf-8') as f:
        content = f.read()
        
    # Extract just the <main> block
    main_match = re.search(r'(<main.*?</main>)', content, re.DOTALL)
    if main_match:
        main_content = main_match.group(1)
        
        # Replace static asset links
        main_content = re.sub(r'src="\./assets/', 'src="<?php echo get_template_directory_uri(); ?>/assets/', main_content)
        main_content = re.sub(r'style="background-image:\s*url\(\'\./assets/', 'style="background-image: url(\'<?php echo get_template_directory_uri(); ?>/assets/', main_content)
        
        # Add standard WordPress Template Name header
        header_comment = f"<?php\n/*\nTemplate Name: {page_name.replace('-', ' ').title()} Page\n*/\nget_header();\n?>\n\n"
        
        footer_comment = "\n\n<?php get_footer(); ?>"
        
        final_content = header_comment + main_content + footer_comment
        
        with open(os.path.join(theme_dir, template_name), 'w', encoding='utf-8') as f:
            f.write(final_content)
            
print("Generated page templates.")
