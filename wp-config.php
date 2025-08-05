<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'stellar_soft' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'db' );

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
define( 'AUTH_KEY',         'G!khS^H*[ssKL3F3X%Ls:<0HU ?!rJ9;%A.}cp,&0B4 V,(e>53a*+!e4m$r#Ez$' );
define( 'SECURE_AUTH_KEY',  'DuzSta4ULF `n|b2Z* %  ?Oy]q6yhm8$0zrY23xUUxSK,C])>m},Fm)3?b;WlBQ' );
define( 'LOGGED_IN_KEY',    'ex>z=Th;.]2B+*`KWugC>^;y@uto@mVb3wy[,[M}n77Yz}{nHh%81UDDp8iHOf{g' );
define( 'NONCE_KEY',        'qr3<JS2T=]elU+]&pcz+}Yt<3u<S&Y;+l42TI^7-_C,i,)5*ak<%^*HqTM~-]q_Y' );
define( 'AUTH_SALT',        'oPmpEIEd-MS?3#IGb9Lv3`+psbIqJn5vW<XH<w+/?}+sI5X-R##KB(hLa0s9T-GQ' );
define( 'SECURE_AUTH_SALT', '<p/GY@Cz<.*K2$|HBp,01KmSQFJ 5.CL OwCg;C/%g)cr9r1 (*#,e~U?A9cIWc/' );
define( 'LOGGED_IN_SALT',   '-h/BaR8w(0xsJ9CK-wlx`+7c4/U$j?^oY,1/_P!1>SG?U3}qmk{pG$E]Oz^.SKs<' );
define( 'NONCE_SALT',       '_%HM[*Z:^ &1rUgyzadgex1|}S33NcJx}IR84l68@iu.~w|a5%U[n=+;F&Y,d{%B' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */
define('FS_METHOD', 'direct');



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
