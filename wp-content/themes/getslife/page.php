<?php get_header(); ?>
            <div class="content-area" id = "primary">
                <main class="site-main" id="main" role="main">
                    
                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('content', 'page'); ?> 
                <?php endwhile; //End of loop. ?>

            </main> <!-- #main -->
            </div> <!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>