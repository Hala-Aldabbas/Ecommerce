<?php

namespace WOWMALL\THEME\Admin\Classes;

class Menu
{

	protected static $_instance;

	public function __construct()
	{
		add_action('admin_menu', [$this, 'add_welcome_page'], 20);
		add_action('admin_menu', [$this, 'add_theme_page'], 20);
	}

	public function add_welcome_page()
	{

		if (!defined('WOWMALL_BLOCKS_PREFIX')) {
			add_theme_page(
				WOWMALL_THEME_NAME,
				WOWMALL_THEME_NAME,
				'edit_posts',
				'wowmall',
				function () {
					global $submenu;
					include(WOWMALL_THEME_DIR . '/lib/admin/menu/header.php');
					include(WOWMALL_THEME_DIR . '/lib/admin/menu/welcome.php');
				}
			);

			add_submenu_page(
				'wowmall',
				esc_html__('Welcome', 'wowmall'),
				esc_html__('Welcome', 'wowmall'),
				'edit_posts',
				'wowmall',
				function () {
					global $submenu;
					include(WOWMALL_THEME_DIR . '/lib/admin/menu/header.php');
					include(WOWMALL_THEME_DIR . '/lib/admin/menu/welcome.php');
				}
			);
		}
	}

	public function add_theme_page()
	{
		add_submenu_page(
			'wowmall',
			esc_html__('Theme', 'wowmall'),
			esc_html__('Theme', 'wowmall'),
			'edit_posts',
			'wowmall' . '_theme',
			function () {
				global $submenu;
				include(WOWMALL_THEME_DIR . '/lib/admin/menu/header.php');
				include(WOWMALL_THEME_DIR . '/lib/admin/menu/theme.php');
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
