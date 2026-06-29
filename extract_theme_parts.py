import os
import re

theme_dir = 'mothers-theme'
html_file = 'index.html'

with open(html_file, 'r', encoding='utf-8') as f:
    content = f.read()

# --- Extract Header ---
# From <!DOCTYPE html> to closing </header>
header_match = re.search(r'(<!DOCTYPE html>.*?</header>)', content, re.DOTALL)
if header_match:
    header_content = header_match.group(1)
    
    # Replace static asset links with WordPress dynamic paths
    header_content = re.sub(r'href="\./assets/', 'href="<?php echo get_template_directory_uri(); ?>/assets/', header_content)
    header_content = re.sub(r'src="\./assets/', 'src="<?php echo get_template_directory_uri(); ?>/assets/', header_content)
    
    # Add wp_head() before </head>
    header_content = header_content.replace('</head>', '  <?php wp_head(); ?>\n</head>')
    
    with open(os.path.join(theme_dir, 'header.php'), 'w', encoding='utf-8') as f:
        f.write(header_content)
        
# --- Extract Footer ---
# From <footer id="mainFooter" ...> to </html>
footer_match = re.search(r'(<footer id="mainFooter".*?</html>)', content, re.DOTALL)
if footer_match:
    footer_content = footer_match.group(1)
    
    # Replace static asset links
    footer_content = re.sub(r'src="\./assets/', 'src="<?php echo get_template_directory_uri(); ?>/assets/', footer_content)
    
    # Add wp_footer() before </body>
    footer_content = footer_content.replace('</body>', '  <?php wp_footer(); ?>\n</body>')
    
    with open(os.path.join(theme_dir, 'footer.php'), 'w', encoding='utf-8') as f:
        f.write(footer_content)

# --- Extract Main Body (Front Page) ---
# Between </header> and <footer>
main_match = re.search(r'</header>\s*(<main.*?</main>)\s*<footer', content, re.DOTALL)
if main_match:
    main_content = main_match.group(1)
    
    # Replace static asset links
    main_content = re.sub(r'src="\./assets/', 'src="<?php echo get_template_directory_uri(); ?>/assets/', main_content)
    main_content = re.sub(r'style="background-image:\s*url\(\'\./assets/', 'style="background-image: url(\'<?php echo get_template_directory_uri(); ?>/assets/', main_content)
    
    front_page_content = f"<?php get_header(); ?>\n\n{main_content}\n\n<?php get_footer(); ?>"
    
    with open(os.path.join(theme_dir, 'front-page.php'), 'w', encoding='utf-8') as f:
        f.write(front_page_content)

# --- Create index.php (fallback) ---
index_php_content = """<?php get_header(); ?>
<main>
    <div class="container" style="padding-top: var(--header-height); min-height: 50vh;">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
        else :
            echo '<p>No content found</p>';
        endif;
        ?>
    </div>
</main>
<?php get_footer(); ?>
"""
with open(os.path.join(theme_dir, 'index.php'), 'w', encoding='utf-8') as f:
    f.write(index_php_content)

print("Generated header.php, footer.php, front-page.php, and index.php.")
