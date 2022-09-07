<?php

namespace WOWMALL\THEME\Gutenberg\Classes;

class BlockStyles
{

    protected static $_instance;

    public function __construct()
    {

        $aspect_ratio = [
            '1/1',
            '2/1',
            '3/1',
            '3/2'
        ];

        if (!function_exists('register_block_style')) {
            return;
        }

        register_block_style(
            'core/image',
            [
                'name'         => 'image-rounded',
                'label'        => __('Rounded 100%', 'wowmall'),
                'inline_style' => '.wp-block-image.is-style-image-rounded img { border-radius: 50%; clip-path: circle(); }',
            ]
        );

        // register_block_style(
        //     'core/columns',
        //     [
        //         'name'         => 'blockGap-0',
        //         'label'        => __('Gap 0', 'wowmall'),
        //         'inline_style' => '.wp-block-columns.is-style-blockGap-0 { --wp--style--block-gap: 0!important; }',
        //     ]
        // );

        foreach ($aspect_ratio as $ratio) {

            $name = 'aspect-ratio-' . sanitize_html_class($ratio);

            register_block_style(
                'core/gallery',
                [
                    'name'         => $name,
                    'label'        => sprintf(esc_html__('(%s) Aspect Ratio', 'wowmall'), $ratio),
                    'inline_style' => ".wp-block-gallery.is-style-{$name} { --wp--custom--aspect-ratio: {$ratio}; }",
                ]
            );

            register_block_style(
                'core/post-featured-image',
                [
                    'name'         => $name,
                    'label'        => sprintf(esc_html__('(%s) Aspect Ratio', 'wowmall'), $ratio),
                    'inline_style' => ".wp-block-post-featured-image.is-style-{$name} { --wp--custom--aspect-ratio: {$ratio}; }",
                ]
            );
        }

        register_block_style(
            'core/social-links',
            [
                'name'         => 'border',
                'label'        => __('Border', 'wowmall'),
            ]
        );

        register_block_style(
            'core/social-links',
            [
                'name'         => 'dark',
                'label'        => __('Dark', 'wowmall'),
            ]
        );

        register_block_style(
            'core/social-links',
            [
                'name'         => 'stroke',
                'label'        => __('Stroke', 'wowmall'),
            ]
        );

        register_block_style(
            'core/columns',
            [
                'name'         => 'container-stretch',
                'label'        => __('Container Stretch', 'wowmall'),
            ]
        );

        register_block_style(
            'core/group',
            [
                'name'         => 'container-flex',
                'label'        => __('Container Flex', 'wowmall'),
            ]
        );

        register_block_style(
            'core/group',
            [
                'name'         => 'container-stretch',
                'label'        => __('Container Stretch', 'wowmall'),
            ]
        );

        register_block_style(
            'core/cover',
            [
                'name'         => 'container-stretch',
                'label'        => __('Container Stretch', 'wowmall'),
            ]
        );

        register_block_style(
            'core/tag-cloud',
            [
                'name'         => 'boxes',
                'label'        => __('Boxes', 'wowmall'),
            ]
        );


        register_block_style(
            'core/list',
            [
                'name'         => 'color-marker',
                'label'        => __('Marker with color', 'wowmall'),
            ]
        );

        register_block_style(
            'woocommerce/product-best-sellers',
            [
                'name'         => 'products-widget-list',
                'label'        => __('Products Widget List', 'wowmall'),
            ]
        );
    }

    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}
