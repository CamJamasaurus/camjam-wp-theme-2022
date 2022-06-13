<?php
$header_banner_content = get_theme_mod('camjam_header_banner_content', 'code');
$header_classes = array(
    'nav',
    'nav--main',
);
if ($header_banner_content === 'menu') {
    $header_classes[] = 'nav--inline';
}
?>

<nav id="nav-main" class="<?php echo implode(' ', $header_classes); ?>" aria-label="Main Navigation" role="navigation">
<?php wp_nav_menu(array(
    'theme_location' => 'primary',
    'menu_class'     => 'nav__menu',
    'menu_id'        => false,
    'container'      => false,
    'fallback_cb'    => false));?>
</nav>

<?php