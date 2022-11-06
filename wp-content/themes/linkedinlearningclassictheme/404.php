<?php
/**
 * The template for displaying 404 pages (not found)
 * customized for the LinkedIn Learning Classic theme 
 * development course by Patrick Rauland
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentynineteen' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content text">
					
					<p><?php _e( 'We couldn\'t find the page you were looking for. Maybe it got stolen by some vagrants.  Maybe try a search?', 'twentynineteen' ); ?></p>
					<?php get_search_form(); ?>
					
				</div><!-- .page-content -->
				<div class="page-content image">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/lost.jpg" />
				</div>
			</div><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
