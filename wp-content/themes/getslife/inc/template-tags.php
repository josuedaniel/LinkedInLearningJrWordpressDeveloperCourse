<?php 

/**
 * Custom Template tags for this theme
 * 
 * Eventually, some of the functionality here could be replaced by core features.
 * 
 * @package Getslife Custom
 */
if ( !function_exists('getslife_custom_paging_nav') ) :
    /**
     * Display navigation to next/previous set of posts when applicable.
     */
function getslife_custom_paging_nav () {
    //Don't print empty markup if there is only one page.
    if ( $GLOBALS['wp_query']->max_num_pages < 2) {
        return;
    }
    ?>
    <nav class = "navigation paging-navigation" role="navigation">
        <h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'getslife-custom'); ?> </h1>
        <div class="nav-links">

            <?php if (get_next_posts_link() ) : ?>
            <div class="nav-previous"><?php next_posts_link( __( ' <span class="meta-nav">&larr;</span> Older Posts', 'getslife-custom') ); ?></div>
            <?php endif; ?>

            <?php if (get_previous_posts_link() ) : ?>
            <div class="nav-next"><?php previous_posts_link( __( 'Newere posts <span class="meta-nav">&rarr;</span>', 'getslife-custom') ); ?> </div>
            <?php endif; ?>
        </div> <!-- .nav-links -->
        </nav> <!-- .navigation -->
        <?php
}
endif;


if ( ! function_exists('getslife_custom_post_nav' ) ) : 
    /**
     * Display Navigation to next/previous post if applicable.
     */

function getslife_custom_post_nav(){
    // Don't print empty markup if there's nowhere to navigate.
    $previous = (is_attachment() ) ? get_post(get_post() -> post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( !$next && !$previous ) {
        return;
    }
    ?>

    <nav class="navigation post-navigation" role="navigation">
        <h1 class="screen-reader-text">
            <?php _e( 'Post navigation', 'getslife-custom' ); ?>
        </h1>     
        <div class="nav-links">
            <?php
                previous_post_link( '<div class="nav-previous>%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'getslife-custom') );
                next_post_link( '<div class="nav-next>%link</div>',         _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'getslife-custom') );
            ?>
        </div> <!-- .nav-links -->
    </nav> <!-- .navigation -->
    <?php 
}
endif;

if ( ! function_exists( 'getslife_custom_posted_on' ) ) :
/**
* Prints HTML with meta information for the current post-date/time and author.
*/

function getslife_custom_posted_on() {
    $time_string = '<time class="entry-date published update" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>
                        <time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( 'c' ) ),
        esc_html( get_the_modified_date() ) 
    );

    $posted_on = sprintf( 
        _x( 'Posted on %s', 'post_date', 'getslife-custom' ),
        '<a href="' . esc_url( get_permalink() ) . '" rel = "bookmark">' . $time_string . '</a>'
    );

    $byline = sprintf(
        _x( 'by %s', 'post author', 'getslife_custom' ),
        '<span class="author vcard"><a class="url fn n" href="'.
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
        . '">'. esc_url( get_the_author() ) . '</a></span>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';
}
endif;

/**
 * Returns true if a blog has more than one category.
 * 
 * @return bool
 */
function getslife_custom_categorized_blog() {
    if (false === ($all_the_cool_cats = get_transient( 'getslife_custom_categories' ) ) ) {
        // Creata an array of all the categories that are attatched to the posts.
        $all_the_cool_cats = get_categories( array(
            'fields' => 'ids',
            'hide_empty' => 1,

            // We only need to know if there is more than one category.
            'number' => 2,
        ) );

        // Count the number of categories that are attatched to the posts.
        $all_the_cool_cats = count($all_the_cool_cats);

        set_transient( 'getslife_custom_categories', $all_the_cool_cats);

    }

    if ($all_the_cool_cats > 1) {
        //This blog has more than one category so getslife custom categorized blog should return true.
        return true;       
    } else {
        //This blog has only 1 category so getslife custom categorized blog should return false.
        return false;
    }
}

/**
 * Flush out the transient used in the getslife custom categorized blog.
 */

function daily_cooking_custom_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'daily_cooking_custom_categories' );
}
add_action( 'edit_category', 'daily_cooking_custom_category_transient_flusher' );
add_action( 'save_post',     'daily_cooking_custom_category_transient_flusher' );