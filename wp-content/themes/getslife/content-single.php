<article id ="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

        <div class="entry-meta">
            <?php getslife_custom_posted_on(); ?>
        </div>
    </header>

    <div class="entry-content">
        <?php the_content(); ?>
        <?php 
            wp_link_pages( array(
                'before' => '<div class="page-links">' .__( 'Pages:', 'getslife_custom' ),
                'after' => '</div>'
            ) );
        ?>
    </div>

    <footer class="entry-footer">
        <?php getslife_custom_entry_footer(); ?>
    </footer>
</article><!-- #post-## -->