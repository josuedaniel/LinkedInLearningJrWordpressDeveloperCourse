<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        
        <?php the_title(sprintf(
            '<h1 class="entry-title">
                <a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a>
            </h1' ); 
        ?>

        <?php if('post' == get_post_type()) : ?>
        
        <div class = "entry-meta">
            <?php getslife_custom_posted_on(); ?>
        </div>
        
        <?php endif; ?>

    </header> 

    <div class="entry-content">
        <?php the_content(sprintf(__('Continue reading %s <span class="meta-mav">&rarr;</span>', 
        'getslife-custom'), the_title('<span class="screen-reader-text">"', '"</span>', false)));

        wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'getslife-custom'), 
        'after' => '</div>'));
        ?>
    </div>

    <footer class="entry-footer">
        <?php getslife_custom_entry_footer(); ?>
    </footer>
</article> <!-- #post-## -->