<?php

namespace camjam;

class ScriptLoader {
    private static $scripts = array();
    private static $modules = array();
    private static $filter_set = false;

    private function __construct() {}

    private static function set_filter() {
        if (self::$filter_set) {
            return;
        }
        self::$filter_set = true;
        add_filter('script_loader_tag', ['\camjam\ScriptLoader', 'async_defer_attributes'], 10, 2);
    }

    public static function load_script($handle, $src, $deps = array(), $version = null, $footer = true, $module = false) {
        self::set_filter();
        if ($module) {
            self::$modules[] = $handle;
        }
        self::$scripts[] = $handle;
        wp_enqueue_script($handle, $src, $deps, $version, $footer);
    }

    public static function async_defer_attributes($tag, $handle) {
        if (\in_array($handle, self::$scripts)) {
            if (\in_array($handle, self::$modules)) {
                return str_replace([' src', 'text/javascript'], [' defer="defer" async="async" src', 'module'], $tag);
            }
            return str_replace(' src', ' defer="defer" async="async" src', $tag);
        }
        return $tag;
    }
}