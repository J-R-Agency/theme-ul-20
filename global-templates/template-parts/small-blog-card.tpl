<?php
/**
 * Small Blog Card
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
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
	<a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
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
