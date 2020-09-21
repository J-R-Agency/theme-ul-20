<?php
/**
 * Template Name: Partners Template
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


<?php if( have_rows('partner') ): ?>
	<section class='generic bg-grey font-navy'>	
		<?php while( have_rows('partner') ): the_row(); 
				$partner_image = get_sub_field('partner_image');
				$partner_name = get_sub_field('partner_name');
				$partner_description = get_sub_field('partner_description');
				$service_highlight = get_sub_field('service_highlight');
				$service_description = get_sub_field('service_description');
			?>
				<div class='container partner-container'>
					<div class='partner-img'>
						<img src="<?php echo $partner_image['url']; ?>" alt="<?php echo $partner_image['alt'] ?>" />
					</div>
					
					<div class='partner-copy'>
						<div class='partner-description'>
							<h1><?php echo $partner_name; ?></h1>
							<p><?php echo $partner_description; ?></p>
						</div>
						
						<div class='service-description'>
							<h1 class='font-purple'><?php echo $service_highlight; ?></h1>
							<p><?php echo $service_description; ?></p>
						</div>
					</div>
				</div>
	
		<?php endwhile; ?>
	</section>
<?php endif; ?>

<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>

<?php get_footer(); ?>