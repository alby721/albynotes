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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+lrMrH32aRAI3Bcc7LAvLY8nguZ9ZmNTarAfCgOYFcSax8I+P2CEZixz8HpDBrk7rNL3GS2QoOpovUTrOQT/RA==');
define('SECURE_AUTH_KEY',  'mFVuBjVr8Ddlc3Aipl5dxdK1St0TCX9ttRv08keG6JKKYloCl6+pyZQdSH989TFvtE2Jq7bMoRox6hl26EEQgA==');
define('LOGGED_IN_KEY',    '0cT+mdliaZaGtTw4a5dQO7ry+1e2cNXtUi7gCwVuVsAaOnmd2mlXRM4OKWVi9lc6ywoYJ62prR3frcTHt0Iw3A==');
define('NONCE_KEY',        'k2vncd91gHFTkgLkEBNtz+ihcFaxfdgoCYUb00DIRnKoUw0Oc/1IJ2CtLjaYEC6a1uD8dEAWviPhG+RwFHOkKw==');
define('AUTH_SALT',        'MpU0W/NQmlah+jQqU+oFE6xiHUAJoxxiU7Ckfp0o2mfl6cOT4yuWEo+qLSLcoxkbQJCua1/ToX0Yl442s5PUfA==');
define('SECURE_AUTH_SALT', 'wvx6tO2YtVtwtcgfv7tO9SuHu8+tTs8cmy+cjNrg5yiyYqkf5Vyo5ptTNlSGTl0RaxtL0m0UukgmHMozHgDMGA==');
define('LOGGED_IN_SALT',   'LImaVWf8yK09MOA8vTk/AYqND70VKHuhd7ynfuSy1pNkPZpP5q+RJbGb3QJHy1k7T2GbJ053KIJsCXyFiJAu3g==');
define('NONCE_SALT',       'Q/tSYTazKAH87yRSIBkGZhrOkW0wDG7xB9IocU73SALmEd67f/nsFy8FHk+C4Dhf5Vtmjgsph+AOYvZmFTAmGQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
