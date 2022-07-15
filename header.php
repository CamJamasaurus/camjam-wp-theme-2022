<!DOCTYPE html>
<?php
  $html_classes = array();
  if (camjam_use_webps()) {
      $html_classes[] = 'webp';
  }
?>

<html lang="en" class="<?php echo implode(' ', apply_filters('html_class', $html_classes)); ?>">

<head>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <?php wp_head();?>
  <?php echo get_theme_mod('camjam_code_head', ''); ?>
  <noscript><style>.cjFade > * {opacity: 1 !important;transform: translate(0,0) !important;}</style></noscript>
</head>

<?php
  $camjam_theme = array(
      '--theme-primary:' . get_theme_mod('camjam_palette_primary', '#a01d20'),
      '--theme-secondary:' . get_theme_mod('camjam_palette_secondary', '#004983'),
      '--theme-accent:' . get_theme_mod('camjam_palette_accent', '#0052b8'),
      '--theme-accent-action:' . get_theme_mod('camjam_palette_accent_action', '#004983'),
  );
  $header_classes = array(
      'header',
  );
?>

<body <?php body_class();?> style="<?php echo esc_html(implode(';', $camjam_theme)); ?>">

<?php do_action('camjam_before_header');?>

<header id="header">
  <?php do_action('camjam_custom_header');?>
  <?php if (!has_action('camjam_custom_header')): ?>

    <?php do_action('camjam_before_header_inner');?>
    <?php do_action('camjam_custom_header_content');?>
    <?php if (!has_action('camjam_custom_header_content')): ?>

      <div class="<?php echo implode(' ', $header_classes); ?>">
        <div class="cj-header__nav">
          <?php echo get_template_part('partials/nav'); ?>
        </div>
      </div>

    <?php endif;?>

    <?php do_action('camjam_after_header_inner');?>

  <?php endif;?>
</header>

<?php 
  do_action('camjam_after_header');
  
  if(!is_front_page()) {
    get_template_part('partials/page-title-bar');
  }

