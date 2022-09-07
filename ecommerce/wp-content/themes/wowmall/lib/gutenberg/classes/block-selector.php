<?php

namespace WOWMALL\THEME\Gutenberg\Classes;

class BlockSelector
{

    protected static $_instance;

    public function __construct()
    {

        add_filter(
            'register_block_type_args',
            function ($args, $block_name) {

                //fix navigation link hierarchy
                if ($block_name == 'core/navigation-link') {
                    $args['supports']['__experimentalSelector'] = self::selectors(
                        [
                            '.wp-block-navigation-item.wp-block-navigation-item',
                            '.wp-block-navigation-item.wp-block-navigation-item',
                        ]
                    );
                }

                if ($block_name == 'core/button' && isset($args['supports']['__experimentalSelector'])) {

                    $woocommerce = [
                        '.woocommerce.woocommerce #respond input#submit',
                        '.woocommerce.woocommerce a.button',
                        '.woocommerce.woocommerce button.button',
                        '.woocommerce.woocommerce input.button',
                        '.woocommerce.woocommerce a.button.disabled',
                        '.woocommerce.woocommerce button.button.disabled',
                        '.woocommerce.woocommerce input.button.disabled',
                        '.woocommerce.woocommerce nav.woocommerce-pagination ul li a',
                        '.woocommerce.woocommerce nav.woocommerce-pagination ul li span',
                        '.woocommerce.woocommerce nav.woocommerce-pagination ul li span.current'
                    ];

                    $gutenberg = [
                        '.wp-block-post-excerpt a',
                        '.wp-block-post-navigation-link a',
                        '.wp-block-query-pagination a',
                        '.wp-block-query-pagination-numbers a',
                        '.wp-block-search .wp-block-search__button',
                        '.wp-block-post-comments input[name=submit]'
                    ];

                    $args['supports']['__experimentalSelector'] = self::selectors(
                        array_merge(
                            (array) $args['supports']['__experimentalSelector'],
                            $gutenberg,
                            $woocommerce
                        )
                    );
                }

                return $args;
            },
            10,
            2
        );
    }

    private static function selectors($classes)
    {
        if (is_array($classes)) {
            $classes = implode(',', array_filter($classes));
        } else {
            $classes = esc_attr($classes);
        }

        return $classes;
    }

    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}
