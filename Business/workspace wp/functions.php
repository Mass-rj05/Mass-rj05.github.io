<?php

if ( ! function_exists( 'twentysixteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own twentysixteen_setup() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentysixteen' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 50,
		'flex-height' => true,
    'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'twentysixteen' ),
		// 'social'  => __( 'Social Links Menu', 'twentysixteen' ),
	) );



  // Rejestracja menu
	register_nav_menu('pierwsze','Pierwsze Menu');
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'twentysixteen_setup' );


// widget_init - incjacja fukncji widget, theme_slug_widgets_init to nazwa funkcji
add_action( 'widgets_init', 'theme_slug_widgets_init' );

function theme_slug_widgets_init() {

    register_sidebar( array(
			// po porstu jego nazwa
        'name' => __( 'Prawy sidebar', 'theme-slug' ),
				// tym id będziemy wyowlywać ten sidebar
        'id' => 'sidebar-prawy',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<section id="%1$s" class="card my-4 %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<h2 class="card-header">',
	'after_title'   => '</h2>',
    ) );

		register_sidebar( array(
			// po porstu jego nazwa
        'name' => __( 'sidebart strony', 'theme-slug' ),
				// tym id będziemy wyowlywać ten sidebar
        'id' => 'sidebar-strony',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<section id="%1$s" class="card my-4 %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<h2 class="card-header">',
	'after_title'   => '</h2>',
    ) );

}
// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

// komentarze comments template
add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );
function bootstrap3_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();

    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

    $fields   =  array(
        'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
        'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
        'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
                    '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'
    );

    return $fields;
}
add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );
function bootstrap3_comment_form( $args ) {
    $args['comment_field'] = '<div class="form-group comment-form-comment">
            <label for="comment">' . _x( 'Comment', 'noun' ) . '</label>
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
    $args['class_submit'] = 'btn btn-default'; // since WP 4.1

    return $args;
}




// function themeslug_enqueue_style() {
// 	wp_enqueue_style( 'core', 'style.css', false );
// }

// function themeslug_enqueue_script() {
// 	wp_enqueue_script( 'custom-js', get_template_directory_uri(). '/vendor/jquery/custom.js', array(), '1.0.0', true );
// }

// add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
// add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );



?>
