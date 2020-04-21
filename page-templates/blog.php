<?php
/**
 * Template Name: Blog Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<section class="blog-container">
	<?php include (get_template_directory() . '/global-templates/template-parts/post-sidebar.tpl'); ?>
	<div class="blog-content font-navy">
		<div class="row blog-posts">
			<?php
				
				$wp_query = new WP_Query(array(
					'post_type'=>'post',
					'post_status'=>'publish',
					'posts_per_page'=>5,
					'paged' => ( get_query_var('paged') ? get_query_var('paged') : 0)
				));															
			?>
			<!-- WHILE LOOP -->
		    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
		    	<div class='blog-card'>
			    	<a href="<?php the_permalink(); ?>">
			    		<?php if ( has_post_thumbnail() ) {
				    		echo "<img src=\"" . get_the_post_thumbnail_url() . "\">";
			    		} else { 
			    			echo "<img src='". get_template_directory_uri() ."/assets/images/blog-card-placeholder.jpg'>";
			    		} ?>
			    	</a>
			    	
					<a href="<?php the_permalink(); ?>" class="link"><?php the_title(); ?></a>
	      
					<?php the_category(', '); ?>
		    	</div>
								    
			<?php endwhile; ?>
										    
			<?php wp_reset_postdata(); ?>
			
			<?php understrap_pagination(); ?>
					
			
		</div>
	</div>
</section>

<?php get_footer(); ?>
