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
define( 'DB_USER', 'wpuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'W0rdpre!' );

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

   define('AUTH_KEY', 	      '2%/#?qj /Q!Apm>8`,:{H`6N=_84|nRDh!=@I+QCty- cs. j[QC+-iCq0q+Aq#0');
  define('SECURE_AUTH_KEY',  'rrJKz]+$Dg=[g|IAp8}vnU.KP7|pppLox)oLL1>r0<2 Ft kjn?>y-%0T8!Z-<Y*');
  define('LOGGED_IN_KEY',    'k@A=AY`,+eRat^YzR0Ba&G4A<D>wh:7,ufzw(Q|7{[`[QfL.owH+dv}J>IwQ6~].');
  define('NONCE_KEY',        ':*oF*VbO>+o @ycO540sw-7Bt3jntyXVZ|*!LpV=m=-B*nAdlmQFZ}$va;w2geI+');
  define('AUTH_SALT',        '|},9%+_#p (hz?Gq$%ikCp`Vz*+y]}z8SZWWV!qUL.nxRi@ngVkH<s&c,Jll=Ye|');
  define('SECURE_AUTH_SALT', '%^rgeB&`$}Vp_4HNyX- %emEET cnf]moEXfU-9ndTB`* 4c>+SE|bpI|MS+*7Xv');
  define('LOGGED_IN_SALT',   'E@fD>BtkD20m;Kx[?8;gA0h]i <c0`NNZfwY^83i$-A%>ZcP?*MHP+qd-I[|-k8/');
  define('NONCE_SALT',       '-E-d]{o$!QVngH7te86nhtY{5:^%x -72w1Xj|-E-K:A!|mhs+jnK*Q[Q+J-K]o8');
 /* WordP database table prefix.
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

/** Sets up WordPress vars and incl( 'ABSPATH' ) ) {uded files. */
require_once ABSPATH . 'wp-settings.php';
