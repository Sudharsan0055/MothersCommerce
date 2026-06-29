import glob
import os

theme_dir = 'mothers-theme'
php_files = glob.glob(os.path.join(theme_dir, '*.php'))

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

for filepath in php_files:
    # Skip header, footer, functions
    if os.path.basename(filepath) in ['header.php', 'footer.php', 'functions.php', 'index.php']:
        continue
        
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
        
    if "the_content()" not in content:
        # Inject the loop right after <main>
        new_content = content.replace('<main>', f'<main>\n{loop_code}')
        
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(new_content)
            print(f"Added the_content() loop to {os.path.basename(filepath)}")

print("Done injecting the_content() into templates.")
