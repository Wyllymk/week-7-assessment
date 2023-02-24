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
define( 'DB_NAME', 'week-7-assessment' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'vO-36aO3N?2U. z}[YYs:S`%c93)..o/6~(,2t>Q#Fog@p4eNQHIW-8l)3eqKK.^' );
define( 'SECURE_AUTH_KEY',  'vE.@U}.z;=og ujQs~SEb {5y,e5l%!92fS7nl!^Oj+~U%r@Mg&.&,<mj)35||-d' );
define( 'LOGGED_IN_KEY',    'a,mgDA [:l6d$cZ.x,rKlU~&a+dW@e8_UoEE/aR0nlTs<0Jcsb6K{qe/l3f+/>4#' );
define( 'NONCE_KEY',        '`&4=>Xrky]1WYwQdT/7Glk 2)6^oL7wko-SmUS:3<<7),dz:w8jQjHMgD~xB{qs.' );
define( 'AUTH_SALT',        '>9JM>bW2p5R#= _{rg>uw5DzkH.k01cxZ{tx5DS&OZ<kMBGy=o96*ft94gfks*y0' );
define( 'SECURE_AUTH_SALT', '4iNt_KQ/PZ~0T}*H}/#5/<+`t-XVi4+?AF~75LGF%2[U5_rkZ#e`L5&+uc9%XItP' );
define( 'LOGGED_IN_SALT',   'Xfk!;Q?mE|X/X=4!pd17sFmoVM+j< ^Bp0YIBV2Mb=,HwI%<[kzqwrUT%akYi*w8' );
define( 'NONCE_SALT',       'X10(Jh? m;R5:b:SJneZLpB#FhEaEbRZ_q8]aGFn^;rh@(k0q5`Ib--@HbfbUha.' );

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
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
