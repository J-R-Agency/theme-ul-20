<?php
/**
 * Template Name: Case Study Template
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
<?php include_once (get_template_directory() . '/global-templates/template-parts/hero.tpl'); ?>

<!-- Services used -->
<section class="generic bg-white font-navy">
	<div class='services-used'>
		<h1>Services used</h1>
		<div class="service-icons">
			<?php
				if( have_rows('services_used') ):
					while( have_rows('services_used') ): the_row();
						$service_icon = get_sub_field('service_icon');
			?>
				<img src="<?php echo $service_icon['url']?>" alt="<?php echo $service_icon['alt']?>"><span><?php echo $service_icon['caption']?></span>
			<?php	endwhile;
				endif;
			?>
		</div>
	</div>
</section>

<!-- PHOTO SLIDESHOW BOOTSTRAP CAROUSEL -->
<!-- Ref: wpbeaches . com/create-a-bootstrap-4-carousel-slider-with-acf-image-repeater/ -->

	<?php if( have_rows('cs_image_gallery') ):
		$i = 1; // Set the increment variable
		
		echo '<section class="generic bg-white"><div id="carouselExampleSlidesNav2" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">';
	 	
	 	// loop through the rows of data for the tab header
	    while ( have_rows('cs_image_gallery') ) : the_row();
			
			$case_study_image = get_sub_field('case_study_image');
	
		?>
		
		 <div class="carousel-item <?php if($i == 1) echo 'active';?>">
	      <img class="d-block w-100" src="<?php echo $case_study_image['url']; ?>" alt="<?php echo $case_study_image['alt']; ?>">
	    </div>
		
		              
		<?php   $i++; // Increment the increment variable
	
		endwhile; //End the loop 
		
		echo '</div>
				 <a class="carousel-control-prev" href="#carouselExampleSlidesNav2" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleSlidesNav2" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
			</div></section>';
	
	else :
	
	    // no rows found
	
	endif; ?>


<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>

<?php get_footer(); ?>