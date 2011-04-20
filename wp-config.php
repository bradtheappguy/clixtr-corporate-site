<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'z5V):y^7fMA,c l^bQ2]II0bWe5f%I]P)*y?46u6AUlvWp?|Q(VZr6hP&Kx^1^q+');
define('SECURE_AUTH_KEY',  '{02g)f}y5Tc=?]->jx@}RI!+l5sVjrsWrZ9a5&36j17i*RE:M3j2^LuPA-c.lhM1');
define('LOGGED_IN_KEY',    'dOe-708k wA>Qv=Z49w;G=hFUxq6Bd8|SMh{d{Ip6Ie<?OWesYPu`EQl?=1o(1U_');
define('NONCE_KEY',        'g]u(ipg9EcyUgARvKvtKA2 0y)$MAlt##kDpa4z!AbDstcgXiNNdqP$!_FpD0lUl');
define('AUTH_SALT',        ',gd{~.aICkSOfUv$u*1{oLNTg1?B7&Jq<I:,]7v|B&61@bw|BuOz=b?JqYsK!uHo');
define('SECURE_AUTH_SALT', '*VmZ,h,Hx7[JJ#~7W))><_-4X)(x9zih3-6UW7~-O]!fYhB?8ly0@oVW|&4YTRC1');
define('LOGGED_IN_SALT',   'Iv 8ti$97ZfJ8Og12~g,rHaLwkUz]ahhO$+d#->mDD)xGHfw^{q}9:j{r-TPh~M1');
define('NONCE_SALT',       '`^}NqDE78kBWt^D>&cYw%ZYs6xdsN!Fo5)!?2+Z6rWEZDN-wfR~Pic:XZTDqUj3k');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
