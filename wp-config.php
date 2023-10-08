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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'pinoy' );

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
define( 'AUTH_KEY',         'hL;<^lPG*}O-9oedrJ(gX 0gjTIIa, a@kp8j32N`#fx/Fs{eS4?GmcmLQ2:PV>V' );
define( 'SECURE_AUTH_KEY',  '7uP E}ZnC4rlJc.ndG.Imm(5=T}%>IrX;;Rft1v=hx^K|D95x)i_FABf.%`$WKx;' );
define( 'LOGGED_IN_KEY',    '0lGOB:A|5;eIGW-g2`0U$G[Pu::#ceh/[~|j%z m!IlDO)0lD!ls5DhXwe`;>,YJ' );
define( 'NONCE_KEY',        'dO17*Yg<EEy=rI23,n%s1g<grm}7{W!i;m4FNQbYud[H@`m~e-(=rhxICT>O`_q%' );
define( 'AUTH_SALT',        '<I~bTQ8(5>o<n_zhv~2]e .x[M~.xBecF(RGY2&Q1h:7:+E`@/TXc.-p<5uY]RWT' );
define( 'SECURE_AUTH_SALT', 'ZBeol2qm2_*S+e=V(.ME!#M{OJ3>1t^m(e3/6+c.$mCx<@Ek6u0wp0tTb9YLa0.[' );
define( 'LOGGED_IN_SALT',   'byAa1t.(O&n4o}SoC5~y/<bMXb$^}d^d]eLO8h4.*!)9Vteq:(~E%pO8}3)@TH~B' );
define( 'NONCE_SALT',       ' 4q/Gl%k#!`rZy<|f;LQVS)g%C <}Q%liKzPPFn%!sY#E!Wz9o_YC YQL5|1&kWg' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'bdbxpinoy_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
