<?php
/**
 * Template Name: Events Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<!-- Hero image -->
<?php include_once (get_template_directory() . '/global-templates/template-parts/hero.tpl'); ?>

<?php include_once (get_template_directory() . '/global-templates/template-parts/global-standfirst.tpl'); ?>

<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>

<?php get_footer(); ?>
