<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
</div>
</div>
<div class="homepage-content-gray">
<div class="site-inner container-fluid">
  <div class="row">
    <div class="col-md-4">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Accueil gauche')) : ?>
      <br>
      <?php endif; ?>
    </div>
    <div class="col-md-4">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Accueil centre')) : ?>
      <br>
      <?php endif; ?>
    </div>
    <div class="col-md-4">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Accueil droite')) : ?>
      <br>
      <?php endif; ?>
    </div>
  </div>
</div>
</div>
</div>

<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Contenu du bas 1')) : ?>
        <?php endif; ?>
      </div>
      <div class="col-sm-4">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Contenu du bas 2')) : ?>
        <?php endif; ?>
      </div>
      <div class="col-sm-4">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Contenu du bas 3')) : ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer>
<!-- .site-footer -->
</div>
<!-- .site-inner -->
</div>
<!-- .site -->

<?php wp_footer(); ?>

<script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/bootstrap.min.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-1919799-9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-1919799-9');
</script>

</body></html>
