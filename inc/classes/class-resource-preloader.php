<?php

namespace camjam;

class ResourcePreloader {
    private static $resources = array();
    public static function enqueue_resource($resource) {
        self::$resources[] = $resource;
    }
    public static function preload_resources() {
        foreach (self::$resources as $resource) {
            if (isset($resource['type']) && isset($resource['href'])) {
                if ($resource['type'] === 'module') {
                    echo \sprintf('<link rel="modulepreload" href="%s">', $resource['href']);
                } else {
                    echo \sprintf('<link rel="preload" as="%s" href="%s" crossorigin="anonymous">', $resource['type'], $resource['href']);
                }
            }
        }
    }
}