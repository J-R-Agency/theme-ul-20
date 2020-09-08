<?php
/**
 * Case Study Card
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php

if ($cs_thumbnail) {
	$page_img =  $cs_thumbnail['url'];
} else {
 	$page_img = get_the_post_thumbnail_url();
}

?>

<div class="thumb-wrapper">
    <a href="<?php echo $link; ?>">
    	<div class="thumb-hover">
    		<h1><?php echo $global_standfirst['gs_subhead']; ?></h1>
    		<p><?php echo $global_standfirst['gs_headline']; ?></p>
    	</div>
    	<img class="thumb-img" src="<?php echo $page_img; ?>">
    </a>
</div>