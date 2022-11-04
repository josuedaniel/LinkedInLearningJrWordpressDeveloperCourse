<?php
 /**
  * 
  * Getslife Custom functions and definitions
  *
  * @package Getslife Custom
  */

  if (!function_exists('getslife_custom_setup')) :
    function getslife_custom_setup () {
        
        //Make theme available for translation
        // Translations can be filed in the /languages/ folder.
        load_theme_textdomain('getslife-custom', 
        get_template_directory().'/languages');
        
        // Add RSS feed links to <head> for posts and comments.
        add_theme_support('automatic-feed-links');
        
        // Let wordpress manage the document title.
        add_theme_support('title-tag');
        
        // This theme uses qp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'getslife-custom'),
        ));
        
        // Switch defualt core markup for search form, comment form,
        // and comments to output valid HTML5.
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',

        ));
        
        // Setup the wordpress core custom background feature.
        add_theme_support('custom-background', apply_filters(
            'getslife_custom_custom_background_args', array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )));
            
    }
endif; // getslife_custom_setup

add_action('after_setup_theme', 'getslife_custom_setup');

function getslife_custom_scripts() {
    wp_enqueue_style('getslife-custom-style', get_stylesheet_uri());
    wp_enqueue_script('main-js', get_template_directory_uri().'/js/main.js', NULL, '1.0'
        , false);
}

add_action('wp_enqueue_scripts', 'getslife_custom_scripts');

function getslife_custom_entry_footer() {
    // Hide category and tag text for pages
    if ( 'post' == get_post_type() ) {
        $categories_list = get_the_category_list( __( ', ', 'getslife-custom') );
        if ( $categories_list && getslife_custom_categorized_blog() ) {
            printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'getslife_custom' ) . '</span>',
            $categories_list );
        }
        
        $tags_list = get_the_tag_list( '', __( ', ', 'getslife_custom') );

        if ( $tags_list ) {
            printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'getslife-custom' ) 
            .'</span>', $tags_list );
        }
    }

    if ( ! is_single() && ! post_password_required() && (comments_open() || get_comments_number() ) ) {
        echo '<span class="comments-link">';
        comments_popup_link(__('Leave a comment', 'getlife-custom'), 
        __('1 Comment', 'getslife-custom'), __('% Comments', 'getslife-custom'));
        echo '</span>';
    }

    edit_post_link( __( 'Edit', 'getslife-custom' ), '<span class="edit-link">', '</span>');
}

require get_template_directory() . '/inc/template-tags.php';
