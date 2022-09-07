<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ecommerce' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'qwerty123456' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'W47O,9C*V[z10e#5(9RyZ`PQ&wja5P|pUKrL7J@Zm(lUCrgjK)-oR&]qKC_0,{S}' );
define( 'SECURE_AUTH_KEY',  'dJ].O4SRDdy A`qmwslob$u*O3<eBm:!!MQV(#l,fsW/>J5P>_cFcUIe}>PL $Bl' );
define( 'LOGGED_IN_KEY',    '3,(_*bJ>=:5N-r|s *IYbB&GgSFb<C_s%^Rh;VTV5m%D_*WVe0JdrtNM!JsbQU&f' );
define( 'NONCE_KEY',        '!_T{C8XD!y1ugFKg&V1?>D]H{>p$!-T|oJN2,6.1AKTMm.=E3LG]i$%=4Z>l/=gG' );
define( 'AUTH_SALT',        'Fae>|.LGS)/>w~s0Q8QXD%phkM_`BOFxV*xCaXLMwNk-%FuB%q}tBU]Y/FuZ67_m' );
define( 'SECURE_AUTH_SALT', 'D{Q;bTiT|hb}r&DMM3NLMNV:&~Rz*qi-H^ykM8-LnTn|L6,qhMG2j3P~d^Oo}&;u' );
define( 'LOGGED_IN_SALT',   'b!>;nf?ZFZtLys%1J4v;[PRG: uPp. yBMPoG{V&a/r d4$./S{gaPNajoK(~dtn' );
define( 'NONCE_SALT',       '.D|sM[w=E?V]u5[GHXv?+`fdasI.bpka{^htN*t^rh/=^II>R_r<Z9!D3q7?XsjD' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
