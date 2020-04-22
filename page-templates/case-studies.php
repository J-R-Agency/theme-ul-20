<?php
/**
 * Template Name: Case Studies Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<!-- Hero image -->
<?php if ( has_post_thumbnail() ): ?>
	<?php $thumb = get_the_post_thumbnail_url(); ?>
	<section>			
		<div class="hero" style="background-image: url('<?php echo $thumb; ?>');"></div>
	<section>					
<?php endif ?>
<?php include_once (get_template_directory() . '/global-templates/template-parts/global-standfirst.tpl'); ?>

<div class="case-studies-container">
	
<?php 
	$subs = new WP_Query( 
	array( 
	  'post_parent' => $post->ID, 
	  'post_type' => 'page'
	)
	);
?>

<?php if( $subs->have_posts() ) : ?>
	<?php while( $subs->have_posts() ) : $subs->the_post();
		$cs_thumbnail = get_field('cs_thumbnail');
		$global_standfirst = get_field('global_standfirst');
	?>
    	<div class="case-study-wrapper font-navy">
	    	<div class='case-study-desc'>
		    	<h1 class='font-teal'><?php echo $global_standfirst['gs_subhead']; ?></h1>
		    	<h2><?php the_title(); ?></h2>
		    	<hr class="cs-hr-teal">
		    	<p class='case-study-intro'><?php echo $global_standfirst['gs_intro']; ?></p>
		    	<a href="<?php the_permalink() ?>"><div class='navy-button'>Read More</div></a>
	    	</div>
	    	<div class='case-study-img'>
		    	<a href="<?php the_permalink() ?>" title="<?php get_the_title() ?>">
		    		<img src="<?php echo $cs_thumbnail['url']; ?>">
	    		</a>
	    	</div>
    	</div>
	 <?php endwhile; ?>
<?php endif; ?> 
<?php wp_reset_postdata(); ?>

</div>


<?php get_footer(); ?>
