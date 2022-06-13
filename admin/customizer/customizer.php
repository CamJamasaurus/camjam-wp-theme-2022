<?php
require_once get_parent_theme_file_path('vendor/autoload.php');
add_action('customize_register', function ($wp_customize) {
    $wp_customize->register_control_type('\Kirki\Control\Checkbox');
    $wp_customize->register_control_type('\Kirki\Control\Code');
    $wp_customize->register_control_type('\Kirki\Control\Color');
    $wp_customize->register_control_type('\Kirki\Control\Repeater');
    $wp_customize->register_control_type('\Kirki\Control\Select');
    require_once dirname(__FILE__) . '/alpha-color-picker/alpha-color-picker.php';
});

// function sanitize_colors($value) {
//     // This pattern will check and match 3/6/8-character hex, rgb, rgba, hsl, & hsla colors.
//     $pattern = '/^(\#[\da-f]{3}|\#[\da-f]{6}|\#[\da-f]{8}|rgba\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)(,\s*(0\.\d+|1))\)|hsla\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)(,\s*(0\.\d+|1))\)|rgb\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)|hsl\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)\))$/';
//     $values = \preg_match($pattern, $value, $matches);
//     // Return the 1st match found.
//     if (isset($matches[0])) {
//         if (is_string($matches[0])) {
//             return $matches[0];
//         }
//         if (is_array($matches[0]) && isset($matches[0][0])) {
//             return $matches[0][0];
//         }
//     }
//     // If no match was found, return an empty string.
//     return '';
// }

function camjam_customize_register($wp_customize) {

    $customizer_panels = array(
        'camjam' => array(
            'title'       => 'Theme Options',
            'description' => 'Go here to customize your theme',
            'priority'    => 0,
            'sections'    => array(
                'header'         => array(
                    'title'       => 'Header',
                    'description' => 'Theme header options',
                    'priority'    => 2,
                    'settings'    => array(
                        'banner_content' => array(
                            'args'    => array(
                                'default' => 'code',
                            ),
                            'control' => array(
                                'type'    => 'select',
                                'label'   => 'Banner Content',
                                'choices' => array(
                                    'code' => 'Code Block',
                                    'menu' => 'Navigation',
                                ),
                            ),
                        ),
                        'banner'         => array(
                            'control' => array(
                                'type'    => 'code',
                                'label'   => 'Banner Content',
                                'choices' => array(
                                    'language' => 'html',
                                ),
                            ),
                        ),
                    ),
                ),
                'footer'         => array(
                    'title'       => 'Footer',
                    'description' => 'Theme footer options',
                    'priority'    => 2,
                    'settings'    => array(
                        'logo' => array(
                            'args'    => array(
                                'default' => true,
                            ),
                            'control' => array(
                                'type'  => 'checkbox',
                                'label' => 'Show Logo in Footer?',
                            ),
                        ),
                    ),
                ),
                'code'           => array(
                    'title'    => 'Code Fields',
                    'priority' => 4,
                    'settings' => array(
                        'head'   => array(
                            'args'    => array(
                                'default' => '',
                            ),
                            'control' => array(
                                'type'    => 'code',
                                'label'   => 'Before </head>',
                                'choices' => array(
                                    'language' => 'js',
                                ),
                            ),
                        ),
                        'footer' => array(
                            'args'    => array(
                                'default' => '',
                            ),
                            'control' => array(
                                'type'    => 'code',
                                'label'   => 'Before </body>',
                                'choices' => array(
                                    'language' => 'js',
                                ),
                            ),
                        ),
                    ),
                ),
                'advanced'       => array(
                    'title'    => 'Advanced',
                    'priority' => 5,
                    'settings' => array(
                        'webp' => array(
                            'args'    => array(
                                'default' => false,
                            ),
                            'control' => array(
                                'type'  => 'checkbox',
                                'label' => 'Enable webp Support',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );

    // Add panels
    foreach ($customizer_panels as $panel_id => $panel) {
        $wp_customize->add_panel(
            $panel_id,
            array(
                'title'       => $panel['title'],
                'description' => $panel['description'],
                'priority'    => $panel['priority'],
            )
        );

        // Add sections to panel
        foreach ($panel['sections'] as $section_id => $section) {
            $wp_customize->add_section(
                "{$panel_id}_{$section_id}",
                array(
                    'title'       => __($section['title'], 'camjam'),
                    'description' => isset($section['description']) ? $section['description'] : __return_empty_string(),
                    'priority'    => $section['priority'],
                    'panel'       => $panel_id,
                )
            );

            // Add settings to section
            if (is_array($section['settings'])) {
                foreach ($section['settings'] as $setting_id => $setting) {
                    if (isset($setting['type']) && $setting['type'] === 'repeater') {
                        $wp_customize->add_setting(
                            new \Kirki\Settings\Repeater(
                                $wp_customize,
                                "{$panel_id}_{$section_id}_{$setting_id}",
                                $setting['args']
                            )
                        );
                    } else {
                        $wp_customize->add_setting(
                            "{$panel_id}_{$section_id}_{$setting_id}",
                            isset($setting['args']) ? $setting['args'] : __return_empty_array()
                        );
                    }

                    // Add control to setting
                    if (isset($setting['control']['type']) && $setting['control']['type'] === 'color_alpha') {
                        $wp_customize->add_control(
                            new \Kirki\Control\Color(
                                $wp_customize,
                                "{$panel_id}_{$section_id}_{$setting_id}",
                                array(
                                    'label'   => __($setting['control']['label'], 'camjam'),
                                    'section' => "{$panel_id}_{$section_id}",
                                    // 'settings' => "{$panel_id}_{$section_id}_{$setting_id}",
                                    'choices' => array(
                                        'alpha' => true,
                                    ),
                                )
                            )
                        );
                    } elseif ($setting['control']['type'] === 'checkbox') {
                        $wp_customize->add_control(
                            new \Kirki\Control\Checkbox(
                                $wp_customize,
                                "{$panel_id}_{$section_id}_{$setting_id}",
                                array(
                                    'label'   => __($setting['control']['label'], 'camjam'),
                                    'section' => "{$panel_id}_{$section_id}",
                                    'default' => isset($args['default']) ? $args['default'] : false,
                                )
                            )
                        );
                    } elseif ($setting['control']['type'] === 'code') {
                        $wp_customize->add_control(
                            new \Kirki\Control\Code(
                                $wp_customize,
                                "{$panel_id}_{$section_id}_{$setting_id}",
                                array(
                                    'label'   => __($setting['control']['label'], 'camjam'),
                                    'section' => "{$panel_id}_{$section_id}",
                                    'choices' => $setting['control']['choices'],
                                )
                            )
                        );
                    } elseif ($setting['control']['type'] === 'repeater') {
                        $repeater_fields = array();
                        foreach ($setting['control']['fields'] as $field_id => $field) {
                            $repeater_fields[$field_id] = array(
                                'type'    => $field['type'],
                                'label'   => esc_html__($field['label'], 'camjam'),
                                'default' => $field['default'],
                            );

                            if ($field['type'] === 'select') {
                                $repeater_fields[$field_id]['choices'] = $field['choices'];
                            }
                        }
                        $wp_customize->add_control(
                            new \Kirki\Control\Repeater(
                                $wp_customize,
                                "{$panel_id}_{$section_id}_{$setting_id}",
                                array(
                                    'label'   => __($setting['control']['label'], 'camjam'),
                                    // 'section' => "{$panel_id}_{$section_id}",
                                    'section' => 'colors',
                                    'fields'  => $repeater_fields,
                                )
                            )
                        );
                    } elseif ($setting['control']['type'] === 'select') {
                        $wp_customize->add_control(
                            new \Kirki\Control\Select(
                                $wp_customize,
                                "{$panel_id}_{$section_id}_{$setting_id}",
                                array(
                                    'label'   => __($setting['control']['label'], 'camjam'),
                                    'section' => "{$panel_id}_{$section_id}",
                                    'choices' => $setting['control']['choices'],
                                )
                            )
                        );
                    } else {
                        $wp_customize->add_control(
                            "{$panel_id}_{$section_id}_{$setting_id}",
                            array(
                                'label'   => __($setting['control']['label'], 'camjam'),
                                'section' => "{$panel_id}_{$section_id}",
                                'type'    => $setting['control']['type'],
                            )
                        );
                    }
                }
            }
        }
    }

}
add_action('customize_register', 'camjam_customize_register');