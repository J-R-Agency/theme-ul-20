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
 
 
// Remove "Authorial info"

add_action( 'the_seo_framework_after_admin_init', function() {
	$tsf = the_seo_framework();

	remove_action( 'show_user_profile', [ $tsf, '_add_user_author_fields' ], 0 );
	remove_action( 'edit_user_profile', [ $tsf, '_add_user_author_fields' ], 0 );

	remove_action( 'personal_options_update', [ $tsf, '_update_user_settings' ], 10 );
	remove_action( 'edit_user_profile_update', [ $tsf, '_update_user_settings' ], 10 );
} );



