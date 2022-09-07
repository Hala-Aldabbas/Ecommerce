<?php

namespace WOWMALL\Theme;

final class Assets
{

    protected static $_instance;

    public function __construct()
    {
        add_action('wp_loaded', [$this, 'register_packages_scripts'], -10);
    }

        public function register_packages_scripts()
    {
        // When in production, use the plugin's version as the default asset version;
        // else (for development or test) default to use the current time.

        $default_version = defined('WOWMALL_THEME_VERSION') && !(defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? WOWMALL_THEME_VERSION : time();

        foreach (glob(WOWMALL_THEME_DIR . 'build/*/index.js') as $path) {

            // Prefix `wowmall-` to package directory to get script handle.
            // For example, `…/build/admin/index.min.js` becomes `wowmall-admin`.
            $handle = 'wowmall-' . basename(dirname($path));

            // Replace extension with `.asset.php` to find the generated dependencies file.
            $asset_file   = substr($path, 0, - (strlen('.js'))) . '.asset.php';
            $asset        = file_exists($asset_file)
                ? require($asset_file)
                : null;
            $dependencies = isset($asset['dependencies']) ? $asset['dependencies'] : [];
            $version      = isset($asset['version']) ? $asset['version'] : $default_version;

            $theme_path = substr($path, strlen(WOWMALL_THEME_DIR));

            wp_register_script($handle, WOWMALL_THEME_URL . '/' . $theme_path, $dependencies, $version, true);
        }

        foreach (glob(WOWMALL_THEME_DIR . 'build/*/frontend.css') as $path) {
            $handle = 'wowmall-' . basename(dirname($path)) . '-frontend';
            $theme_path = substr($path, strlen(WOWMALL_THEME_DIR));
            wp_register_style($handle, WOWMALL_THEME_URL . '/' . $theme_path, [], $default_version, 'all');
        }

        foreach (glob(WOWMALL_THEME_DIR . 'build/*/editor.css') as $path) {
            $handle = 'wowmall-' . basename(dirname($path)) . '-editor';
            $theme_path = substr($path, strlen(WOWMALL_THEME_DIR));
            wp_register_style($handle, WOWMALL_THEME_URL . '/' . $theme_path, [], $default_version, 'all');
        }
    }

    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}
