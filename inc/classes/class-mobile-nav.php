<?php

namespace camjam;

class MobileNav {

  private static $instance;
  private $nav_const = '';

  public static function get_instance() {
    if (null === self::$instance) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  public function __construct() {
    add_shortcode('cj-toggle', array($this, 'cj_toggle_html'));
    add_action('wp_footer', array($this, 'output_toggle_js'));
    add_action('wp_nav_menu_item_custom_fields', array($this, 'insert_custom_nav_fields'), 3, 5);
  }

  /** Adds cj-toggle shortcode */
  public function cj_toggle_html($atts) {
    if (!has_nav_menu('mobile')) {
      return 'No Mobile Nav Menu Selected';
    }

    $atts = shortcode_atts(array(
      'nav-type'       => 'overlay-nav',
      'hamburger-text' => '',
    ), $atts, 'cj-toggle');

    // Determine Nav Type and run corresponding methods
    switch ($atts['nav-type']) {

    // Slideout Menu
    case 'slideout':
      ScriptLoader::load_script('cj-slide-out-nav.js', get_template_directory_uri() . '/assets/js/mobile-nav/cj-slide-out-nav.js', array(), '1.0.0', false);
      $this->nav_const = 'cjSlideOutNav';

      add_action('wp_footer', array($this, 'get_mobile_menu_slideout'));
      break;

    // Default Returns Standard Overlay Menu for Backwards Compatibility
    default:
      ScriptLoader::load_script('cj-overlay-nav.js', get_template_directory_uri() . '/assets/js/mobile-nav/cj-overlay-nav.js', array(), '1.0.0', false);
      $this->nav_const = 'cjMobileNav';

      add_action('wp_footer', array($this, 'get_mobile_menu_default'));
      break;
    }

    // Output the cj Toggle
    ob_start();

    ?>
    <span id="camjam-toggle" class="camjam-toggle-bars">
        <span><?php echo $atts['hamburger-text'] ?></span>
        <fa-icon icon="bars"></fa-icon>
    </span>

    <?php return ob_get_clean();

  }

  /** Get mobile nav and render template for default overlay style */
  public function get_mobile_menu_default() {

    // Add the Menu HTML to the footer
    $menu_html = wp_nav_menu(array(
      'theme_location' => 'mobile',
      'menu_class'     => 'camjam-mobile-nav',
      'container'      => null,
      'echo'           => false,
      'depth'          => 2,
    ));

    // Default overlay style HTML template
    ob_start();?>
        <div class="camjam-nav-overlay" hidden>
            <?php echo camjam_get_logo('medium', false); ?>
            <fa-icon class="overlay-close-icon" icon="times"></fa-icon>
            <?php echo $menu_html; ?>
        </div>
    <?php echo ob_get_clean();

  }

  /** Get mobile nav and render template for slide out style */
  public function get_mobile_menu_slideout() {

    $menu_html = wp_nav_menu(array(
      'theme_location' => 'mobile',
      'menu_id'        => 'camjam-slide-out-nav',
      'menu_class'     => 'cjSlideOutNav__page--main',
      'container'      => null,
      'echo'           => false,
      'depth'          => 3,
      'walker'         => new SlideOutNavWalker(),
      //'link_after'     => 'THIS IS A TEST',
    ));
    // Output the Menu
    ob_start();
    ?>

    <nav class="cjSlideOutNav" hidden>
      <!-- <div id="cjSlideOuteBeforeHook" class="cjSlideOutNav__before">
        <?php //do_action('camjam_slideout_before');?>
      </div> -->
      <div class="cjSlideOutNav__container"><?php echo $menu_html; ?></div>
      <div id="cjSlideOuteAfterHook" class="cjSlideOutNav__after">
        <?php do_action('camjam_slideout_after')?>
      </div>
    </nav>

    <?php echo ob_get_clean();

  }

  /** Hook the inline JS toggle logic  uses private nav_const to determine method */
  public function output_toggle_js() {
    ob_start();
    ?>
    <script>
      (function () {
        const cjToggle = document.querySelector('#camjam-toggle');
        if (!cjToggle) return false;
          cjToggle.addEventListener('click', () => {
            if (<?php echo $this->nav_const ?>.visible()) {
              <?php echo $this->nav_const ?>.hide();
            } else {
              <?php echo $this->nav_const ?>.show();
            }
        });
    })();
    </script>
    <?php echo ob_get_clean();
  }

  public function insert_custom_nav_fields($item_id, $item, $depth, $args, $id) {
    // Placeholder if we need this later
  }
}

$camjam_mobile_nav = MobileNav::get_instance();