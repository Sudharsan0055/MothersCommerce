import os
import re

theme_dir = 'mothers-theme'
html_file = 'index.html'

with open(html_file, 'r', encoding='utf-8') as f:
    content = f.read()

loop_code = """
    <?php
    // Required for Elementor and standard WordPress content
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
"""

main_match = re.search(r'</header>\s*(.*?)\s*<footer', content, re.DOTALL)
if main_match:
    main_content = main_match.group(1)
    
    # Replace static asset links
    main_content = re.sub(r'src="\./assets/', 'src="<?php echo get_template_directory_uri(); ?>/assets/', main_content)
    main_content = re.sub(r'style="background-image:\s*url\(\'\./assets/', 'style="background-image: url(\'<?php echo get_template_directory_uri(); ?>/assets/', main_content)
    
    front_page_content = f"<?php get_header(); ?>\n{loop_code}\n{main_content}\n\n<?php get_footer(); ?>"
    
    with open(os.path.join(theme_dir, 'front-page.php'), 'w', encoding='utf-8') as f:
        f.write(front_page_content)
        print("Generated front-page.php with loop.")
else:
    print("Could not extract body from index.html")
