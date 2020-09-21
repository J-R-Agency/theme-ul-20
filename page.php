<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<!-- Hero image -->
<?php include_once (get_template_directory() . '/global-templates/template-parts/hero.tpl'); ?>

<?php include_once (get_template_directory() . '/global-templates/template-parts/global-standfirst.tpl'); ?>

<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>


<?php get_footer();
