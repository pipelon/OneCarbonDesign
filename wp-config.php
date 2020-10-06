<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_onecarbondesign' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'gOOP}B/a[~,DUS,y?W%QaW^5Ide7/Ymq%%UrDwm+.v]{-oAdju:8H>|m2,9!EW6y' );
define( 'SECURE_AUTH_KEY',  '$H5Si=+RaM/E:fEOFWT*B2IkRL;Fp%TDBr|S2^-*]>=0tsK4g-;8axnI7,QQMGxb' );
define( 'LOGGED_IN_KEY',    'ZvR1x{BoagQd[<qW[goNHcF{*oPJWw,!{/Q]ZIo-S32QMQ1^{RJ^sNy3yB]Fauf:' );
define( 'NONCE_KEY',        'e]a`ADL k3Zrl~Ae^c>A6>rqH,nkU(hlUR(RD*bEb@. ?vJ<m64r p)eavdR;<.)' );
define( 'AUTH_SALT',        '@WkhWOxCZwvd$|zpT)~_QFdlpzqfy(_hW-2IW  K^c/*$D*Nl|/{e[?Z-2gVm>#Q' );
define( 'SECURE_AUTH_SALT', 'y ;UWVg_~ldIeU>~MeX YCLU=13n{{?|bd2)7D7p|/}ktNw@iw]$7-eQF*b}X2C3' );
define( 'LOGGED_IN_SALT',   'R(}%mE=a|,ugH1ES@xo^TdX3AXn-IVO/r6P*$*|F2&<m_v^k/JDlO{%^yo?>a&BG' );
define( 'NONCE_SALT',       'dsAI4C6X4,^m1rm{NDYSFN0kf13)0?`H2CEVGu:l~kBg a8&*8$<&aabl7[8XiEb' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ocd_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
