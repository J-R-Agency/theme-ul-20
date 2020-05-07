<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<section class="generic bg-navy error-404 not-found">

	<header class="page-header">

		<h1 class="font-white"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'understrap' ); ?></h1>
		<p><a href='<?php echo home_url(); ?>'>Return to the homepage</a></p>
		

	</header><!-- .page-header -->
</section>


<section class="generic bg-white">
	<h1>Latest from the blog</h1>
	<div class="error-blog-posts">
		
		<?php
			$wp_query = new WP_Query(array(
				'post_type'=>'post',
				'post_status'=>'publish',
				'posts_per_page'=>4,
				'paged' => ( get_query_var('paged') ? get_query_var('paged') : 0)
			));															
		?>
		
		<!-- WHILE LOOP -->
	    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
		    $featured_image_position = get_field('featured_image_position');?>
			
			<?php include (get_template_directory() . '/global-templates/template-parts/small-blog-card.tpl'); ?>
							    
		<?php endwhile; ?>
									    
		<?php wp_reset_postdata(); ?>
		
	</div>
</section>

</section><!-- .error-404 -->

<?php get_footer();
