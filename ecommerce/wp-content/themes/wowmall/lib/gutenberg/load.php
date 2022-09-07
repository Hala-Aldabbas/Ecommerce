<?php

namespace WOWMALL\THEME\Gutenberg;

class Load
{

    protected static $_instance;

    public function __construct()
    {

        Classes\BlockSupports::instance();
        Classes\BlockRender::instance();
        Classes\BlockSelector::instance();
        Classes\BlockStyles::instance();
        Classes\BlockPatterns::instance();

        add_filter(
            'the_title',
            function ($title) {
                if (!is_admin() && empty($title)) {
                    $title = __('(No title)', 'wowmall');
                }

                return $title;
            }
        );

        //Fix missing navigation script
        add_action(
            'wp_loaded',
            function () {
                if (function_exists(('gutenberg_url'))) {
                    wp_register_script(
                        'navigation-fix',
                        gutenberg_url('/build/block-library/blocks/navigation/view.min.js'),
                        [],
                        WOWMALL_THEME_VERSION,
                        true
                    );
                }
            }
        );

        add_filter(
            'register_block_type_args',
            function ($args, $block_name) {
                if ($block_name == 'core/navigation') {
                    $args['script'] = 'navigation-fix';
                }
                return $args;
            },
            10,
            2
        );

        //Allow home-link as child of group
        add_filter(
            'register_block_type_args',
            function ($args, $block_name) {
                if ($block_name == 'core/home-link') {
                    $args['parent'] = ['core/navigation', 'core/group'];
                }
                return $args;
            },
            10,
            2
        );

        //Register template parts
        add_filter(
            'default_wp_template_part_areas',
            function ($default_area_definitions) {

                $default_area_definitions[] = [
                    'area'        => 'nav',
                    'title'       => __('Navigation', 'wowmall'),
                    'label'       => __('Navigation', 'wowmall'),
                    'description' => __(
                        'The Navigation template defines a page area that typically contains a the breadcrumbs and navigation elements after header.',
                        'wowmall'
                    ),
                    'icon'        => 'header',
                    'area_tag'    => 'nav',
                ];

                $default_area_definitions[] = [
                    'area'        => 'sidebar-main',
                    'title'       => __('Sidebar Main', 'wowmall'),
                    'label'       => __('Sidebar Main', 'wowmall'),
                    'description' => __(
                        'The Sidebar template containing Gallery, Social Links, Categories, Search and more Blocks.',
                        'wowmall'
                    ),
                    'icon'        => 'header',
                    'area_tag'    => 'nav',
                ];

                $default_area_definitions[] = [
                    'area'        => 'sidebar-shop',
                    'title'       => __('Sidebar Shop', 'wowmall'),
                    'label'       => __('Sidebar Shop', 'wowmall'),
                    'description' => __(
                        'The Sidebar template containing WooCommerce widgets.',
                        'wowmall'
                    ),
                    'icon'        => 'header',
                    'area_tag'    => 'nav',
                ];

                return $default_area_definitions;
            }
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
