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
define( 'DB_NAME', 'db_waves' );

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
define( 'AUTH_KEY',         '7|VK6X.lwB?Z>n39bv4(T@BP#cl$0WH;:EaG>MW[n?-whHEe~k/|lDQ&&@Fb3/$X' );
define( 'SECURE_AUTH_KEY',  'el?[e2gWL.l5(OPnwcA#=Xo|etjnXH{JIg:9+>ffOW TRl*oP;3*8qh iIJ g#:o' );
define( 'LOGGED_IN_KEY',    '939eX_nT^+.jhOA~i<euxgqK7UMP0l|-+6gr#;@%v}%tEz*C(57&-UEetSb|-Od9' );
define( 'NONCE_KEY',        'yPXHo)BW1CUIQI=G#gX0vRnMiwQa0Cg_5dwRFVV656A4-m/i+ZY 28]5n;M12#p2' );
define( 'AUTH_SALT',        ')g6szc.I&vQoy:)/OUct1VDzNEkD[*&69[=!,m )QJ.>RW[yrcYvR)]j3YaN~o3j' );
define( 'SECURE_AUTH_SALT', 'aqTp(l!l6BgSSj*s%+2QqVvYRjTOQPJ?s{IspOFR_>)l9p_PiyPDZTX~{_|fZ&b}' );
define( 'LOGGED_IN_SALT',   '4yDscZE]B.,*0uqk?#g-Y5ubS)GaT@fvPCA9)^S=/KL|5FnS6w}cSVUs^~e0;(A/' );
define( 'NONCE_SALT',       'KNPaq<hI8>+iz#K,3U=,hcmfYi3RmNJ{3|HO)a2%M5jE+Ak] naNcU`7sP%yauBw' );

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
