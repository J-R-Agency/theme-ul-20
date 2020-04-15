<?php
/**
 * Global Standfirst
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php if( have_rows('global_standfirst') ): ?>
    <?php while( have_rows('global_standfirst') ): the_row(); 

        $gs_headline = get_sub_field('gs_headline');
        $gs_subhead = get_sub_field('gs_subhead');
        $gs_intro = get_sub_field('gs_intro');
        $gs_secondary_intro = get_sub_field('gs_secondary_intro');
        $gs_background_color = get_sub_field('gs_background_color');
        $gs_headline_color = get_sub_field('gs_headline_color');
        $gs_subhead_color = get_sub_field('gs_subhead_color');
        $gs_text_color = get_sub_field('gs_text_color');
        $gs_horizontal_line = get_sub_field('gs_horizontal_line');
    ?>

	<section class="generic <?php echo $gs_background_color; ?>">
		<div class="container-fluid">
			<div class="row standfirst-left">
				<div class="col-12 col-md-5">
					<?php if ($gs_headline == "About"): ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bird_icon_white.png" class="gs-headline-image">
					<?php endif; ?>
					<h1 class="<?php echo $gs_headline_color; ?>"><?php echo esc_attr($gs_headline); ?></h1>
					<h2 class="<?php echo $gs_subhead_color; ?>"><?php echo esc_attr($gs_subhead); ?></h2>
				</div>
				<div class="col-12 col-md-7">
					<p class="<?php echo $gs_text_color; ?>"><strong><?php echo esc_attr($gs_intro); ?></strong></p>
					<p class="<?php echo $gs_text_color; ?>"><?php echo esc_attr($gs_secondary_intro); ?></p>
				</div>
			</div>
		</div>
	</section>
	<section class="<?php if ( $gs_horizontal_line == true ) { echo 'patterned-bottom-border'; }?>"></section>

    <?php endwhile; ?>
<?php endif; ?>
