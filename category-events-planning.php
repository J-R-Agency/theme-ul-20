<?php
/**
 * Template Name: Blog Archive Template
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
	<div class="container">
		<div class="row">
			<div class="col-12 horizontal-center">
				<h1 class='font-navy'><?php $categories = get_the_category(); echo esc_html( $categories[0]->name ); ?></h1>
			</div>
		</div>
	
		<div class="row blog-posts">
			<?php				
				$wp_query = new WP_Query(array(
					'post_type'=>'post',
					'post_status'=>'publish',
					'posts_per_page'=>5,
					'category_name' => 'events-planning',
					'paged' => ( get_query_var('paged') ? get_query_var('paged') : 0)
				));															
			?>
			<!-- WHILE LOOP -->
		    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
		    	
					<?php include (get_template_directory() . '/global-templates/template-parts/large-blog-card.tpl'); ?>

			<?php endwhile; ?>
										    
			<?php wp_reset_postdata(); ?>
			
			<div class="container">
				<div class="row">
					<div class="col-12 horizontal-center">
						<?php understrap_pagination(); ?>
					</div>
				</div>
			</div>
			
		</div>
		
	</div>					
</section>
<section class="bottom-section"></section>

<?php get_footer(); ?>
