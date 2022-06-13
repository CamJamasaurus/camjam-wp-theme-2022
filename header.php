<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <?php wp_head();?>
  <noscript>><style>.cjFade > * {opacity: 1 !important;transform: translate(0,0) !important;}</style></noscript>
</head>
<body>
  <header id="header">
    <?php 
      do_action('camjam_custom_header');
      if (!has_action('camjam_custom_header')): ?>
      <div class="cj-header">
        <div class="cj-header__logo">
          [logo goes here]
        </div>
        <div class="cj-header__content"></div>
        <div class="cj-header__nav">
          <?php echo get_template_part('partials/nav'); ?>
        </div>
      </div>
    <?php endif; ?>
  </header>