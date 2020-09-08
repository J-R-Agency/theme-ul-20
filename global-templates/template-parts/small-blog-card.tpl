<?php
/**
 * Small Blog Card
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php

$categories = get_the_category();

foreach($categories as $category) {
	$category_color = get_field('category_color', $category);
}

?>

<div class='blog-card'>
	<a href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) {
    		echo "<img src=\"" . get_the_post_thumbnail_url() . "\"
    				style='object-position:".$featured_image_position.";'>";
		} else { 
			echo "<img src='". get_template_directory_uri() ."/assets/images/blog-card-placeholder.jpg'>";
		} ?>
	</a>
	<a href="<?php echo get_the_permalink(); ?>"><h1><?php echo get_the_title(); ?></h1></a>
	<ul class='categories-list'>
    	<li class="<?php echo $category_color; ?>">
    		<a href="<?php echo get_category_link($category->term_id); ?>">
	    		<?php echo esc_html($categories[0]->cat_name); ?>
	    	</a>
	    </li>
	</ul>
	<a href="<?php echo get_the_permalink(); ?>"><div class='navy-button'>Read More</div></a>
</div>
