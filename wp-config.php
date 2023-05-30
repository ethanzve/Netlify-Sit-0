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
define( 'DB_NAME', 'Netlify-Sit-0' );

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
define( 'AUTH_KEY',         'KWY 8Wn_?ot6#yDF[%JZ-Wt(!ox9w^:jFMrN6G#LzTaCyf<^^-@59 NZn)<ayhNq' );
define( 'SECURE_AUTH_KEY',  '&VUJhhEfi~edl45ZWMIK`7L7bk}ehWsw|7g~,w?*lUHKJ}4xRl:,&-}}Ca/L}h_P' );
define( 'LOGGED_IN_KEY',    'J&MQLcAF+]p)<N83.mJ/59(^i~|>@)&2N[#M$/t%VA1[e1w.30*+vfrMuZkuHz[-' );
define( 'NONCE_KEY',        'i9Yyd&ytFwoD*-0wUqom2%:YY&Hk#N!{H1(JAtky6}B=2?&{Dv6j5/Z~XsXp+F)K' );
define( 'AUTH_SALT',        '5D9bs$Sl{V.yN7VX3yiW-lW.64y<yZ)?/=PI7k05v>cIVHZirq>+VLFrNoB@#)kw' );
define( 'SECURE_AUTH_SALT', 'U*u.`u`[K7;t*FLFTNU;c}=zoJ&#MIyV8n V[- lJ{X6wv6ktuhIIHJA$5x~Lzvj' );
define( 'LOGGED_IN_SALT',   'S)`>! }r/CNFP:M[@Vt[cz!HV]v--k wBO#o:Q{ZZ(l]j(6u-cQ>#7Rhd%I2NT1w' );
define( 'NONCE_SALT',       '(]BjH-}vFXfg>S]}]-(!U<^T2HaQk[o|CYkU^]YLe +|S#kiJ137cJ768n8[EG6r' );

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
