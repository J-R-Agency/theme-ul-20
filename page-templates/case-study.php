<?php
/**
 * Template Name: Case Study Template
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
		<div class="hero" style="background-image: url('<?php echo $thumb; ?>');"></div>
	<section>					
<?php endif ?>
<?php include_once (get_template_directory() . '/global-templates/template-parts/global-standfirst.tpl'); ?>

<!-- Services used -->
<section class="generic bg-white font-navy">
	<div class='services-used'>
		<h1>Services used</h1>
		<div class="service-icons">
			<?php
				if( have_rows('services_used') ):
					while( have_rows('services_used') ): the_row();
						$service_icon = get_sub_field('service_icon');
			?>
				<img src="<?php echo $service_icon['url']?>" alt="<?php echo $service_icon['alt']?>"><span><?php echo $service_icon['caption']?></span>
			<?php	endwhile;
				endif;
			?>
		</div>
	</div>
</section>

<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>

<?php get_footer(); ?>