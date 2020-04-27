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
					<?php if (is_page_template( 'page-templates/about.php' )): ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bird_icon_white.png" class="gs-headline-image">
					<?php endif; ?>
					<h1 class="<?php echo $gs_headline_color; ?>"><?php echo $gs_headline; ?></h1>
					<?php if (is_page_template( 'page-templates/case-study.php' )): ?>
						<hr class="cs-hr">
					<?php endif; ?>
					<h2 class="<?php echo $gs_subhead_color; ?>"><?php echo $gs_subhead; ?></h2>
				</div>
				<div class="col-12 col-md-7">
					<?php if ($gs_intro): ?>
						<p class="<?php echo $gs_text_color; ?>"><strong><?php echo $gs_intro; ?></strong></p>
					<?php endif; ?>
					<?php if ($gs_secondary_intro): ?>
						<p class="<?php echo $gs_text_color; ?>"><?php echo $gs_secondary_intro; ?></p>
					<?php endif; ?>	
				</div>
			</div>
		</div>
	</section>
	<section class="<?php if ( $gs_horizontal_line == true ) { echo 'patterned-border'; }?>"></section>

    <?php endwhile; ?>
<?php endif; ?>
