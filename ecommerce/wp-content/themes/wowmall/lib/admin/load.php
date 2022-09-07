<?php

namespace WOWMALL\THEME\Admin;

class Load
{

	protected static $_instance;

	public function __construct()
	{
		Classes\Menu::instance();
		Classes\Notices::instance();

		add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_scripts']);
	}

	public function admin_enqueue_scripts()
	{
		wp_enqueue_script('wowmall-admin');
		
		wp_localize_script(
			'wowmall-admin',
			'wowmallAdmin',
			apply_filters(
				'wowmall/admin/script/localize',
				[
					'publicUrl' => WOWMALL_THEME_URL . '/build/admin/',
					'adminUrl' => admin_url(),
				]
			)
		);

		wp_enqueue_style('wowmall-admin-editor');
	}

	public static function instance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}
