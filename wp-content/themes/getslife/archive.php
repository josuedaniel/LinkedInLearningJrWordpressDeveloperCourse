<?php 
/**
 * The template for displaying archive pages.
 * 
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * 
 * @package Getslife Custom
 */
?><?php get_header(); ?>
            <div class="content-area" id = "primary">
                <main class="site-main" id="main" role="main">
                    <?php if (have_posts()) : ?>
                        
                        <header class="page-header">
                            
                            <?php
                            the_archive_title('<h1 class="page-title">', '</h1>');
                            the_archive_description('<div class="taxonomy-description">', '</div>');
                            ?>

                        </header>

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