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
define( 'WP_MEMORY_LIMIT', '256M' );
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'MySQL_2750_swogcwp');

/** MySQL database username */
define('DB_USER', 'swogcweb');

/** MySQL database password */
define('DB_PASSWORD', 'mattANDeric');

/** MySQL hostname */
define('DB_HOST', 'my01.everleap.com');

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
define('AUTH_KEY',         '7SO {ad_ rOeO7`xzA&-YYZw2Q1CB^D/$Ao7]Hv zBsv<7C-g%IHQ`quN/>B;SSd');
define('SECURE_AUTH_KEY',  'Q397:Q25?$YZ.}65-iujLU2hi_jPK`%MhMCiQ_c`/ S-[}eWQRY7J~ILk8=N3]9f');
define('LOGGED_IN_KEY',    'E20slxK(M_U$6P9(mJ)Y6k]U{pwVqt!9}BJOD&h&#7)uwY/SMbU9|wWd 4JyJZ<(');
define('NONCE_KEY',        'xjs-~BljY}Hgc`rpdqii9RON=6{jo$CwT3HfU-(!<t6,%oy^n&qPH.T<%jYv]d6x');
define('AUTH_SALT',        '}9+l#>@#M0410h*g.@`I-Y7}1 y<z,LXkO=/yXjg>>^<5rM^#5c#MVHn5f1dlOu6');
define('SECURE_AUTH_SALT', '*)q|~O)Sac:bsU7=La)US/+7/=rhtxUlVKn:abc9q@aB nfYXG#+[Ys:,X0jN /K');
define('LOGGED_IN_SALT',   'ut^xFl9PB$y+&aN(A=0g9zqT4*$G50,V:Ikg@x;&!9|]Y?do C 1abXGpZsN_&3S');
define('NONCE_SALT',       '~5($Q8ZtI)$gOEBeRo]1RV[jQH=a9j2qmA>^EE*VIPX&s~RP^U)1n#W:i{lSqrGC');

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
