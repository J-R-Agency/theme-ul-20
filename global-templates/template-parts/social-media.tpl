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

<?php if( have_rows('footer_social_media', 'option') ): ?>

    <ul class="social-media-icons">
    <?php while( have_rows('footer_social_media', 'option') ): the_row();
	    $footer_social_media_type = get_sub_field('footer_social_media_type', 'option');
		$footer_social_media_link = get_sub_field('footer_social_media_link', 'option');
    ?>
    
        <li>
        	<?php if ($footer_social_media_type == "instagram"): ?>
        		<a href="<?php echo $footer_social_media_link; ?>" target="<?php echo $footer_social_media_link['target']; ?>">
        			<img src="<?php echo $theme_path; ?>/assets/images/instagram_navy.png" alt="Instagram logo navy">
        		</a>
        	<?php elseif ($footer_social_media_type == "twitter"): ?>
        		<a href="<?php echo $footer_social_media_link; ?>" target="<?php echo $footer_social_media_link['target']; ?>">
        			<img src="<?php echo $theme_path; ?>/assets/images/twitter_navy.png" alt="Twitter logo navy">
        		</a>
        	<?php elseif ($footer_social_media_type == "linkedin"): ?>
        		<a href="<?php echo $footer_social_media_link; ?>" target="<?php echo $footer_social_media_link['target']; ?>">
        			<img src="<?php echo $theme_path; ?>/assets/images/linkedin_navy.png" alt="LinkedIn logo navy">
        		</a>
			<?php endif; ?>
        </li>
    <?php endwhile; ?>
    </ul>
<?php endif; ?>