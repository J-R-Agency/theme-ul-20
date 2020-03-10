<?php
/**
 * Template Name: Homepage Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>
	<section class="generic bg-white">
		<h1>Test</h1>
	</section>
	<section class="generic bg-navy">
		<h1>Test</h1>
	</section>
<?php get_footer(); ?>
