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
            $mcb_style = get_sub_field('mcb_style'); // Select 
			
			if ($mcb_style == "primary") {
				echo 
	            "<!-- Module Content Block -->
	            <section class='patterned-border-faded'></section>
	            	<section class='generic bg-white font-navy'>";
			} else {
				echo 
	            "<!-- Module Content Block -->
	            <section class='generic bg-grey overlay-mtf'>";
			}
            
	        echo "<div class='container module_content_block'>
					<div class='row'>";
					
			if ($mcb_style == "tertiary") {
				// IMAGE     	
            	if ( !empty( $mcb_image) ):
    				echo
					"<div class='col-12 col-md-5'>
						<img src='". $mcb_image['url'] ."'>
					</div>";
            	endif;
            	
            	// TITLE AND CONTENT      	
            	if ( !empty( $mcb_title ) ):
    				echo
					"<div class='col-12 col-md-7'>
						<h1 class='mcb_title'>". $mcb_title . "</h1>
						<p class='mcb_content'>". $mcb_content . "</p>
					</div>";
            	endif;
			} elseif ($mcb_style == "primary" or $mcb_style == "secondary") {
				echo "
					<div class='col-12 col-md-5'>
						<h1 class='mcb_title'>". $mcb_title . "</h1>
					</div>
					<div class='col-12 col-md-7'>
						<p class='mcb_content'>". $mcb_content . "</p>
					</div>
				";
			}
	            	        	
				echo "</div> <!-- end row -->
				</div> <!-- end container -->
			</section>"; // Close module_content_block
			
			if ($mcb_style == "primary") {
				echo 
	            "<section class='patterned-border-faded'></section>";
			}
			
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
						"<div class='col-12 col-md-4'>
							<h1 class='mcb_title'>". $mis_title . "</h1>
							<p class='mcb_content'>". $mis_subtitle . "</p>
						</div>";
	            	endif;

		            // PRIMARY ICON SET   	
        			echo "
        			<div class='col-12 col-md-8'>
        				<div class='row'>";
						if( have_rows('mis_primary_icon_set') ):
					    	while( have_rows('mis_primary_icon_set') ): the_row();
						    	$mis_primary_icon_image = get_sub_field('mis_primary_icon_image');
								
								echo "
									<div class='col-6'>
										<div class='primary-icon-container'>
											<div class='row'>
												<div class='col-12 col-md-6 primary-icon-wrapper'>
													<img src='".$mis_primary_icon_image['url']."' alt='".$mis_primary_icon_image['alt']. "' class='primary-icon'>
												</div>
											
												<div class='col-12 col-md-6 primary-icon-name'>
													<span>".$mis_primary_icon_image['caption']."</span>
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
        				<div class='secondary-icon-container'>";
						if( have_rows('mis_secondary_icon_set') ):
					    	while( have_rows('mis_secondary_icon_set') ): the_row();
						    	$mis_secondary_icon_image = get_sub_field('mis_secondary_icon_image');
								
								echo "
									<div class='secondary-icon-wrapper'>
										<img src='".$mis_secondary_icon_image['url']."' alt='".$mis_secondary_icon_image['alt']. "' class='secondary-icon'>
											
										<div class='secondary-icon-name'>
											<span>".$mis_secondary_icon_image['caption']."</span>
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
		
		
          // -------------------------- //
         // ---- CASE: EVENT BLOCK ----//
        // -------------------------- //
        if( get_row_layout() == 'module_event_block' ):
			
			$meb_event_image = get_sub_field('meb_event_image'); // Image
            $meb_event_name = get_sub_field('meb_event_name'); // Text
            $meb_event_description = get_sub_field('meb_event_description'); // Text
			$meb_link = get_sub_field('meb_link'); // Link
			
            echo 
            "<!-- Module Event Block -->
            <section class='module_event_block'>";
					
				echo
				"
				<div class='meb-image'>
					<img src='". $meb_event_image['url'] ."'>
		        </div>
		        <div class='meb-info'>
					<h1 class='meb_event_name'>". $meb_event_name . "</h1>
					<p class='meb_description'>". $meb_event_description . "</p>
					<a href='".$meb_link['url']."'><div class='navy-button'>".$meb_link['title']."</div></a>
				</div>	
				";
                    	
				echo "
			</section>"; // Close module_event_block
		endif;			

          // -------------------------- //
         // -- CASE: OUR WORK BLOCK ---//
        // -------------------------- //
        if( get_row_layout() == 'module_our_work_block' ):
			
            $mowb_title = get_sub_field('mowb_title'); // Text
            $mowb_subtitle = get_sub_field('mowb_subtitle'); // Text
			
            echo 
            "<!-- Module Our Work Block -->
            <section class='generic bg-navy'>
            	<div class='container'>
            		<div class='row'>
						<div class='col-12 col-md-5'>
							<h1 class='font-white'>".$mowb_title."</h1>
							<p class='font-yellow'>".$mowb_subtitle."</p>
						</div>
						<div class='col-12 col-md-7'>
						<div class='thumb-container'>
						";
							$pageSlug = get_page_by_path( 'case-studies' );
							
							//wp_list_pages( array(
							//    'child_of' => $pageSlug->ID
							//) );
							
							$args = array(
							    'post_type'      => 'page', //write slug of post type
							    'posts_per_page' => 4,
							    'post_parent'    => $pageSlug->ID, //place here id of your parent page
							    'order'          => 'ASC',
							    'orderby'        => 'menu_order'
							 );
							 
							$children = new WP_Query( $args );
							 
							if ( $children->have_posts() ) :
							 
							     while ( $children->have_posts() ) : $children->the_post();
								 	$cs_thumbnail = get_field('cs_thumbnail');
								 	$global_standfirst = get_field('global_standfirst');
							 
							        echo "
						        		<div class='thumb-wrapper'>
								            <a href='",the_permalink(),"'>
								            	<div class='thumb-hover'>
								            		<h1>".$global_standfirst['gs_subhead']."</h1>
								            		<p>".$global_standfirst['gs_headline']."</p>
								            	</div>
								            	<img class='thumb-img' src='".$cs_thumbnail['url']."' alt='".$cs_thumbnail['alt']."'>
								            </a>
									    </div>  
									";
							 
							    endwhile; 
							endif; 
							wp_reset_query(); 											
						
                      	
							echo "
							</div>
						</div>
					</div>
				</div>
			</section>"; // Close module_event_block
		endif;	
		
          // -------------------------- //
         // ---- CASE: FOUNDER BLOCK ----//
        // -------------------------- //
        if( get_row_layout() == 'module_founder_block' ):
			
			$mfb_style = get_sub_field('mfb_style'); // Link
			$mfb_headline = get_sub_field('mfb_headline'); // Image
			$mfb_link = get_sub_field('mfb_link'); // Link
			$founder_image = get_field('founder_image','option');
			$founder_name = get_field('founder_name','option');
			$founder_bio = get_field('founder_bio','option');
			
			if ($mfb_style == 'primary') {
				echo "
				<section class='generic bg-grey overlay-mtf'>
					<div class='container module_founder_block'>
						<div class='row'>
							<div class='col-12 col-md-5'>
								<img src='". $founder_image['url'] ."'>
							</div>
							<div class='col-12 col-md-7'>
								<h1 class='mfb_title-".$mfb_style."'>". $mfb_headline . "</h1>
								<p>". $founder_bio . "</p>
							</div>
						</div>
					</div>
				
				</section>
				
				";
			}
			
			elseif ($mfb_style == 'secondary') {
				echo 
	            "<!-- Module Event Block -->
	            <section class='generic bg-grey overlay-mfb font-navy'>
					<div class='container module_founder_block'>
						<div class='row'>
							<div class='col-12 col-md-4'>
								<div class='founder-image'>
									<img class='founder-portrait' src='".$founder_image['url']."'>
								</div>
							</div>
							<div class='col-12 col-md-8'>
								<h1 class='mfb_title-".$mfb_style."'>".$mfb_headline."</h1>
								<p class='name'>".$founder_name."</p>
								<p class='font-purple'><strong>Founder – Underwing</strong></p>
								<a href='".$mfb_link['url']."'><div class='navy-button'>".$mfb_link['title']."</div></a>
							</div>
						</div>
					</div>
				</section>"; // Close module_event_block
			}
            
		endif;			
		
			
		
    // End loop.
    endwhile;

// No value.
else :
    
endif;

?>