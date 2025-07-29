<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'C:\xampp2\htdocs\chifaCamila\wp-content\plugins\wp-super-cache/' );
define( 'DB_NAME', 'chifacamila' );

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
define( 'AUTH_KEY',         'L_6Y=>:h}vUHvdyA[@oBgdJ*=nx2/ANE K{Q,}_90V!_1!@u$Jc;2=+*A7VKUb5r' );
define( 'SECURE_AUTH_KEY',  '&Nqn&FT07Le09p(y1QQ[b&VOhbq{LL#@S?Ie LCe!D4yj(JCi8|{X{g`Eu1svVfT' );
define( 'LOGGED_IN_KEY',    'j4*3E{)nAeQW/>7-D#gV}3@X:,S&h!; Y-J^DD1{%R-Dv>xBj}0]LEdRIM=)3FZl' );
define( 'NONCE_KEY',        'O3:9N3Us:BJ26?PI<`Oq&*E`RT7p8:pTdu8s1x|01N##Qp rtujkyU[!xnsFb{nY' );
define( 'AUTH_SALT',        'gY[xyDT5o}/g_Vbvo46E,1Iqr`E=3qK#F:7$^bi?ZaH.D|hz=9(2N~HSd-$}3@$2' );
define( 'SECURE_AUTH_SALT', 'qa@ !_yx4WvTpI~0Udh yE<ac-j]_il?@hr/$r$08vj2flA%Yjn~KC<`5lS-qjZ_' );
define( 'LOGGED_IN_SALT',   'sS/l3ea`&pBWyCOHiF|>GXj~h>,}cJO-N6fix+pTkXZP_.-pvL($Zq#mA&pnJ,hc' );
define( 'NONCE_SALT',       'r~YSouEP,.9RP:T6!X@n<lu%vMVj7].5IcUtW+sEt=p*Rj_|Si|:r[8oWj%jmwr<' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
