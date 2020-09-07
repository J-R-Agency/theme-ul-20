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
	<section>			
		<div class="hero" style="background-image: url('<?php echo $thumb; ?>'); background-position: <?php if (!$featured_image_position){ echo 'center'; } else { echo $featured_image_position; } ?>">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bird_icon_white.png" id="white-bird">
			<h2><?php the_field('homepage_lead_in'); ?></h2>
			
		</div>
	<section>					
<?php endif ?>

<?php include_once (get_template_directory() . '/global-templates/template-parts/global-standfirst.tpl'); ?>

<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>

<?php get_footer(); ?>
