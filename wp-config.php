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
define( 'DB_NAME', 'short_code' );

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
define( 'AUTH_KEY',         'aI=4b F{H3`lmU/:b.Gr~|xTWq.*7iFnpTiW+u+86=!3*ci^#?m@(!$7+sUbmwIl' );
define( 'SECURE_AUTH_KEY',  ';egZ`kSK}}v@>G|!@Jb{tNtQ1Yt!Y4%,BH5cj.opI!-XfO+DlAi&+ToGQWcc*!}d' );
define( 'LOGGED_IN_KEY',    'UEFqQD,5WNOBoIkZ%q<hBz&Y1UsGB,(7}|9uW<:}:)wt3/-9[^6?ea[9I5-~^Co>' );
define( 'NONCE_KEY',        'I?dPc_ 1YrZX8knF;;]rqKcJLfs<0G: smkC@Bq(^x=R9f!.u6T{f(#j_k6*BVt:' );
define( 'AUTH_SALT',        '2I4RFQ3*iEs$qjadr;W20NajJ?::y,n4<QQ[&g`|!aWS.`Pr^*>cQOu?ng=Y#vD@' );
define( 'SECURE_AUTH_SALT', 'LwoQ?oYe 1-^9nr/9@MOX}~GfclJ)fz]*XV`~(/>p~sEF+W.TJ`>v7!$Ej&Wj*am' );
define( 'LOGGED_IN_SALT',   'jBYFxDl_=lRdO_WgPS)v)=Jk!Ih7NL<=ydlUFJ%xAN[EBCw[5`UIHs*#[D*bovR1' );
define( 'NONCE_SALT',       'x_0$,T$SOW*{x#.fAWs$M]L]/*]RS`GK3r&;%oLs[c78`nEjF/Y$JkvliOn.o:c}' );

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
