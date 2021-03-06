<?php
/**
 * Large Blog Card
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class='blog-card-first'>
	<a href="<?php the_permalink(); ?>">
    	
		<?php if ( has_post_thumbnail() ) {
    		echo "<img src=\"" . get_the_post_thumbnail_url() . "\"
    				style='object-position: ".$featured_image_position." ;'>";
		} else { 
			echo "<img src='". get_template_directory_uri() ."/assets/images/blog-card-placeholder.jpg'>";
		} ?>
		
	</a>
	<a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
	
	<div class='blog-card-meta'>
    	
    	<span>By <?php the_author_posts_link(); ?></span>
		<span class='meta-separator'>|</span>
		<span><?php echo get_the_date('d/m/Y'); ?></span>
		
    	<ul class='categories-list'>
	    	<?php $categories = get_the_category();
				  if ( ! empty( $categories )) {
					$san_cat = sanitize_title( $categories[0]->name );  
				  }
			?>
	    	<li class='<?php echo $category_color; ?>'>
	    		<a href="<?php echo get_category_link($category->term_id); ?>">
	    			<?php echo esc_html($categories[0]->cat_name); ?>
	    		</a>
	    	</li>
    	</ul>
	</div>
	
	<a href="<?php the_permalink(); ?>"><div class='navy-button'>Read More</div></a>
</div>
