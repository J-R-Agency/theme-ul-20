<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<section class="blog-container">
	<?php include (get_template_directory() . '/global-templates/template-parts/post-sidebar.tpl'); ?>
	<div class="blog-content font-navy">
		<div class="row blog-posts">	
			<?php
				$wp_query = new WP_Query(array(
					'post_type'=>'post',
					'post_status'=>'publish',
					'paged' => ( get_query_var('paged') ? get_query_var('paged') : 0)
				));															
			?>
			
		    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
			    $featured_image_position = get_field('featured_image_position');?>
		    	<?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>
			    
		    	<?php include_once (get_template_directory() . '/global-templates/template-parts/large-blog-card.tpl'); ?>
		    	
		    	<?php else : ?>
				
				<?php include (get_template_directory() . '/global-templates/template-parts/small-blog-card.tpl'); ?>

		    	<?php endif; ?>
								    
			<?php endwhile; ?>
										    
			<?php wp_reset_postdata(); ?>
			
			
			
			<!--<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php include (get_template_directory() . '/global-templates/template-parts/small-blog-card.tpl'); ?>
			<?php endwhile; endif; ?>-->
			
		</div>
		<?php understrap_pagination(); ?>
	</div>
	
</section>


<?php get_footer(); ?>
