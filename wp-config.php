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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
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
define('AUTH_KEY',         'lXrCK?4ENXJ,$FsVowG~s~%6ows;;TBD+JB;F*fPaj<_<)=uL3}Eoz?q-)-?6blM');
define('SECURE_AUTH_KEY',  '}Lpd^R iiHJL%r,=^S}>ppX;5m|uLcf=TO!hF&z^a,z-/+:9@-YPJ r3OJh?`a+4');
define('LOGGED_IN_KEY',    '+8*`|{{T2!,0-NjxL/3EeGAq#XG!&D-)y1lbvE;hc1W!;uJMid-P-(.-|_#:{$^!');
define('NONCE_KEY',        'QB3c-y6$2+Bua.he*Y~Qa/dU)4N-z`I*)[cA/JBJ~0Km<%QGYo$n+~vPfOb`#Ab(');
define('AUTH_SALT',        'UQ*?;Y{ymdiH!xPeO^g5h]BVNoY-OO?Xd}J()Nt<KO-YKIBFjPegQ$~j& aeQx#^');
define('SECURE_AUTH_SALT', ';5*48>7-?q@[}igMJ4a@f45-qm>x<EsfU2ERc6r:~E*U-d`=)m-1yK43VF7+BqX]');
define('LOGGED_IN_SALT',   'sxA=gkaCUW-1ZF)|g+3G|&)$/iycOzz*OOugDu?FS/Xsno j#!L^JLe,LUV7PCHR');
define('NONCE_SALT',       '{E>lpS43Jav5KMT1BU$zlz8{+b=J|VZ9:>js*9;qFY|mR*V9zHx#SM$p^2;@sq1y');

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
