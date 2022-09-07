<?php

$plugin_slug = 'gutenberg';

$plugin_path = "{$plugin_slug}/{$plugin_slug}.php";

$plugin_activated = is_plugin_active( $plugin_path );

$plugin_installed = array_key_exists( $plugin_path, get_plugins() );

$plugin_installing = isset( $_GET['action'], $_GET['plugin'] ) && $_GET['action'] == 'install-plugin' && $_GET['plugin'] == 'gutenberg';

if ( ! WOWMALL_THEME_DEVELOPMENT_MODE && get_user_meta( get_current_user_id(), 'wowmall-notice-gutenberg', true ) && $plugin_activated && $plugin_installed ) {
	return;
}

?>

<div class="notice wowmall-notice">
	<div class="wowmall-notice-inner">
		<button type="button" class="notice-dismiss" data-dismiss-notice="wowmall-notice-gutenberg">
			<span class="screen-reader-text">
				<?php esc_html_e( 'Dismiss this notice.', 'wowmall' ); ?>
			</span>
		</button>
		<span class="wowmall-notice-logo">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="14.5 15.2 69 69" role="img" aria-hidden="true" focusable="false">
				<path fill="white" d="M74.16 71.68a33.33 33.33 0 10-8.39 6.88l10.15 3.11a.48.48 0 00.6-.57zm-25 4.57a26.58 26.58 0 01-26.63-26.58v-.1a26.49 26.49 0 013.61-13.38l6 4.82 3 8.29 3 8.89a.51.51 0 00.47.34h21.46c.34-.05 3.45-.59 4.4-4.62l3-10.39s2.32-5.85-4.44-6.12H49.72a.5.5 0 00-.48.65l1.66 5.05a.48.48 0 00.47.35h9.13a.5.5 0 01.48.63l-2.31 7.85a.48.48 0 01-.47.35H43.49a.87.87 0 01-.74-.51c-.23-.42-4.72-12.71-5.4-14.57a.16.16 0 000-.07l-7.36-6a26.58 26.58 0 0145.7 18.44v.1a26.58 26.58 0 01-26.58 26.58z"></path>
				<circle fill="white" cx="57.31" cy="65.52" r="4.28"></circle>
				<circle fill="white" cx="42.48" cy="65.52" r="4.28"></circle>
			</svg>
		</span>
		<div class="wowmall-notice-content">
			<h2><?php esc_html_e( 'Thanks for installing Wowmall!', 'wowmall' ); ?></h2>
			<p>
				<?php esc_html_e( 'Wowmall is an experimental full site editing theme.', 'wowmall' ); ?>
				<br>
				<?php esc_html_e( 'This theme requires the latest Gutenberg plugin version. Activate the plugin to view the theme.', 'wowmall' ); ?>
				<br>
			</p>

			<div class="wowmall-notice-actions">
				<?php
				if ( $plugin_installed ) {
					if ( current_user_can( 'activate_plugins' ) ) :
						?>
						<a href="<?php echo wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin_path . '&amp;plugin_status=all&amp;paged=1', 'activate-plugin_' . $plugin_path ); ?>" class="button button-primary <?php echo ( $plugin_activated ? 'disabled' : '' ); ?>"><?php printf( esc_html__( 'Activate %s', 'wowmall' ), 'Gutenberg' ); ?></a>
						<?php
					endif;
				} else {
					if ( current_user_can( 'install_plugins' ) ) :
						?>
						<a href="<?php echo wp_nonce_url( self_admin_url( "update.php?action=install-plugin&plugin={$plugin_slug}" ), "install-plugin_{$plugin_slug}" ); ?>" class='button button-primary <?php echo ( $plugin_installing ? 'disabled' : '' ); ?>'><?php printf( esc_html__( 'Install %s', 'wowmall' ), 'Gutenberg' ); ?></a>
						<?php
				endif;
				};
				?>
				<a href="<?php echo admin_url( 'themes.php?page=wowmall' ); ?>" class="button button-primary"><?php esc_html_e( 'About us', 'wowmall' ); ?></a>
			</div>
		</div>
	</div>
</div>
