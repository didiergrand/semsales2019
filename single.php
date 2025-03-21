<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

 get_header();?>
 </div>
 </div>
 <?php	if ( has_post_thumbnail() ) { ?>
 <div class="post-thumbnail inside-banner">
 	<?php the_post_thumbnail( 'insideBanner-size' ); ?>
 </div>
<?php } else {?>

  <div class="post-thumbnail inside-banner">
    <img width="1200" height="270" src="/wp-content/uploads/2019/11/photos_commune-13-crop-e1603310756117-1200x300.jpg" class="attachment-insideBanner-size size-insideBanner-size wp-post-image" alt="">
  </div>

 <?php } ?>

 	<div class="site-inner container-fluid">
 		<div class="site-content">
 	<header class="entry-header">
 		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
 	</header><!-- .entry-header -->

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
				) );
			} /*elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}*/

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->


</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
