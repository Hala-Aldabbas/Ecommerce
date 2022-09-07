<?php

namespace WOWMALL\THEME\Gutenberg\Classes;

class BlockSupports {


	protected static $_instance;

	public function __construct() {
		add_filter(
			'block_type_metadata',
			function ( $metadata ) {

				if ( isset( $metadata['name'] ) ) {

					// Remove __experimentalLayout because it override h1,h2,h3,h4,h5,h6 margins
					// if ( ! in_array( $metadata['name'], array( 'core/gallery', 'core/columns' ) ) ) {
					// unset( $metadata['supports']['__experimentalLayout'] );
					// }

					if ( $metadata['name'] == 'core/navigation-link' ) {
						$metadata['supports']['spacing']['margin']  = true;
						$metadata['supports']['spacing']['padding'] = true;
						$metadata['supports']['color']['link']      = true;
						$metadata['supports']['color']['text']      = true;
					}

					if ( $metadata['name'] == 'core/home-link' ) {
						$metadata['supports']['spacing']['margin']  = true;
						$metadata['supports']['spacing']['padding'] = true;
						$metadata['supports']['color']['link']      = true;
						$metadata['supports']['color']['text']      = true;
					}

					if ( $metadata['name'] == 'core/site-logo' ) {
						$metadata['supports']['spacing']['margin']   = true;
						$metadata['supports']['spacing']['padding']  = true;
						$metadata['supports']['color']['background'] = true;
					}

					if ( $metadata['name'] == 'core/query-pagination' ) {
						$metadata['supports']['spacing']['margin']   = true;
						$metadata['supports']['spacing']['padding']  = true;
						$metadata['supports']['spacing']['blockGap']  = true;
						$metadata['supports']['color']['background'] = true;
					}

					if ( $metadata['name'] == 'core/spacer' ) {
						$metadata['supports']['color']['background'] = true;
					}

					if ( $metadata['name'] == 'core/tag-cloud' ) {
						$metadata['supports']['color']['background'] = true;
					}

					if ( $metadata['name'] == 'core/column' ) {
						$metadata['supports']['spacing']['margin']              = true;
						$metadata['supports']['__experimentalBorder']['color']  = true;
						$metadata['supports']['__experimentalBorder']['radius'] = true;
						$metadata['supports']['__experimentalBorder']['style']  = true;
						$metadata['supports']['__experimentalBorder']['width']  = true;
					}

					if ( $metadata['name'] == 'core/separator' ) {
						$metadata['supports']['spacing']['margin']              = true;
						$metadata['supports']['__experimentalBorder']['color']  = true;
						$metadata['supports']['__experimentalBorder']['radius'] = true;
						$metadata['supports']['__experimentalBorder']['style']  = true;
						$metadata['supports']['__experimentalBorder']['width']  = true;
					}

					if ( $metadata['name'] == 'core/columns' ) {
						$metadata['supports']['spacing']['margin']              = true;
						$metadata['supports']['__experimentalBorder']['color']  = true;
						$metadata['supports']['__experimentalBorder']['radius'] = true;
						$metadata['supports']['__experimentalBorder']['style']  = true;
						$metadata['supports']['__experimentalBorder']['width']  = true;
					}

					if ( $metadata['name'] == 'core/column' ) {
						$metadata['supports']['spacing']['margin'] = true;
					}

					if ( $metadata['name'] == 'core/social-links' ) {
						$metadata['supports']['spacing']['margin']  = true;
						$metadata['supports']['spacing']['padding'] = true;
					}

					if ( $metadata['name'] == 'core/list' ) {
						$metadata['supports']['spacing']['padding'] = true;
						$metadata['supports']['spacing']['margin']  = true;
					}

					if ( $metadata['name'] == 'core/post-title' ) {
						$metadata['supports']['spacing']['padding'] = true;
						$metadata['supports']['spacing']['margin']  = true;
					}

					if ( $metadata['name'] == 'core/post-featured-image' ) {
						$metadata['supports']['spacing']['padding'] = true;
						$metadata['supports']['spacing']['margin']  = true;
					}

					if ( $metadata['name'] == 'core/post-date' ) {
						$metadata['supports']['spacing']['padding'] = true;
						$metadata['supports']['spacing']['margin']  = true;
					}

					if ( $metadata['name'] == 'core/columns' ) {
						$metadata['supports']['spacing']['padding'] = true;
						$metadata['supports']['spacing']['margin']  = true;
					}

					if ( $metadata['name'] == 'core/paragraph' ) {
						$metadata['supports']['typography']['__experimentalFontStyle']     = true;
						$metadata['supports']['typography']['__experimentalTextTransform'] = true;
						$metadata['supports']['typography']['__experimentalFontWeight']    = true;
						$metadata['supports']['spacing']['margin']                         = true;
						$metadata['supports']['spacing']['padding']                        = true;
					}

					if ( $metadata['name'] == 'core/query-title' ) {
						$metadata['supports']['typography']['__experimentalFontStyle']     = true;
						$metadata['supports']['typography']['__experimentalTextTransform'] = true;
						$metadata['supports']['typography']['__experimentalFontWeight']    = true;
						$metadata['supports']['spacing']['margin']                         = true;
						$metadata['supports']['spacing']['padding']                        = true;
					}

					if ( $metadata['name'] == 'core/image' ) {
						$metadata['supports']['spacing']['margin']  = true;
						$metadata['supports']['spacing']['padding'] = true;
					}

					if ( $metadata['name'] == 'core/button' ) {
						$metadata['supports']['typography']['__experimentalFontStyle']     = true;
						$metadata['supports']['typography']['__experimentalTextTransform'] = true;
						$metadata['supports']['typography']['__experimentalFontWeight']    = true;
						$metadata['supports']['spacing']['padding']                        = true;
						$metadata['supports']['spacing']['margin']                         = true;
					}

					if ( $metadata['name'] == 'core/separator' ) {
						$metadata['supports']['spacing']['padding'] = true;
						$metadata['supports']['spacing']['margin']  = true;
					}

					if ( $metadata['name'] == 'core/search' ) {
						$metadata['supports']['typography']['__experimentalFontStyle']     = true;
						$metadata['supports']['typography']['__experimentalTextTransform'] = true;
						$metadata['supports']['typography']['__experimentalFontWeight']    = true;
						$metadata['supports']['spacing']['margin']                         = true;
					}

					if ( $metadata['name'] == 'core/heading' ) {
						$metadata['supports']['typography']['__experimentalFontStyle']     = true;
						$metadata['supports']['typography']['__experimentalFontFamily']    = true;
						$metadata['supports']['typography']['__experimentalTextTransform'] = true;
						$metadata['supports']['spacing']['padding']                        = true;
						$metadata['supports']['spacing']['margin']                         = true;
					}

					if ( $metadata['name'] == 'core/tag-cloud' ) {
						$metadata['supports']['typography']['__experimentalFontFamily'] = true;
						$metadata['supports']['spacing']['padding']                     = true;
						$metadata['supports']['spacing']['margin']                      = true;
					}

					if ( $metadata['name'] == 'core/cover' ) {
						$metadata['supports']['spacing']['margin'] = true;
					}

					if ( $metadata['name'] == 'core/gallery' ) {
						$metadata['supports']['spacing']['margin']  = true;
						$metadata['supports']['spacing']['padding'] = true;
					}

					if ( $metadata['name'] == 'core/post-template' ) {
						$metadata['supports']['spacing']['margin']   = true;
						$metadata['supports']['spacing']['padding']  = true;
						$metadata['supports']['color']['background'] = true;
					}

					if ( $metadata['name'] == 'core/post-content' ) {
						$metadata['supports']['typography']['__experimentalFontStyle']     = true;
						$metadata['supports']['typography']['__experimentalFontFamily']    = true;
						$metadata['supports']['typography']['__experimentalTextTransform'] = true;
						$metadata['supports']['spacing']['margin']                         = true;
						$metadata['supports']['spacing']['padding']                        = true;
						$metadata['supports']['color']['background']                       = true;
						$metadata['supports']['color']['text']                             = true;
					}

					if ( $metadata['name'] == 'core/file' ) {
						$metadata['supports']['spacing']['margin']  = true;
						$metadata['supports']['spacing']['padding'] = true;
					}

					if ( $metadata['name'] == 'core/loginout' ) {
						$metadata['supports']['typography']['__experimentalFontStyle']     = true;
						$metadata['supports']['typography']['__experimentalFontWeight']    = true;
						$metadata['supports']['typography']['__experimentalFontFamily']    = true;
						$metadata['supports']['typography']['__experimentalTextTransform'] = true;
						$metadata['supports']['typography']['fontSize']                    = true;
						$metadata['supports']['spacing']['margin']                         = true;
						$metadata['supports']['spacing']['padding']                        = true;
					}

					if ( $metadata['name'] == 'core/code' ) {
						$metadata['supports']['spacing']['margin']   = true;
						$metadata['supports']['spacing']['padding']  = true;
						$metadata['supports']['color']['text']       = true;
						$metadata['supports']['color']['background'] = true;
					}

					if ( $metadata['name'] == 'core/preformatted' ) {
						$metadata['supports']['spacing']['margin']  = true;
						$metadata['supports']['spacing']['padding'] = true;
					}

					if ( $metadata['name'] == 'core/pullquote' ) {
						$metadata['supports']['spacing']['margin']                         = true;
						$metadata['supports']['spacing']['padding']                        = true;
						$metadata['supports']['typography']['__experimentalFontStyle']     = true;
						$metadata['supports']['typography']['__experimentalFontFamily']    = true;
						$metadata['supports']['typography']['__experimentalTextTransform'] = true;
					}

					if ( $metadata['name'] == 'core/verse' ) {
						$metadata['supports']['spacing']['margin'] = true;
					}

					if ( $metadata['name'] == 'core/group' ) {
						$metadata['supports']['spacing']['margin']  = true;
						$metadata['supports']['spacing']['padding'] = true;
					}
				}

				return $metadata;
			},
			10,
			2
		);
	}

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}
