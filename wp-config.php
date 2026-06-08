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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '>4P#kzZh 9qcblb6i!5Jx,#D#Nmow*U0oI)!Z;yPO_q{[^NASBi)<f8>`OUbS8;w' );
define( 'SECURE_AUTH_KEY',   '<pCu;PTn#w`}a#JGqTfQv}V:F-H{vQFRcc4m+=WVX*7t$*>=J;jh,Jn)TNeo/E.Y' );
define( 'LOGGED_IN_KEY',     'alo-)wAzI5j6:bWLsPBXI$#v_X{ss )NoiL)]T[L*JxlIVk4SA,#GM,}z0U~JV3g' );
define( 'NONCE_KEY',         '7xy;AmMwx^LRt#j#j:Jro#zh3;8VFSESR6S)Z.&r%j2(NdUs_Pf,x~IpCyn|Me)N' );
define( 'AUTH_SALT',         ';{yHBa2 K%27UTSw&hJZ)Qy`::aRiJ9%ten]|m2M:/XeKnCee<4{qx9>|C@AZ,G;' );
define( 'SECURE_AUTH_SALT',  'HZ@<x*Xw?,oM9IsZvJ+6f oG><OF.EeRA]Pc4p3f4ik.DXZ+9_XhNk/BD?EwXr1n' );
define( 'LOGGED_IN_SALT',    '8<XeW+Y)M~v%pUWOG)XRp,FX#A-|BIJF,%8/zf)/Ti^f{>wt@-pDb{6P?szyJ[|Q' );
define( 'NONCE_SALT',        'SbGF]xS:u}@G4I1?0eW=1${v2nsy<U31t]sdJ@}.)D5/MdqtY1^wM5I3[DnoncLS' );
define( 'WP_CACHE_KEY_SALT', 'F0Hg^o^Eh@ *LcTwM-J=dmknqN=7LCy^8/6+$orbSQ9&!sAS0nI*Q=JRL$M)Y-g0' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
