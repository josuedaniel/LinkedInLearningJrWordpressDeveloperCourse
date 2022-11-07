<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {

    wp_enqueue_style( 'parent-style', 
    get_template_directory_uri() . '/style.css' 
);

    wp_enqueue_style( 'child-style', 
        get_stylesheet_directory_uri(). '/style.css',
        array('parent-style'), 
        wp_get_theme()->get('Version') 
    );
}

/**
 * Pluggable function from template-tags.php in the parent theme. Here we changed the words Newer Posts to Newer and Older Posts to Older
 */
function twentynineteen_the_posts_navigation() {
    the_posts_pagination(
        array(
            'mid_size'  => 2,
            'prev_text' => sprintf(
                '%s <span class="nav-prev-text">%s</span>',
                twentynineteen_get_icon_svg( 'chevron_left', 22 ),
                __( 'Newer', 'twentynineteen' )
            ),
            'next_text' => sprintf(
                '<span class="nav-next-text">%s</span> %s',
                __( 'Older', 'twentynineteen' ),
                twentynineteen_get_icon_svg( 'chevron_right', 22 )
            ),
        )
    );
}


//First we add the function that filters titles  and adds "Recipes: " for the recipes category
function recipe_titles ($title, $id=null) {
    if ( in_category('recipes', $id )) {
        $title = "Recipe: " . $title;
    }
    return $title;
}

// Adds filter hook that tells Wordpress when the function should run and what data it should send it.
add_filter('the_title', 'recipe_titles', 10, 2);


function twentynineteen_child_theme_setup() {
    remove_action('widgets_init', 'twentynineteen_widgets_init');

    // Adds a secondary menu to the child theme.
    register_nav_menus(
        array (
            'menu-2' => __( 'Secondary', 'twentynineteen' ),
        )
        );

    
		
}

add_action('after_setup_theme', 'twentynineteen_child_theme_setup');





// This empty function is a pluggable function from the parent theme that would post the author's name below every blog post. We have used the pluggable function here and kept it empty to remove the authors name. 

function twentynineteen_posted_by() {
    // do nothing
}


