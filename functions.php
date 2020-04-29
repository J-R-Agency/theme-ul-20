<?php
/**
 * UnderStrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

/*-- ADD ACF OPTIONS --*/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	acf_add_options_sub_page("Header");
	acf_add_options_sub_page("Footer");
	acf_add_options_sub_page("Founder Info");
}

/*-- REGISTER MENUS --*/

function register_my_menus() {
  register_nav_menus(
    array(
      'footer-menu' => __( 'Footer Menu' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );

//Enqueue javascript
function my_theme_scripts() {
    wp_enqueue_script( 'slideshow', get_template_directory_uri() . '/js/decorate-quote.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

//Customise pagination
function custom_pagination() {

  $pagination_args = array(
    'prev_text'       => __('<'),
    'next_text'       => __('>'),
  );
 }
 add_action( 'understrap_pagination', 'custom_pagination' );
 
 
 // Adjust number of posts shown on first page
 
add_action( 'pre_get_posts', 'sk_query_offset', 1 );
function sk_query_offset( &$query ) {

	// Before anything else, make sure this is the right query...
	if ( ! ( $query->is_home() || is_main_query() ) ) {
		return;
	}

	// First, define your desired offset...
	$offset = -1;

	// Next, determine how many posts per page you want (we'll use WordPress's settings)
	$ppp = get_option( 'posts_per_page' );

	// Next, detect and handle pagination...
	if ( $query->is_paged ) {

		// Manually determine page query offset (offset + current page (minus one) x posts per page)
		$page_offset = $offset + ( ( $query->query_vars['paged']-1 ) * $ppp );

		// Apply adjust page offset
		$query->set( 'offset', $page_offset );

	}
	else {

		// This is the first page. Set a different number for posts per page
		$query->set( 'posts_per_page', $offset + $ppp );

	}
}

add_filter( 'found_posts', 'sk_adjust_offset_pagination', 1, 2 );
function sk_adjust_offset_pagination( $found_posts, $query ) {

	// Define our offset again...
	$offset = -1;

	// Ensure we're modifying the right query object...
	if ( $query->is_home() && is_main_query() ) {
		// Reduce WordPress's found_posts count by the offset...
		return $found_posts - $offset;
	}
	return $found_posts;
}