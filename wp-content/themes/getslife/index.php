<?php get_header(); ?>
            <div class="content-area" id = "primary">
                <main class="site-main" id="main" role="main">
                    <?php if (have_posts()) : ?>
                        
                        <?php /* Start the Loop */ ?>
                        <?php while (have_posts()) : the_post(); ?>

                            <?php get_template_part('content', get_post_format()); ?>

                        <?php endwhile; ?>

                        <?php getslife_custom_paging_nav(); ?>

                    <?php else : ?>
                        
                        <?php get_template_part('content', 'none'); ?>

                    <?php endif; ?>

                </main> <!-- #main -->
            </div> <!-- #primary -->
            <?php get_sidebar(); ?>
<?php get_footer(); ?>