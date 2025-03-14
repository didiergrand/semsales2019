<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<aside id="secondary" class="sidebar widget-area">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
		<div class="liens_utiles-widget">
			<div class="liens_utiles">
				<?php
				// Custom query
				$args = array(
					'post_type' => 'page',
				'meta_key'   => 'lien_utile'
				);
				$wp_query = new WP_Query( $args );
				?>
				<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php $lien_utile = get_post_meta( $post->ID, 'lien_utile', true); ?>
					<div class="liens_utiles-item">
					<a href="<?php the_permalink(); ?>">
						<img src="<?=$lien_utile?>"><br><?php the_title() ?>
						</a>
					</div>
				<?php endwhile ?>
				<?php wp_reset_postdata(); ?>
				<?php endif ?>
			</div>
		</div>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
