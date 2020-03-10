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

<!-- Hero image -->
<?php if ( has_post_thumbnail() ): ?>
	<?php $thumb = get_the_post_thumbnail_url(); ?>
	<div class="row">
		<div class="col-12">					
			<div class="hero" style="background-image: url('<?php echo $thumb; ?>');"></div>
		</div>
	</div>					
<?php endif ?>

<?php include_once (get_template_directory() . '/global-templates/template-parts/global-standfirst.tpl'); ?>

<section class="generic bg-white">
	<h1>Test</h1>
</section>

<section class="generic bg-navy">
	<h1>Test</h1>
</section>

<?php get_footer(); ?>
