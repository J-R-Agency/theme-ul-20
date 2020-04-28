<?php
/**
 * Template Name: Miscellaneous Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<section class='generic bg-white font-navy overlay-service'>
	<div class='service-content-container'>
		<div class='service-title'>
			<?php $title = get_the_title(); ?>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bird_icon_navy.png" alt="Navy Underwing Logo">
			<h1><?php echo $title; ?></h1>
		</div>
		<div class='service-content'>
			<?php if (have_posts()) : ?>
			   <?php while (have_posts()) : the_post(); ?>
			   		<?php the_content(); ?>
			   <?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>

<?php get_footer(); ?>
