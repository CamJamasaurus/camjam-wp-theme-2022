<?php

add_shortcode('site_url', function () {return site_url();});
add_shortcode('site_name', function () {return get_bloginfo('name');});
add_shortcode('site_copyright', function () {
  $year = date('Y');
  $site_name = get_bloginfo('name');
  return "&copy;{$year} {$site_name}";
});

add_shortcode('phone_number', function () {return get_theme_mod('camjam_bi_telephone', '');});

add_shortcode('phone_link', function () {

  if (!empty(get_theme_mod('camjam_bi_telephone', ''))) {
    $phone_href = preg_replace('/\D+/', '', get_theme_mod('camjam_bi_telephone', ''));
    ob_start();?>
        <a class="phone-num" href="tel:<?php echo $phone_href ?>"><?php echo get_theme_mod('camjam_bi_telephone', ''); ?></a>
        <?php return ob_get_clean();
  }
});

add_shortcode('camjam_city_page_list', 'camjam_city_page_list_html');