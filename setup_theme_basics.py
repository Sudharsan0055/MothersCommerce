import os
import shutil

theme_dir = 'mothers-theme'
if not os.path.exists(theme_dir):
    os.makedirs(theme_dir)

# 1. Create style.css
style_css_content = """/*
Theme Name: The Mother's Fragrances
Author: Auto Generated
Description: Custom WordPress theme for The Mother's Fragrances.
Version: 1.0
Text Domain: mothers
*/
"""
with open(os.path.join(theme_dir, 'style.css'), 'w', encoding='utf-8') as f:
    f.write(style_css_content)

# 2. Create functions.php
functions_php_content = """<?php
function mothers_enqueue_assets() {
    // Enqueue FontAwesome
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
    
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts-cinzel', 'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&family=Cormorant+Garamond:ital,wght@0,300;0,400;1,300;1,400&display=swap', array(), null);
    
    // Enqueue our styles
    wp_enqueue_style('mothers-variables', get_template_directory_uri() . '/assets/css/variables.css', array(), '1.0');
    wp_enqueue_style('mothers-main-style', get_template_directory_uri() . '/assets/css/styles.css', array('mothers-variables'), '1.0');
    wp_enqueue_style('mothers-theme-style', get_stylesheet_uri(), array('mothers-main-style'), '1.0');
    
    // Enqueue JS
    wp_enqueue_script('mothers-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'mothers_enqueue_assets');

function mothers_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mothers'),
    ));
}
add_action('after_setup_theme', 'mothers_theme_setup');
?>
"""
with open(os.path.join(theme_dir, 'functions.php'), 'w', encoding='utf-8') as f:
    f.write(functions_php_content)

# 3. Copy assets
assets_src = 'assets'
assets_dest = os.path.join(theme_dir, 'assets')
if not os.path.exists(assets_dest):
    shutil.copytree(assets_src, assets_dest)

print("Created mothers-theme directory, style.css, functions.php, and copied assets.")
