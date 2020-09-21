<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$theme_path = get_template_directory_uri();
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<?php
	$footer_phone_number = get_field('footer_phone_number', 'option');
	$footer_email = get_field('footer_email', 'option');
	$footer_address = get_field('footer_address', 'option');

?>

		<div class="patterned-border"></div>
		<div class="wrapper" id="wrapper-footer">
		
			<div class="container">
			
				<div class="row">
		
					<div class="col-12 col-md-3">
						<?php the_custom_logo(); ?>
					</div><!--col end -->
					<div class="col-12 col-md-5">
						<?php
						wp_nav_menu( array( 
						    'theme_location' => 'footer-menu' ) ); 
						?>
					</div>
					<div class="col-12 col-md-4">
						<?php include (get_template_directory() . '/global-templates/template-parts/social-media.tpl'); ?>

						
						<a href="tel:<?php echo esc_attr($footer_phone_number); ?>" id="footer-phone-number">
							<?php echo esc_attr($footer_phone_number); ?>
						</a>
						<a href="mailto:<?php echo esc_attr($footer_email); ?>" id="footer-email">
							<?php echo esc_attr($footer_email); ?>
						</a>
						<p id="footer-address">
							<?php echo $footer_address; ?>
						</p>
					</div>
				</div><!-- row end -->
		
			</div><!-- container end -->
		
		</div><!-- wrapper end -->

		</div><!-- #page we need this extra closing tag here -->
		
		<?php wp_footer(); ?>

</body>

</html>



