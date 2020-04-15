<?php
/**
 * Partial template for flexible content in templates
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php

// Check value exists.
if( have_rows('fc_content_block') ):

    // Loop through rows.
    while ( have_rows('fc_content_block') ) : the_row();


          // -------------------------- //
         // --- CASE: CONTENT BLOCK ---//
        // -------------------------- //
        if( get_row_layout() == 'module_content_block' ):

            $mcb_title = get_sub_field('mcb_title'); // Text
            $mcb_content = get_sub_field('mcb_content'); // WYSIWYG block
            $mcb_image = get_sub_field('mcb_image'); // Image
            $mcb_background_image = get_sub_field('mcb_background_image'); // Select 
			
            echo 
            "<!-- Module Content Block -->
            <section class='generic bg-grey'>
	            <div class='container module_content_block'>
					<div class='row'>";
					
		            // IMAGE     	
	            	if ( !empty( $mcb_image) ):
        				echo
						"<div class='col-12 col-md-6'>
							<img src='". $mcb_image['url'] ."'>
						</div>";
	            	endif;
			            
		            // TITLE AND CONTENT      	
	            	if ( !empty( $mcb_title ) ):
        				echo
						"<div class='col-12 col-md-6'>
							<h1 class='mcb_title'>". $mcb_title . "</h1>
							<p class='mcb_content'>". $mcb_content . "</p>
						</div>";
	            	endif;
	            	        	
				echo "</div> <!-- end row -->
				</div> <!-- end container -->
			</section>"; // Close module_content_block
		endif;
		
		
          // -------------------------- //
         // ----- CASE: ICON SET ------//
        // -------------------------- //
        if( get_row_layout() == 'module_icon_set' ):

            $mis_title = get_sub_field('mis_title'); // Text
            $mis_subtitle = get_sub_field('mis_subtitle'); // WYSIWYG block
            $mis_primary_icon_set = get_sub_field('mis_primary_icon_set'); // Image
            $mis_secondary_icon_set = get_sub_field('mis_secondary_icon_set'); // Select 
			
            echo 
            "<!-- Module Icon Set -->
            <section class='generic bg-white'>
	            <div class='container module_icon_set'>
					<div class='row'>";
					
		            // TITLE AND CONTENT      	
	            	if ( !empty( $mis_title ) ):
        				echo
						"<div class='col-12 col-md-6'>
							<h1 class='mcb_title'>". $mis_title . "</h1>
							<p class='mcb_content'>". $mis_subtitle . "</p>
						</div>";
	            	endif;

		            // PRIMARY ICON SET   	
        			echo "
        			<div class='col-12 col-md-6'>
        				<div class='row'>";
						if( have_rows('mis_primary_icon_set') ):
					    	while( have_rows('mis_primary_icon_set') ): the_row();
						    	$mis_primary_icon_image = wp_get_attachment_url(get_sub_field('mis_primary_icon_image'));
								$mis_primary_icon_name = get_sub_field('mis_primary_icon_name');
								
								echo "
									<div class='col-6'>
										<div class='primary-icon-container'>
											<div class='row'>
												<div class='col-12 col-md-6 primary-icon-wrapper'>
													<img src='".$mis_primary_icon_image."' alt='".$mis_primary_icon_image['alt']. "' class='primary-icon'>
												</div>
											
												<div class='col-12 col-md-6 primary-icon-name'>
													<span>".$mis_primary_icon_name."</span>
												</div>
											</div>
										</div>
									</div>
								";
						    endwhile;
					    endif;
					echo "
					</div>
					<hr>"; 
					
					// SECONDARY ICON SET
        			echo "
        				<div class='row'>";
						if( have_rows('mis_secondary_icon_set') ):
					    	while( have_rows('mis_secondary_icon_set') ): the_row();
						    	$mis_secondary_icon_image = get_sub_field('mis_secondary_icon_image');
								$mis_secondary_icon_name = get_sub_field('mis_secondary_icon_name');
								
								echo "
									<div class='col-4'>
										<div class='secondary-icon-wrapper'>
											<div class='row'>
												<div class='col-12 col-md-6'>
													<img src='".$mis_secondary_icon_image['url']."' alt='".$mis_secondary_icon_image['alt']. "' class='secondary-icon'>
												</div>
											
												<div class='col-12 col-md-6 secondary-icon-name'>
													<span>".$mis_secondary_icon_name."</span>
												</div>
											</div>
										</div>
									</div>
								";
						    endwhile;
					    endif;
					echo "</div> <!-- end inner icon row -->
					</div> <!-- end secondary icon set col -->
					"; 					          	
	            	        	
				echo "</div> <!-- end row -->
				</div> <!-- end container -->
			</section>"; // Close module_content_block
		endif;
		

          // -------------------------- //
         // --- CASE: CONTACT BLOCK ---//
        // -------------------------- //
        if( get_row_layout() == 'module_contact_block' ):
            $footer_phone_number = get_field('footer_phone_number', 'option');
            $footer_email = get_field('footer_email', 'option');
            $footer_address = get_field('footer_address', 'option');

            echo 
            "<!-- Contact Block -->
            <section class='generic bg-grey'>
	            <div class='container module_contact_block'>
					<div class='row'>
					
						<div class='col-12 col-md-6'>
							<h1>Get in touch</h1>
						</div>
						
						<div class='col-12 col-md-6'>
							<div class='container'>
								<div class='row'>
									<div class='col-4'>
										<div class='contact-icon'>
											<a href='tel:".$footer_phone_number."' target='_blank'><img src='".get_template_directory_uri()."/assets/icons/icon-call.png'></a>
											<p><strong>Call</strong></p>
										</div>
									</div>
									<div class='col-4'>
										<div class='contact-icon'>
											<a href='mailto:".$footer_email."' target='_blank'><img src='".get_template_directory_uri()."/assets/icons/icon-email.png'></a>
											<p><strong>Email</strong></p>
										</div>
									</div>	
										
										";
			           if( have_rows('footer_social_media', 'option') ):
			            	while( have_rows('footer_social_media', 'option') ): the_row();
							    $footer_social_media_type = get_sub_field('footer_social_media_type', 'option');
								$footer_social_media_link = get_sub_field('footer_social_media_link', 'option');									
									if ($footer_social_media_type == "linkedin"):
									echo "<div class='col-4'>
											<div class='contact-icon'>
												<a href='".$footer_social_media_link."' target='_blank'><img src='".get_template_directory_uri()."/assets/icons/icon-social.png'></a>
												<p><strong>Social</strong></p>
											</div>
										</div>";
									endif;
							endwhile;
						endif;
						
				echo		"</div>
								<div class='row'>
									<div class='col-12 col-md-7'>
										<div class='contact-map'>
											<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2378.6215808602083!2d-2.9964308841594005!3d53.40370887999119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487b212c58fb7037%3A0xe084e7ed59fdba7!2sAvenue%20HQ%20Mann%20Island!5e0!3m2!1sen!2suk!4v1586946360842!5m2!1sen!2suk' allowfullscreen='' aria-hidden='false' tabindex='0'></iframe>
										</div>
									</div>
									<div class='col-12 col-md-5 vertical-center'>
										<div class='contact-address'>
										".$footer_address."
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div> <!-- end row -->
				</div> <!-- end container -->
			</section>"; // Close module_content_block
		endif;		
	
		
    // End loop.
    endwhile;

// No value.
else :
    
endif;

?>