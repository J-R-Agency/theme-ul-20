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
										<div class='primary-icon-wrapper'>
											<div class='row'>
												<div class='col-6'>
													<img src='".$mis_primary_icon_image."' alt='".$mis_primary_icon_image['alt']. "' class='primary-icon'>
												</div>
											
												<div class='col-6 primary-icon-name'>
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
												<div class='col-6'>
													<img src='".$mis_secondary_icon_image['url']."' alt='".$mis_secondary_icon_image['alt']. "' class='secondary-icon'>
												</div>
											
												<div class='col-6 secondary-icon-name'>
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
		
    // End loop.
    endwhile;

// No value.
else :
    
endif;

?>