<?php
/**
 * Twenty Sixteen Child functions and definitions
 **/


add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'twentysixteen', get_template_directory_uri() . '/style.css', array(), '17.3.25' );

}

add_image_size( 'homepage-thumb', 400, 150, true ); //300 pixels wide
add_image_size( 'insideBanner-size', 2400, 800, true ); // 220 pixels wide by 180 pixels tall, hard crop mode
add_image_size( 'homepageBanner-size', 2400, 1200, true ); // 220 pixels wide by 180 pixels tall, hard crop mode

add_image_size( 'personnel-size', 400, 9999); // 220 pixels wide by 180 pixels tall, hard crop mode

function document_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array( 'titre' => ''), $atts ) );
	return '<div class="document">
            <h3 class="document__title">' . $titre . '</h3>
            <div class="document__content">' . $content . '</div>
          </div>';
}
add_shortcode( 'document', 'document_shortcode' );


function photo_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array( 'titre' => ''), $atts ) );
	$output = '<div class="carte">';
	$output .= ' <h3 class="carte__title">' . $titre . '</h3>';
	$output .= ' <div class="carte__content">' . $content . '</div>';
	$output .= '</div>';
	return $output;

}
add_shortcode( 'photo', 'photo_shortcode' );

function lien_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array( 'titre' => '','lien' => ''), $atts ) );
	$output = '<div class="carte">';
	$output .= '<a href="'. $lien .'">';
	$output .= ' <h3 class="carte__title">' . $titre . '</h3>';
	$output .= ' <div class="carte__content">' . $content . '</div>';
	$output .= '</a>';
	$output .= '</div>';
	return $output;

}
add_shortcode( 'lien', 'lien_shortcode' );


function portrait_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array( 'titre' => '', 'description' => ''), $atts ) );
	return '<div class="portrait-img">
            <div class="portrait__content">' . $content . '
            </div>
          </div>';
}
add_shortcode( 'portrait', 'portrait_shortcode' );




if (function_exists('register_sidebar')) {
  register_sidebar(array(
		'name'=> 'Accueil gauche',
		'id' => 'accueil_gauche',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="offscreen">',
		'after_title' => '</h3>',
	));
  register_sidebar(array(
		'name'=> 'Accueil centre',
		'id' => 'accueil_centre',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="offscreen">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name'=> 'Accueil droite',
		'id' => 'accueil_droite',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="offscreen">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name'=> 'Contenu du bas 1',
		'id' => 'bas1',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name'=> 'Contenu du bas 2',
		'id' => 'bas2',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name'=> 'Contenu du bas 3',
		'id' => 'bas3',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
}

add_filter( 'pre_option_link_manager_enabled', '__return_true' );


// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
  global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Lire la suite...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


function modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Lire la suite...</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );


/**
 * change tinymce's paste-as-text functionality
 */
function change_paste_as_text($mceInit, $editor_id){
	//turn on paste_as_text by default
	//NB this has no effect on the browser's right-click context menu's paste!
	$mceInit['paste_as_text'] = true;
	return $mceInit;
}
add_filter('tiny_mce_before_init', 'change_paste_as_text', 1, 2);
update_option('image_default_link_type','');


function get_excerpt( $count ) {
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = '<p>'.$excerpt.'... <a href="'.$permalink.'">Continuer la lecture</a></p>';
  return $excerpt;
}

function add_google_fonts() {
  wp_enqueue_style( ' add_google_fonts ', 'https://fonts.googleapis.com/css?family=Raleway:300,700', false );
}
add_action( 'wp_enqueue_scripts', 'add_google_fonts' );

//Remove JQuery migrate

function remove_jquery_migrate( $scripts ) {
   if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
   if ( $script->deps ) {
// Check whether the script has any dependencies

        $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
 }
 }
 }
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );


add_filter('wp_editor_set_quality', function($arg){return 100;});


function display_pdfs_by_media_category($atts) {
  $atts = shortcode_atts(array(
      'category' => '',
  ), $atts, 'media_pdf_list');

  if (empty($atts['category'])) {
      return 'Veuillez spécifier une catégorie.';
  }

  $args = array(
      'post_type'      => 'attachment',
      'posts_per_page' => 5, // Vous pouvez ajuster ce nombre selon vos besoins
      'orderby'        => 'name',
      'order'          => 'ASC',
      'post_status'    => array('inherit', 'publish', 'private'),
      'tax_query'      => array(
          array(
              'taxonomy' => 'media_category',
              'field'    => 'slug',
              'terms'    => $atts['category'],
          ),
      ),
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
      $output = '<ul class="media-pdf-list">';
      while ($query->have_posts()) {
          $query->the_post();
          $url = wp_get_attachment_url(get_the_ID());
          $title = get_the_title();
          $output .= '<li><a href="' . esc_url($url) . '">' . esc_html($title) . '</a></li>';
      }
      $output .= '</ul>';
      wp_reset_postdata();
  } else {
      $output = 'Aucun PDF trouvé dans cette catégorie.<br>';
  }

  return $output;
}
add_shortcode('media_pdf_list', 'display_pdfs_by_media_category');