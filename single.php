<?php
/**
 * The template for displaying all single posts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
				
<section class="post-container">
	<div class="post-sidebar font-navy">
		<h2>Follow our founder</h2>
		<img class="post-portrait" src="http://192.168.33.10/underwing/wp-content/uploads/2020/03/francesca-portrait.png">
		<?php include (get_template_directory() . '/global-templates/template-parts/social-media.tpl'); ?>
		<div class="categories-container">
			<h2>Categories</h2>
			<ul class='categories-list'>
				<?php
					$categories = get_categories();
					foreach($categories as $category) {
					   echo '<li class="'.$category->slug.'"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
					}
				?>	 
			</ul>
		</div>
	</div>
	<div class="post-content font-navy">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'loop-templates/content', 'single' ); ?>

			<?php understrap_post_nav(); ?>

		<?php endwhile; // end of the loop. ?>
	</div>
</div>

<?php get_footer();
