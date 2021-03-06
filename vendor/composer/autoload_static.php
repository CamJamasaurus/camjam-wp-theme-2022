<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit90cee08199ef4a1f70919d0ce54516fe
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Kirki\\Settings\\' => 15,
            'Kirki\\Field\\' => 12,
            'Kirki\\Control\\' => 14,
            'Kirki\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Kirki\\Settings\\' => 
        array (
            0 => __DIR__ . '/..' . '/kirki-framework/control-repeater/src/Settings',
        ),
        'Kirki\\Field\\' => 
        array (
            0 => __DIR__ . '/..' . '/kirki-framework/control-checkbox/src/Field',
            1 => __DIR__ . '/..' . '/kirki-framework/control-code/src/Field',
            2 => __DIR__ . '/..' . '/kirki-framework/control-color/src/Field',
            3 => __DIR__ . '/..' . '/kirki-framework/control-repeater/src/Field',
            4 => __DIR__ . '/..' . '/kirki-framework/control-select/src/Field',
        ),
        'Kirki\\Control\\' => 
        array (
            0 => __DIR__ . '/..' . '/kirki-framework/control-base/src/Control',
            1 => __DIR__ . '/..' . '/kirki-framework/control-checkbox/src/Control',
            2 => __DIR__ . '/..' . '/kirki-framework/control-code/src/Control',
            3 => __DIR__ . '/..' . '/kirki-framework/control-color/src/Control',
            4 => __DIR__ . '/..' . '/kirki-framework/control-repeater/src/Control',
            5 => __DIR__ . '/..' . '/kirki-framework/control-select/src/Control',
        ),
        'Kirki\\' => 
        array (
            0 => __DIR__ . '/..' . '/kirki-framework/url-getter/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Sunra\\PhpSimple\\HtmlDomParser' => 
            array (
                0 => __DIR__ . '/..' . '/sunra/php-simple-html-dom-parser/Src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit90cee08199ef4a1f70919d0ce54516fe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit90cee08199ef4a1f70919d0ce54516fe::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit90cee08199ef4a1f70919d0ce54516fe::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}