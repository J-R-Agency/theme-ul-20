<?php
/**
 * Template Name: Service Template
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

<section class='generic bg-white overlay-service' style='border-bottom: 1px solid #261844;'>
	<div class='container service-content-container'>
		<div class='service-title'>
			<?php $title = get_the_title(); ?>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo sanitize_title($title); ?>-icon.png" alt="<?php echo $title?> Icon">
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
