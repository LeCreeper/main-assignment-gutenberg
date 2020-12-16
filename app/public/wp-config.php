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
define( 'DB_NAME', 'local');

define('WP_DEBUG', 'true');

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
define('AUTH_KEY',         'igVHWTwSZ9Aw3Z71ZRug9jw6AjDXhDglU+bHBDPHicyW//2adJwwH2aI/8jREuWX5EKKF++hUo3Do5jprcseow==');
define('SECURE_AUTH_KEY',  '+jtiD35APn/h120chiYbUsI9qs+U0uS+Zdx4iBU0FGB1vI8nxZGNu5S8FNlQ9LZpkjZyrX3y53kSoWsh+JPJPg==');
define('LOGGED_IN_KEY',    'G5EehSWdRCT2IcwNAtWzDv3vVPPv1nTAxf8uzcciY6vMJG7cNywQaaOKs7QqJ/Frgg6PjN3LH8XBm+ZuvLR5VQ==');
define('NONCE_KEY',        'U1urmjbddiB401BbhUGWM03rshph4jT1JAlb6LAg652iRniOoF/kkksb3Myf36s9OCdCdslkv4pqbBL9+R/6eA==');
define('AUTH_SALT',        'zAsAZn/9GZJVcy3y69IE8VDjgJ5Kt6bfFBoSOzC99IHWqrlhfhK5+FJGLMJj/4vouTjATGsDaE/uH19N8W/huQ==');
define('SECURE_AUTH_SALT', 'fpGGKnqhY9kd1etAR/N3aj1tMj2K7qfLIfkQUGf1lUI29v/PRkhyKkWAVvdl9PtkgaeO906TwToXIDRysdhdoQ==');
define('LOGGED_IN_SALT',   'x9ns6AebcUYTM+oBEOhah4erPVW4skNermSpZ+CvNPeChXPR/xb+svoY8KtWbpdB4CUAKNCUeDkYss3sBYBojQ==');
define('NONCE_SALT',       'yu6JBJB9S6Rx3fma+vsFhBGNzLc1Qmf3jBPNbhpCgYWaYYvdf11oQhE5WhVTjl+AADKgYQZpQjyWbLRtDmrTnw==');

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
