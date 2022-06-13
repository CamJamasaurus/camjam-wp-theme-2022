<?php

// Dependencies
include_once 'inc/private-functions.php';
include_once 'inc/classes/class-script-loader.php';

require_once 'admin/customizer/customizer.php';
require_once dirname(__FILE__) . '/inc/resource-preloads.php';
require_once dirname(__FILE__) . '/inc/shortcodes.php';
require_once dirname(__FILE__) . '/inc/classes/class-mobile-nav.php';
require_once dirname(__FILE__) . '/inc/classes/class-menu-walker.php';

// Theme support setup
if (!function_exists('camjam_setup')):
  function camjam_setup() {
    remove_theme_support('wp-block-styles');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support(
      'html5',
      array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
      )
    );
    add_theme_support('custom-logo');

    register_nav_menus(array(
      'primary' => __('Main Menu', 'camjam'),
      'mobile'  => __('Mobile Menu', 'camjam'),
    ));

    register_sidebar(array(
      'name'          => __('Sidebar', 'camjam'),
      'id'            => 'sidebar',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
    ));

  }
endif;
add_action('after_setup_theme', 'camjam_setup');

// Webps functionality
function camjam_use_webps() {
  if (get_theme_mod('camjam_advanced_webp', false) !== false && _browser_supports_webp()) {
    return true;
  }
  return false;
}

// Lazyloading
function camjam_get_lazyload_image($img_id, $class = '') {

  $lazyAttr = array(
    'class'         => 'hyper-lazyload ' . $class,
    'data-lazy-src' => wp_get_attachment_image_url($img_id, 'full'),
    'loading'       => '',
  );

  return wp_get_attachment_image($img_id, 'full', false, $lazyAttr);
}

// URL function
function camjam_localize_rest_variables() {
  ob_start();?>
<script type="text/javascript">
var wpRest = {
  "siteUrl": "<?php echo site_url(); ?>",
  "apiUrl": "<?php echo untrailingslashit(rest_url()); ?>"
};
</script>
<?php echo ob_get_clean();
}
add_action('wp_head', 'camjam_localize_rest_variables');

// Dequeue scripts & load new ones
function camjam_scripts() {
  wp_dequeue_script('wp-embed');
  wp_deregister_script('wp-embed');
  wp_dequeue_script('wp-emoji');
  wp_deregister_script('wp-emoji');
  wp_dequeue_style('wp-block-library');
  wp_deregister_style('wp-block-library');

  wp_enqueue_style('camjam', get_template_directory_uri() . '/style.min.css', array(), wp_get_theme('camjam')->get('Version'));

  camjam\ScriptLoader::load_script('cj-lazyloader', get_template_directory_uri() . '/assets/js/cj-lazyloader.js', array(), '1.0.0', true);
  camjam\ScriptLoader::load_script('wc-cj-button', get_template_directory_uri() . '/assets/js/wc/button.wc.js', array(), '1.0.0', false, true);
  camjam\ScriptLoader::load_script('wc-fa-icon', get_template_directory_uri() . '/assets/js/wc/fa-icon.wc.js', array(), '1.0.0', false, true);
  camjam\ScriptLoader::load_script('nav-operations', get_template_directory_uri() . '/assets/js/nav-operations.js', array(), '1.0.0', true);
  camjam\ScriptLoader::load_script('scroll-fade', get_template_directory_uri() . '/assets/js/scroll-fade.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'camjam_scripts');

// Admin styles
function camjam_admin_scripts_styles() {
  wp_enqueue_style('admin-styles', get_template_directory_uri() . '/admin/css/admin.css', array());
}
add_action('admin_enqueue_scripts', 'camjam_admin_scripts_styles');

// Disable emojis
function camjam_disable_emojis() {
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'camjam_disable_emojis');

function disable_emojis_remove_dns_prefetch($urls, $relation_type) {
  if ('dns-prefetch' == $relation_type) {
    $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
    $urls = array_diff($urls, array($emoji_svg_url));
  }

  return $urls;
}

// Title functions
function camjam_get_the_title() {

  if (is_home()) {
    $title = get_the_title(get_option('page_for_posts', true));
  } elseif (is_archive()) {
    $title = get_the_archive_title();
  } elseif (is_search()) {
    $title = 'Search: ' . get_search_query();
  } elseif (is_404()) {
    $title = '404 - Page Not Found';
  } else {
    $title = get_the_title();
  }

  return apply_filters('camjam_filter_the_title', $title);
}