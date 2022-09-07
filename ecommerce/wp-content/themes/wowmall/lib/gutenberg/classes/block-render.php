<?php

namespace WOWMALL\THEME\Gutenberg\Classes;

class BlockRender
{

    protected static $_instance;

    public function __construct()
    {
        
        add_filter(
            'render_block',
            function ($content, $block) {

                if ($block['blockName'] == 'core/site-logo') {
                    //$custom_logo = get_custom_logo();
                    $custom_logo_id = get_theme_mod('custom_logo');

                    $align = !empty($block['attrs']['align']) ? "align{$block['attrs']['align']}" : '';

                    if ($custom_logo_id <= 1) {
                        $content = '<div class="wp-block-site-logo default_logo ' . $align . '">
                                    <a href="' . home_url() . '" class="custom-logo-link" rel="home" aria-current="page">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.02 -0.02 226.22 40.21">
                                            <path d="M80.27 8.94l-6.84 20.91h-5.2l-4.59-14.16-4.75 14.16h-5.17L46.85 8.94h5l4.72 14.7 4.93-14.7H66l4.78 14.82 4.86-14.82zm12.56 21.27A12.23 12.23 0 0187 28.8a10.53 10.53 0 01-4.14-3.8 10.66 10.66 0 01-1.47-5.55A10.42 10.42 0 0187 10a12.22 12.22 0 015.88-1.4 12 12 0 015.8 1.4 10.46 10.46 0 014.09 3.88 10.35 10.35 0 011.5 5.53 10.43 10.43 0 01-5.59 9.4 12.05 12.05 0 01-5.85 1.4zm0-4.13a6.68 6.68 0 003.34-.83 6.08 6.08 0 002.33-2.39 6.87 6.87 0 00.87-3.46 6.88 6.88 0 00-.87-3.47 5.88 5.88 0 00-2.33-2.36 6.92 6.92 0 00-6.68 0 6.08 6.08 0 00-2.36 2.36 7.07 7.07 0 00-.84 3.47 7.06 7.06 0 00.84 3.46 6.3 6.3 0 002.36 2.39 6.68 6.68 0 003.34.83zm46-17.14L132 29.85h-5.2l-4.6-14.16-4.74 14.16h-5.17l-6.91-20.91h5l4.72 14.7 4.9-14.7h4.48l4.78 14.82 4.87-14.82zm21.72 20.91V17.3l-6.15 10.34h-2.18L146 17.57v12.28h-4.5V8.94h4l7.82 13 7.71-13h4l.06 20.91zm23.26-4.48h-9.7l-1.85 4.48h-5l9.32-20.91h4.78l9.34 20.91h-5.07zm-1.52-3.68l-3.31-8-3.32 8zm10.59-12.75h4.84v17h10.48v3.94h-15.32zm18 0h4.84v17h10.48v3.94h-15.3zM35.18 33.35A20.1 20.1 0 0015.75.45a19.9 19.9 0 00-15.3 15.3 20.1 20.1 0 0029.68 21.74l6.11 1.88a.29.29 0 00.36-.37zM20.09 36.1a16 16 0 01-16-16V20a15.88 15.88 0 012.12-8 .09.09 0 01.06 0 .13.13 0 01.12 0l3.28 2.7a1.15 1.15 0 01.23.22v.1l.06.16 1.7 4.67 1.82 5.36a.31.31 0 00.28.21h12.93a3.34 3.34 0 002.65-2.77l1.83-6.27s1.4-3.52-2.67-3.68h-8a.3.3 0 00-.29.39l1 3a.29.29 0 00.28.21H27a.3.3 0 01.29.38l-1.39 4.73a.29.29 0 01-.29.21H16.7a.51.51 0 01-.44-.31c-.14-.25-2.85-7.65-3.25-8.78L8.68 9a.24.24 0 010-.12.13.13 0 010-.1A16 16 0 0136.1 20v.06A16 16 0 0120.09 36.1z"></path>
                                            <circle cx="25.03" cy="29.64" r="2.58"></circle>
                                            <circle cx="16.1" cy="29.64" r="2.58"></circle>
                                        </svg>    
                                    </a>
                                </div>';
                    }
                }

                if ($block['blockName'] == 'core/post-featured-image' && !$content) {
                    if (isset($block['attrs']['className']) && strpos($block['attrs']['className'], 'is-style-aspect-ratio') !== false) {
                        //TODO: Add inline-styles to figure tag
                        //$block_wrapper_attributes = get_block_wrapper_attributes();
                        return "<figure class=\"wp-block-post-featured-image {$block['attrs']['className']}\"></figure>";
                    }
                }

                if ($block['blockName'] == 'core/query-title') {

                    if (is_front_page() || is_home()) {

                        $title = get_the_title(get_option('page_for_posts'));

                        $tag_name = isset($block['attrs']['level']) ? 'h' . (int) $block['attrs']['level'] : 'h1';

                        $wrapper_attributes = '';

                        return sprintf(
                            '<%1$s %2$s>%3$s</%1$s>',
                            $tag_name,
                            $wrapper_attributes,
                            $title
                        );
                    }
                }

                return $content;
            },
            10,
            2
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
