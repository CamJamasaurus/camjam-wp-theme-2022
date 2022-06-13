<?php

$title = camjam_get_the_title();

ob_start();?>
<div class="camjam-page-title-bar">
    <div class="title-bar-wrapper">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<?php
$html = ob_get_clean();
$filter = apply_filters('override_camjam_title_bar', $html, $title);

if ($filter !== false) {
    echo $filter;
}

echo do_action('camjam_after_titlebar');