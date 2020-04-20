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

			<div class="post-navigation">
				<div class="nav-links">
					<?php
						$post_id = $post->ID; // current post ID
									
						$args = array( 
						    'orderby'  => 'post_date',
						    'order'    => 'DESC'
						);
						$posts = get_posts( $args );
						// get IDs of posts retrieved from get_posts
						$ids = array();
						foreach ( $posts as $thepost ) {
						    $ids[] = $thepost->ID;
						}
						// get and echo previous and next post in the same category
						$thisindex = array_search( $post_id, $ids );
						$previd    = isset( $ids[ $thisindex - 1 ] ) ? $ids[ $thisindex - 1 ] : 0;
						$allid     = isset( $ids[ $thisindex] ) ? $ids[ $thisindex] : 0;
						$nextid    = isset( $ids[ $thisindex + 1 ] ) ? $ids[ $thisindex + 1 ] : 0;
						
						if ( $previd ) {
						    ?><span><a id="prev" rel="prev" href="<?php echo get_permalink($previd) ?>"><p> < Previous post</p></a></span>
						    <?php
						}
						if ( $allid ) {
							?><span><a id="all" href="<?php echo site_url();?>/news" class="link"><div class="btn_red-border">View All</div></a></span><?php
						}
						
						if ( $nextid ) {
						    ?><span><a id="next" rel="next" href="<?php echo get_permalink($nextid) ?>"><p>Next post ></p></a></span><?php
						}
					?>
				</div>
			</div>

		<?php endwhile; // end of the loop. ?>
	</div>
</div>

<?php get_footer();
