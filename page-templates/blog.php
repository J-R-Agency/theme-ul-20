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
		    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
			    $featured_image_position = get_field('featured_image_position');?>
		    	<?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>
			    
		    	<div class='blog-card-first'>
			    	<a href="<?php the_permalink(); ?>">
				    	
			    		<?php if ( has_post_thumbnail() ) {
				    		echo "<img src=\"" . get_the_post_thumbnail_url() . "\"
				    				style='object-position: ".$featured_image_position." ;'>";
			    		} else { 
			    			echo "<img src='". get_template_directory_uri() ."/assets/images/blog-card-placeholder.jpg'>";
			    		} ?>
			    		
			    	</a>
			    	<h1><?php the_title(); ?></h1>
			    	
			    	<div class='blog-card-meta'>
				    	
				    	<span>By <?php echo (get_the_author_meta('display_name')); ?></span>
						<span class='meta-separator'>|</span>
						<span><?php echo get_the_date('d/m/Y'); ?></span>
						
				    	<ul class='categories-list'>
					    	<?php $categories = get_the_category();
								  if ( ! empty( $categories )) {
									$san_cat = sanitize_title( $categories[0]->name );  
								  }
							?>
					    	<li class='<?php echo $san_cat; ?>'><?php the_category(', '); ?></li>
				    	</ul>
			    	</div>
			    	
					<a href="<?php the_permalink(); ?>"><div class='navy-button'>Read More</div></a>
		    	</div>
		    	
		    	<?php else : ?>
			    	<div class='blog-card'>
				    	<a href="<?php the_permalink(); ?>">
				    		<?php if ( has_post_thumbnail() ) {
					    		echo "<img src=\"" . get_the_post_thumbnail_url() . "\"
					    				style='object-position:".$featured_image_position.";'>";
				    		} else { 
				    			echo "<img src='". get_template_directory_uri() ."/assets/images/blog-card-placeholder.jpg'>";
				    		} ?>
				    	</a>
				    	<h1><?php the_title(); ?></h1>
				    	<ul class='categories-list'>
					    	<?php $categories = get_the_category();
								  if ( ! empty( $categories )) {
									$san_cat = sanitize_title( $categories[0]->name );  
								  }
							?>
					    	<li class='<?php echo $san_cat; ?>'><?php the_category(', '); ?></li>
				    	</ul>
						<a href="<?php the_permalink(); ?>"><div class='navy-button'>Read More</div></a>
			    	</div>
		    	<?php endif; ?>
								    
			<?php endwhile; ?>
										    
			<?php wp_reset_postdata(); ?>
			
			<?php understrap_pagination(); ?>
					
			
		</div>
	</div>
</section>

<?php get_footer(); ?>
