<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
</div>
</div>
<?php

$args = array(
	'post_type' => 'attachment',
	'post_status' => 'any',
	'tax_query' => array(
		array(
			'taxonomy' => 'media_category', // your taxonomy
			'field' => 'tag_ID',
			'terms' => '3' // term id (id of the media category)
		)
	)
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {?>

<div id="carousel-accueil" class="carousel slide" data-ride="carousel">
<div class="carousel-inner" role="listbox">







	<div class="home-carousel">
		<div class="swiffy-slider">
			<ul class="slider-container">
				<?php
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					echo '<li class="item">';
					echo wp_get_attachment_image( get_the_ID(), 'homepageBanner-size' );
					echo '</li>';
				}
				?>
			</ul>
			<button type="button" class="slider-nav"></button>
			<button type="button" class="slider-nav slider-nav-next"></button>

		</div>
	</div>

  </div>
  <!-- Controls -->
  <?php if($nbrSlides == 'plus'){ ?>
  <a class="left carousel-control" href="#carousel-accueil" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Précédent</span> </a> <a class="right carousel-control" href="#carousel-accueil" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Suivant</span> </a>
  <?php } ?>
</div>
<?php
} else {
	// no attachments found
}
wp_reset_postdata();
?>
<div class="site-content">
	<div class="homepage-content">
		<div class="homepage-content-gray">
			<div class="site-inner container-fluid">
			  <div class="row homepage-content__actus-pilier">
			    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			      <div class="site-main">
			        <h2>Pilier public</h2>


							<?php
											$args=array(
												'post_status' => 'publish',
												'posts_per_page' => 3,
												'caller_get_posts'=> 1,
												 'cat'=>10
											);
											$my_query = null;
											$my_query = new WP_Query($args);
											if( $my_query->have_posts() ) {
											while ($my_query->have_posts()) : $my_query->the_post(); ?>
									        <div class="post">
									          <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
									            <?php the_title(); ?>
									            </a></h3>
									          <small><i>Publié le
									          <?php the_time('j F Y') ?>
									          </i></small>
									          <?php if( has_post_thumbnail() ) { ?>
								          <div class="homepage-thumb">
								            <?php the_post_thumbnail( 'homepage-thumb' ); ?>
								          </div>
								          <?}?>
								            <?php echo get_excerpt(100); ?>
								          <hr>
								        </div>
								        <?php
										  endwhile;
										}
										wp_reset_query();  // Restore global post data stomped by the_post().
										?>
			        <?php
							$args=array(
								'post_status' => 'publish',
								'posts_per_page' => 3,
								'caller_get_posts'=> 1,
								 'cat'=>5
							);
							$my_query = null;
							$my_query = new WP_Query($args);
							if( $my_query->have_posts() ) {
							while ($my_query->have_posts()) : $my_query->the_post();
								if (in_category(5) ) : ?>
					        <div class="post">
					          <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
					            <?php the_title(); ?>
					            </a></h3>
					          <small><i>Publié le
					          <?php the_time('j F Y') ?>
					          </i></small>
					          <?php if( has_post_thumbnail() ) { ?>
				          <div class="homepage-thumb">
				            <?php the_post_thumbnail( 'homepage-thumb' ); ?>
				          </div>
				          <?}?>
				            <?php echo get_excerpt(100); ?>
				          <hr>
				        </div>
				        <?php
							endif;
						  endwhile;
						}
						wp_reset_query();  // Restore global post data stomped by the_post().
						?>
	        	<a class="more-articles" href="categorie/pilier-public"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Tous les articles...</a>
	        </div>


				    </div>
				    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				      <div class="site-main">
				        <h2>Actualités</h2>

								<?php
								$args=array(
								'post_status' => 'publish',
								'posts_per_page' => 3,
								'caller_get_posts'=> 1,
								'cat'=>9
								);
								$my_query = null;
								$my_query = new WP_Query($args);
								if( $my_query->have_posts() ) {
								while ($my_query->have_posts()) : $my_query->the_post(); ?>
								<?php if ( !in_category( 'presentation' ) ) : ?>
								<div class="post">
									<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
										<?php the_title(); ?>
										</a></h3>
									<small><i>Publié le
									<?php the_time('j F Y') ?>
									</i></small>
									<?php if( has_post_thumbnail() ) { ?>
									<div class="homepage-thumb">
										<?php the_post_thumbnail( 'homepage-thumb' ); ?>
									</div>
									<?}?>
										<?php echo get_excerpt(100); ?>
									<hr>
								</div>
								<?php
								endif;
								endwhile;
								 }

								wp_reset_query();  // Restore global post data stomped by the_post().
								?>


								<?php
						$args=array(
						  'post_status' => 'publish',
						  'posts_per_page' => 3,
						  'caller_get_posts'=> 1,
						   'cat'=>4
						);
						$my_query = null;
						$my_query = new WP_Query($args);
						if( $my_query->have_posts() ) {
						while ($my_query->have_posts()) : $my_query->the_post(); ?>
				        <?php if ( !in_category( 'presentation' ) ) :
									if (in_category(4) ) : ?>
				        <div class="post">
				          <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
				            <?php the_title(); ?>
				            </a></h3>
				          <small><i>Publié le
				          <?php the_time('j F Y') ?>
				          </i></small>
				          <?php if( has_post_thumbnail() ) { ?>
				          <div class="homepage-thumb">
				            <?php the_post_thumbnail( 'homepage-thumb' ); ?>
				          </div>
				          <?}?>
				            <?php echo get_excerpt(100); ?>
				          <hr>
				        </div>
				        <?php
								endif;
							 endif;
							endwhile;
				         }

						wp_reset_query();  // Restore global post data stomped by the_post().
				       ?>
				        <a class="more-articles" href="categorie/actualites/"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Toutes les actualités...</a> </div>



			    </div>
				</div>
				<div class="row">
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
			</div>
		</div>
		<div class="homepage-content-white">
			<div class="site-inner container-fluid">
				<div class="row homepage-content__admin">
					<?php
					$args=array(
						'post_status' => 'publish',
						'posts_per_page' => 1,
						'caller_get_posts'=> 1,
					  'cat'=>7
					);
					$my_query = null;
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
						while ($my_query->have_posts()) : $my_query->the_post(); ?>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<?php if( has_post_thumbnail() ) { ?>
								<div class="homepage-thumb">
									<?php the_post_thumbnail(); ?>
								</div>
								<?}?>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<h2><?php the_title(); ?></h2>
								<?php echo the_content("Lire la suite..."); ?>
							</div>
							<?php
						endwhile;
					}
					wp_reset_query();  // Restore global post data stomped by the_post().
					?>
				</div>
				<div class="row">
					<?php
					$args=array(
						'post_status' => 'publish',
						'posts_per_page' => 1,
						'caller_get_posts'=> 1,
					  'cat'=>8
					);
					$my_query = null;
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
						while ($my_query->have_posts()) : $my_query->the_post(); ?>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<h2><?php the_title(); ?></h2>
								<?php echo get_excerpt(600); ?>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<?php if( has_post_thumbnail() ) { ?>
								<div class="homepage-thumb">
									<?php the_post_thumbnail(); ?>
								</div>
								<?}?>
							</div>
							<?php
						endwhile;
					}
					wp_reset_query();  // Restore global post data stomped by the_post().
					?>
				</div>
	    </div>

<?php get_footer(); ?>
