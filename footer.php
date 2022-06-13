<?php do_action('camjam_before_footer');?>
<?php $footer_logo = get_theme_mod('camjam_footer_logo', true); ?>

<footer class="footer">
  <?php do_action('camjam_after_footer_start');?>
  <?php
  ob_start();
  do_action('camjam_footer');
  $custom_footer = ob_get_clean();
  echo $custom_footer;
  ?>

  <?php if (empty($custom_footer)): ?>
    <?php if ($footer_logo): ?>

      <?php echo camjam_get_logo('medium', true, 'footer'); ?>
    
    <?php endif;?>

    <?php if (get_theme_mod('camjam_social_in_footer', true)): ?>
      <div class="footer__row footer__row--social">
        <?php
          $social_links = camjam_get_social_links();
          foreach ($social_links as $social_link_network => $social_link_value) {
              $social_link_icon = $social_link_network;
              if ($social_link_network === 'facebook') {
                  $social_link_icon = 'facebook-f';
              }
              if ($social_link_network === 'linkedin') {
                  $social_link_icon = 'linkedin-in';
              }
              echo '<a class="social-link social-link--' . $social_link_network . '" target="blank" href="' . $social_link_value . '"><fa-icon family="brands" icon="' . $social_link_icon . '"></fa-icon></a>';
          }
        ?>
      </div>
    <?php endif;?>
  <?php endif;?>

  <div class="footer__row footer__row--links">
    <?php
      $footer_links = apply_filters('camjam_terms_privacy_sitemap_links', array(
        'terms' => array(
            'text' => 'Terms & Conditions',
            'slug' => 'terms-and-conditions',
        ),
        'privacy' => array(
            'text' => 'Privacy Policy',
            'slug' => 'privacy-policy',
        ),
        'sitemap' => array(
            'text' => 'Sitemap',
            'slug' => 'sitemap',
        ),
      ));
    ?>
    
    <?php ob_start();?>
    <p>
      <?php 
        foreach ($footer_links as $footer_link) {
          echo sprintf('<a href="%s">%s</a> | ', site_url(user_trailingslashit($footer_link['slug'])), $footer_link['text']);
        }
      ?>
    </p>
    <?php echo apply_filters('camjam_noonereadsthis_html', ob_get_clean()); ?>
  </div>
  <?php do_action('camjam_before_footer_end');?>
</footer>

<?php echo get_theme_mod('camjam_code_footer', ''); ?>

<?php if (camjam_use_webps()) {
    echo '<script>window.supportsWebp = true</script>';
}?>

<?php wp_footer();?>
</body>

</html>