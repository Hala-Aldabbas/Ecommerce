<?php

namespace WOWMALL\THEME\Gutenberg\Classes;

class BlockPatterns
{

    protected static $_instance;
    public $placeholder_image;
    public $placeholder_background;


    public function __construct()
    {
        $this->placeholder_image .= esc_url(WOWMALL_THEME_URL . '/assets/images/placeholder-image.png');

        $this->placeholder_background .= esc_url(WOWMALL_THEME_URL . '/assets/images/placeholder-background.png');

        if (!function_exists('register_block_pattern_category') || !function_exists('register_block_pattern')) {
            return;
        }

        $wowmall_block_pattern_categories = [
            'wowmall-general' => [
                'label'            => esc_html__('Wowmall General', 'wowmall'),
            ],
            'wowmall-header' => [
                'label'            => esc_html__('Wowmall Header', 'wowmall'),
            ],
            'wowmall-blog' => [
                'label'            => esc_html__('Wowmall Blog', 'wowmall'),
            ],
            'wowmall-cta'  => [
                'label'            => esc_html__('Wowmall Call to Action', 'wowmall'),
            ],
            'wowmall-hero' => [
                'label'            => esc_html__('Wowmall Hero', 'wowmall'),
            ],
            'wowmall-footer' => [
                'label'            => esc_html__('Wowmall Footer', 'wowmall'),
            ],
        ];

        foreach ($wowmall_block_pattern_categories as $slug => $settings) {
            register_block_pattern_category($slug, $settings);
        }

        $viewport = [
            'full'            => 1440,
            'wide'            => 1312,
            'wide_grouped'    => 1180,
            'content'        => 640
        ];

        $wowmall_block_patterns = [
            //blog
            'wowmall/grid-cols-3' => [
                'title'         => esc_html__('Three column grid with featured image, title, and post date', 'wowmall'),
                'categories'    => ['wowmall-blog'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('blog/grid-cols-3'),
            ],
            'wowmall/grid-cols-4' => [
                'title'         => esc_html__('Four column grid with featured image, title, and post date', 'wowmall'),
                'categories'    => ['wowmall-blog'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('blog/grid-cols-4'),
            ],
            'wowmall/grid-cols-2' => [
                'title'         => esc_html__('Two column grid with featured image, title, excerpt, and post date', 'wowmall'),
                'categories'    => ['wowmall-blog'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('blog/grid-cols-2'),
            ],
            'wowmall/list' => [
                'title'         => esc_html__('List with featured image, title, excerpt, and post date.', 'wowmall'),
                'categories'    => ['wowmall-blog'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('blog/list'),
            ],
            //cta
            'wowmall/horizontal' => [
                'title'         => esc_html__('Horizontal call to action.', 'wowmall'),
                'categories'    => ['wowmall-cta'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('cta/horizontal'),
            ],
            'wowmall/align-right' => [
                'title'         => esc_html__('Horizontal call to action align right.', 'wowmall'),
                'categories'    => ['wowmall-cta'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('cta/align-right'),
            ],
            'wowmall/align-left' => [
                'title'         => esc_html__('Horizontal call to action align left.', 'wowmall'),
                'categories'    => ['wowmall-cta'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('cta/align-left'),
            ],
            'wowmall/align-left-2' => [
                'title'         => esc_html__('Horizontal call to action align left.', 'wowmall'),
                'categories'    => ['wowmall-cta'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('cta/align-left-2'),
            ],
            'wowmall/vertical' => [
                'title'         => esc_html__('Vertical call to action.', 'wowmall'),
                'categories'    => ['wowmall-cta'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('cta/vertical'),
            ],
            //footer
            'wowmall/columns-1' => [
                'title'         => esc_html__('Footer with one row.', 'wowmall'),
                'categories'    => ['wowmall-footer'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('footer/columns-1'),
            ],
            'wowmall/columns-2' => [
                'title'         => esc_html__('Footer with two rows.', 'wowmall'),
                'categories'    => ['wowmall-footer'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('footer/columns-2'),
            ],
            'wowmall/columns-3' => [
                'title'         => esc_html__('Footer with three rows.', 'wowmall'),
                'categories'    => ['wowmall-footer'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('footer/columns-3'),
            ],
            //general
            'wowmall/two-columns' => [
                'title'         => esc_html__('Two columns content without gap.', 'wowmall'),
                'categories'    => ['wowmall-general'],
                'viewportWidth' => $viewport['full'],
                'content'       => $this->get_block_pattern('general/two-columns'),
            ],
            'wowmall/three-columns' => [
                'title'         => esc_html__('Three columns content without gap.', 'wowmall'),
                'categories'    => ['wowmall-general'],
                'viewportWidth' => $viewport['full'],
                'content'       => $this->get_block_pattern('general/three-columns'),
            ],
            'wowmall/feature-large' => [
                'title'         => esc_html__('Full-width feature section with headings, text, and buttons.', 'wowmall'),
                'categories'    => ['wowmall-general'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('general/feature-large'),
            ],
            'wowmall/feature-box' => [
                'title'         => esc_html__('Featured box, text, and buttons.', 'wowmall'),
                'categories'    => ['wowmall-general'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('general/feature-box'),
            ],
            'wowmall/follow-us-vertical' => [
                'title'         => esc_html__('Follow us section with a vertical layout.', 'wowmall'),
                'categories'    => ['wowmall-general'],
                'viewportWidth' => $viewport['content'],
                'content'       => $this->get_block_pattern('general/follow-us-vertical'),
            ],
            'wowmall/follow-us-horizontal' => [
                'title'         => esc_html__('Follow us section with a horizontal layout.', 'wowmall'),
                'categories'    => ['wowmall-general'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('general/follow-us-horizontal'),
            ],
            'wowmall/information-banner' => [
                'title'         => esc_html__('Information banner.', 'wowmall'),
                'categories'    => ['wowmall-general'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('general/information-banner'),
            ],
            'wowmall/media-text-button' => [
                'title'         => esc_html__('Media and text with button.', 'wowmall'),
                'categories'    => ['wowmall-general'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('general/media-text-button'),
            ],
            'wowmall/previews-featured' => [
                'title'         => esc_html__('Large featured section for the latest sticky post on the site.', 'wowmall'),
                'categories'    => ['wowmall-general'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('general/previews-featured'),
            ],
            'wowmall/faq' => [
                'title'         => esc_html__('Frequently Asked Questions (FAQ) section.', 'wowmall'),
                'categories'    => ['wowmall-general'],
                'viewportWidth' => $viewport['full'],
                'content'       => $this->get_block_pattern('general/faq'),
            ],
            //header
            'wowmall/column-3-horizontal' => [
                'title'         => esc_html__('Header with site title and a menu. This is the default header in the theme.', 'wowmall'),
                'categories'    => ['wowmall-header'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('header/column-3-horizontal'),
            ],
            'wowmall/column-3-double' => [
                'title'         => esc_html__('Header with opening hours, button, site title and a menu.', 'wowmall'),
                'categories'    => ['wowmall-header'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('header/column-3-double'),
            ],
            'wowmall/column-3-double-deluxe' => [
                'title'         => esc_html__('Header with opening hours, site title, social icons, a menu and a Call us button.', 'wowmall'),
                'categories'    => ['wowmall-header'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('header/column-3-double-deluxe'),
            ],
            'wowmall/column-2-horizontal-button' => [
                'title'         => esc_html__('Header with site title, a menu and buttons.', 'wowmall'),
                'categories'    => ['wowmall-header'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('header/column-2-horizontal-button'),
            ],
            'wowmall/column-3-social' => [
                'title'         => esc_html__('Header with site title, a menu and social icons.', 'wowmall'),
                'categories'    => ['wowmall-header'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('header/column-3-social'),
            ],
            'wowmall/column-3-logo-center' => [
                'title'         => esc_html__('Header with site title, a menu and social icons stacked and centered.', 'wowmall'),
                'categories'    => ['wowmall-header'],
                'viewportWidth' => $viewport['wide'],
                'content'       => $this->get_block_pattern('header/column-3-logo-center'),
            ],
            //hero
            'wowmall/cover' => [
                'title'         => esc_html__('Hero with a background image, a heading and paragraph.', 'wowmall'),
                'categories'    => ['wowmall-hero'],
                'viewportWidth' => $viewport['full'],
                'content'       => $this->get_block_pattern('hero/cover'),
            ],
            'wowmall/cover-full-height' => [
                'title'         => esc_html__('Hero full height with a background image, a heading and paragraph.', 'wowmall'),
                'categories'    => ['wowmall-hero'],
                'viewportWidth' => $viewport['full'],
                'content'       => $this->get_block_pattern('hero/cover-full-height'),
            ],
            'wowmall/cover-group-bg' => [
                'title'         => esc_html__('Hero with a background image and a heading, paragraph of text, and buttons.', 'wowmall'),
                'categories'    => ['wowmall-hero'],
                'viewportWidth' => $viewport['full'],
                'content'       => $this->get_block_pattern('hero/cover-group-bg'),
            ],
            'wowmall/text' => [
                'title'         => esc_html__('Hero with headings, a paragraph of text, and buttons.', 'wowmall'),
                'categories'    => ['wowmall-hero'],
                'viewportWidth' => $viewport['content'],
                'content'       => $this->get_block_pattern('hero/text'),
            ]
        ];

        // Register block patterns.
        foreach ($wowmall_block_patterns as $slug => $settings) {
            register_block_pattern($slug, $settings);
        }
    }


    public function get_block_pattern($pattern_name)
    {

        $path = 'lib/gutenberg/block-patterns/' . $pattern_name . '.php';

        if (!locate_template($path)) return;

        ob_start();
        include(locate_template($path));
        return ob_get_clean();
    }

    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}
