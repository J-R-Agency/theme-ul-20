<?php
/**
 * Case Study Card
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$theme_path = get_template_directory_uri();
?>

<?php
if ($page_thumbnail) {
	$page_img =  $page_thumbnail['url'];
} elseif (!$page_thumbnail and $thumbnail) {
 	$page_img = $thumbnail;
} else {
	$page_img = $theme_path.'/assets/images/blog-card-placeholder.jpg';
}
	
?>

<div class="thumb-wrapper">
    <a href="<?php echo $link; ?>">
    	<div class="thumb-hover">
    		<h1><?php echo $title; ?></h1>
    	</div>
    	<img class="thumb-img" src="<?php echo $page_img; ?>">
    </a>
</div>