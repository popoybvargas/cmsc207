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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cmsc207' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ')Hh.R9 yRlH9[FS59}R@wLNDF**?5KS,$0Kd6s`?t&GPiJhM(:L<YY{BoIC=Q72(' );
define( 'SECURE_AUTH_KEY',  'D-jsp!y[tBN5X @%[#>L&u+FyEtx?{r,~=TIc0b =q;%aK#-E0bCZk,=/K;C>7ij' );
define( 'LOGGED_IN_KEY',    '!3lP5oP.5n?`?{4w4Rp{>v0$K{xfH.XgaHY~G8F}nit]^#w/<[T(K2H{ 6]X!6B_' );
define( 'NONCE_KEY',        'Oa<&BY8oDrR.1gD m=L1/Va13<si)Mm>Gf0B7xU$6#3oqgtU_8$CLNEl0]BZ}|C5' );
define( 'AUTH_SALT',        '4jUc-}HWj3RA$jL0_A:v A>jNw(~TS=Fh$4WB ZeuqxJx}RDl546t=4G=u<9 sZH' );
define( 'SECURE_AUTH_SALT', 'S}G0.q@$Ks0mVTU_PYcKn_0Iv78n-;6>Fm;UTq3o.?h#.b#f5O5Rz6%S5H#O$j=?' );
define( 'LOGGED_IN_SALT',   'IG?z29<B9Iv,(HoWMU,XKS&tU{W<#,3H5?M0&Bx:L_iAZIl-s:{:!$})ATS V^Y[' );
define( 'NONCE_SALT',       '=jpUl*>kE/D+mTD#rz[f/_nZ,5qQfg%%RS2{lrKQHQ(=s_I%Q8;I1,qdXH{7v28Q' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
