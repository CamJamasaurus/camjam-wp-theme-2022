<?php

require_once 'classes/class-resource-preloader.php';
use \camjam\ResourcePreloader;

add_action('wp_head', array('\camjam\ResourcePreloader', 'preload_resources'), 2);

add_action('init', function () {
  ResourcePreloader::enqueue_resource(array('type' => 'module', 'href' => get_template_directory_uri() . '/assets/js/wc/wc-utils.js'));
  ResourcePreloader::enqueue_resource(array('type' => 'font', 'href' => get_template_directory_uri() . '/assets/fonts/OpenSans-Regular.ttf'));
});