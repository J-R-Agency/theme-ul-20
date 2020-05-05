<?php
/**
 * Single post partial template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			
			<?php echo the_category(); ?>
			
			<div class='by-author'>
				By <?php the_author_posts_link(); ?>
				
				<span class='meta-separator'>|</span>
				
				<?php echo get_the_date('d/m/Y'); ?>
			</div>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->
	


	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->
	
	<!--<div class='entry-author'>
		
		<div class='author-avatar'>
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 200 ); ?>
			</a>
		</div>
		
		<div class='entry-author-info'>
			<a class='author-link' href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
				<h2><?php the_author_meta( 'display_name' ); ?></h2>
			</a>
			
			<!-- Author social media -->
			<!--<div class='author-social-media'>
				<?php
					$author_id = get_the_author_meta( 'ID' ) ;
					
					if( have_rows('author_social_media', 'user_'. $author_id ) ): ?>
					
					<ul class='social-media-icons'>
										
					<?php while( have_rows('author_social_media', 'user_'. $author_id ) ): the_row(); 
				
						// vars
						$author_social_media_type = get_sub_field('author_social_media_type', 'user_'. $author_id );
						$author_social_media_url = get_sub_field('author_social_media_url', 'user_'. $author_id );
				
						?>
						
						<li>
							<a href='<?php echo $author_social_media_url['url'] ?>' target="_blank">
								<img src='<?php echo get_template_directory_uri();?>/assets/images/<?php echo $author_social_media_type; ?>_navy.png'>	
							</a>
						</li>
				
					<?php endwhile; ?>
					</ul>				
				<?php endif; ?>				
			</div>
			
			<!-- Author description -->
			<!--<div class='author-description'><?php the_author_meta( 'description' ); ?></div>
						
		</div>
		
	</div>-->

</article><!-- #post-## -->
