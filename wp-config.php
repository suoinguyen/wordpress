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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'mysql');

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
define('AUTH_KEY',         'l],9j34>Q+@d[ER|G}8s3^!=sl>A*>@^)8H>lqq+4qPRiJrJF2K1+pfmY9S)Zb>%');
define('SECURE_AUTH_KEY',  ')4M)N+,1BA6O><ZKxzail,-Ekt>?>_%5d]G,cbvb[k@P6X6)s).yFnAGupZq,4!`');
define('LOGGED_IN_KEY',    'e;{=6ou*=~iH8H9[bKm>lvCGG(I`;VUuOf><7%lCd/@!oi%RZ`I^{V<vl.HRY/*E');
define('NONCE_KEY',        '-R8DfIg0+,k+@!%.Ugw6+1v.?gkJu:e;sgwsio3U;g(~~tg%I%Hev)/8SZlZ<#b{');
define('AUTH_SALT',        '1e2BU1V1nbS):Zt!OIgGa`5+~k_Ll{xrh,l^QXwA@wN`r0=]wNi> 66iptYTPq<<');
define('SECURE_AUTH_SALT', '0z=@|K(<P!.ks)R^Aquh.Gy8[(H}(c@rcfevJ`MdnnM4[W<&QVPX02>-Mf$](su`');
define('LOGGED_IN_SALT',   '`X? FbVFG11%.E%+7;566<iODe. &;gtkd}.!tB0q,3lKE V`@nTE%v1hTXv9L5I');
define('NONCE_SALT',       'Zfis8PWRO~@f&,sHqiWP%#tEKI1DbO5-hGl@o60,x(]zfVNv9l8T&G1(&2Av}Qyb');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
