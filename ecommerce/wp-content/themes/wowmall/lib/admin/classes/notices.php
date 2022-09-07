<?php

namespace WOWMALL\THEME\Admin\Classes;

class Notices
{

	protected static $_instance;

	public function __construct()
	{
		add_action('wp_ajax_wowmall_dismiss_notice', [$this, 'ajax_dismiss_notice']);
		add_action('admin_notices', [$this, 'admin_notices']);
		add_filter(
			'wowmall/admin/script/localize',
			function ($settings) {
				$settings['dismiss'] = [
					'nonce' => wp_create_nonce('wowmall_dismiss_notice')
				];
				return $settings;
			}
		);
	}

	function ajax_dismiss_notice()
	{

		if (check_admin_referer('wowmall_dismiss_notice', 'nonce') && isset($_REQUEST['notice_id'])) {

			$notice_id = sanitize_key($_REQUEST['notice_id']);

			update_user_meta(get_current_user_id(), $notice_id, true);

			wp_send_json_success($notice_id);
		}

		wp_send_json_error();

		wp_die();
	}


	public function admin_notices()
	{
		include(WOWMALL_THEME_DIR . '/lib/admin/notices/gutenberg.php');
	}

	public static function instance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}
