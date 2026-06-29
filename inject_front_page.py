import os

theme_dir = 'mothers-theme'
front_page = os.path.join(theme_dir, 'front-page.php')

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

with open(front_page, 'r', encoding='utf-8') as f:
    content = f.read()
    
if "the_content()" not in content:
    new_content = content.replace('<main>', f'<main>\n{loop_code}')
    
    with open(front_page, 'w', encoding='utf-8') as f:
        f.write(new_content)
        print("Added the_content() loop to front-page.php")

print("Done.")
