<?php
/**
 * Global Standfirst
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$theme_path = get_template_directory_uri();
?>

<?php $founder_image = get_field('founder_image','option'); ?>

<div class="post-sidebar font-navy">
	<?php if (is_page_template('page-templates/blog.php')): ?>
		<h1>Underwing Blog</h1>
	<?php endif; ?>
	<h2>Follow our founder</h2>
	<img class="post-portrait" src="<?php echo $founder_image['url']; ?>">
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