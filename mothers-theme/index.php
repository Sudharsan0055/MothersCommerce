<?php get_header(); ?>
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

