<?php

$title = camjam_get_the_title();

ob_start();?>

<div class="cc-titlebar cj-lazyload-bg" data-bg-image="<?php echo get_bg_url(); ?>">
    <h1><?php echo $title; ?></h1>
    <span class="heading">Coming 11.11.2022</span>
    <span class="heading">Cam + Chels</span>
</div>

<?php

$html = ob_get_clean();
$filter = apply_filters('override_camjam_title_bar', $html, $title);

if ($filter !== false) {
    echo $filter;
}

echo do_action('camjam_after_titlebar');