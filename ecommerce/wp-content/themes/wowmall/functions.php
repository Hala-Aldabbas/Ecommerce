<?php

define( 'WOWMALL_THEME_NAME', 'Wowmall' );
define( 'WOWMALL_THEME_VERSION', '0.2.0' );
define( 'WOWMALL_THEME_FILE', __FILE__ );
define( 'WOWMALL_THEME_DIR', __DIR__ . DIRECTORY_SEPARATOR );
define( 'WOWMALL_THEME_URL', get_template_directory_uri() );
define( 'WOWMALL_THEME_PREFIX', 'wowmall' );
// Project URLs
define( 'WOWMALL_THEME_URL_WORDPRESS', 'https://wordpress.org/themes/wowmall/' );
define( 'WOWMALL_THEME_URL_SUPPORT', 'https://wordpress.org/support/theme/wowmall/' );
define( 'WOWMALL_THEME_URL_REVIEW', 'https://wordpress.org/support/themes/wowmall/reviews/?filter=5#new-post' );
define( 'WOWMALL_THEME_URL_GROUP', 'https://www.facebook.com/groups/wowmall.store' );
define( 'WOWMALL_THEME_URL_PROJECT', 'https://wowmall.store/?utm_source=wowmall_admin' );
define( 'WOWMALL_THEME_URL_BETA', 'https://wowmall.store/?utm_source=wowmall_admin' );
define( 'WOWMALL_THEME_URL_DOCUMENTATION', 'https://wowmall.store/documentation/?utm_source=wowmall_admin' );
define( 'WOWMALL_THEME_URL_DEMO', 'https://wowmall.store/demo/?utm_source=wowmall_admin' );
define( 'WOWMALL_THEME_URL_BLOCKS', 'https://wowmall.store/blocks/?utm_source=wowmall_admin' );
define( 'WOWMALL_THEME_URL_FSE', 'https://wowmall.store/blog/full-site-editing/?utm_source=wowmall_admin' );
define( 'WOWMALL_THEME_DEVELOPMENT_MODE', false );

if ( ! class_exists( 'WP_Theme_JSON_Resolver' ) ) {
	esc_html__( 'Wowmall is an experimental full site editing theme that requires the Gutenberg plugin. Activate the plugin to view the theme.', 'wowmall' );
	return;
}

if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}

require_once 'lib/load.php';
