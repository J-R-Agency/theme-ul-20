<?php
/**
 * The template for displaying the author pages
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<section class='generic bg-grey'>
	
	<?php
	if ( isset( $_GET['author_name'] ) ) {
		$curauth = get_user_by( 'slug', $author_name );
	} else {
		$curauth = get_userdata( intval( $author ) );
	}
	?>	
	
	<div class='author-info-container'>
		
		<!-- Avatar -->
		<div class='author-avatar'>
			<?php if ( ! empty( $curauth->ID ) ) : ?>
				<?php echo get_avatar( $curauth->ID, 300); ?>
			<?php endif; ?>			
		</div>
		
		<div class='author-info'>
			<!-- Author name -->
			<div class='author-name'>
				<h1><?php echo esc_html( $curauth->nickname ); ?></h1>
			</div>
			
			<!-- Author social media -->
			
			<div class='author-social-media'>
				<?php
					$author_id = get_the_author_meta('ID');
					
					if( have_rows('author_social_media', 'user_'. $author_id) ): ?>
					
					<ul class='social-media-icons'>
										
					<?php while( have_rows('author_social_media', 'user_'. $author_id) ): the_row(); 
				
						// vars
						$author_social_media_type = get_sub_field('author_social_media_type', 'user_'. $author_id);
						$author_social_media_url = get_sub_field('author_social_media_url', 'user_'. $author_id);
				
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
			
			<!-- Website -->
			<div class='author-website'>
				<?php if ( ! empty( $curauth->user_url ) ) : ?>
					<dt><?php esc_html_e( 'Website', 'understrap' ); ?></dt>
					<dd>
						<a href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_html( $curauth->user_url ); ?></a>
					</dd>
				<?php endif; ?>
			</div>
		</div>
		 
	</div> <!-- end author-info -->
				
		<dl>
			<!-- Author bio -->
			<div class='author-bio'>
				<?php if ( ! empty( $curauth->user_description ) ) : ?>
					<dt><?php esc_html_e( 'Author Bio', 'understrap' ); ?></dt>
					<dd><?php esc_html_e( $curauth->user_description, 'understrap' ); ?></dd>
				<?php endif; ?>
			</div>
		</dl>
		
	
	
	
</section>

<section class="generic bg-white">
	<h2><?php echo esc_html( 'Posts by', 'understrap' ) . ' ' . esc_html( $curauth->nickname ); ?>:</h2>

	<section class="blog-container">
		<div class="blog-content font-navy" style='padding:0;'>
			<div class="row blog-posts">
				
				<!-- The Loop -->
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
							<?php include (get_template_directory() . '/global-templates/template-parts/small-blog-card.tpl'); ?>
					<?php endwhile; ?>
		
				<?php else : ?>
		
					<p class='no-blog-posts'>This author has not written any blog posts yet.</p>
		
				<?php endif; ?>
		
				<!-- End Loop -->
		
				<!-- The pagination component -->
				<?php understrap_pagination(); ?>					
				
			</div>
		</div>
	</section>	
</section>


<?php get_footer();
