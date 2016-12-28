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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */
//define('WP_HOME', 'http://localhost');
//define('WP_SITEURL','http://localhost');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'thao');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '*w}c:#8l+:`37[siPzkE+3-KwH8,eOOWwfE|j^DdDjst^!QK)_4Ax~19P+^M%A5&');
define('SECURE_AUTH_KEY',  'i.T>6NF 7Y^)2I)^-fcIg|4?SgYdZ*r]03#=ederi80YgG8GWU}*[THfp=7Xr &*');
define('LOGGED_IN_KEY',    'UhiH}Zff^Y^/T$?)Gf95Vw1U1P++j{%piF SCGO,}S9Tj`sHFv|@=)R,=1t-:Z9v');
define('NONCE_KEY',        'LL!Ig.#<)lw$@Y?=MG74ty}c3w;Dy_O)R`MTcj9ZrCh+>|3bnwTy8jnz%*1T0/&I');
define('AUTH_SALT',        '``L[d-PYRUq7Fn2;!k/RC3;6th=k9)|>UYGiwNpibXb$eg|?x+k1]`AZG+ZUjS*E');
define('SECURE_AUTH_SALT', '|pzak`FmSI[4g!u(Z(L|O/B :%NZ2+lS-^,ohSd-8DH+YxNUP>MNW Ct5+{C3)To');
define('LOGGED_IN_SALT',   '%vNgSUhuw!+U-OY#uzL3-WQ{k&d(m]~Y[f(2&5f1mzP8)Gg_2smc|0|$ }0DW%!!');
define('NONCE_SALT',       '*|Fh~M>>5[Oj4|ZPw}f__VAD$A+c`Q,dx?kBG?Knl!`K[2weR(XZB5k<?exR`f,^');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
ini_set('memory_limit','500M');
define('WP_MEMORY_LIMIT', '500M');
ini_set('max_execution_time',10000);
ini_set( 'upload_max_size' , '64M' );
ini_set( 'post_max_size', '64M');
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
