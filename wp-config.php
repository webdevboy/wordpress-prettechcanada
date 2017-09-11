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
 //Added by WP-Cache Manager
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home2/tasteol3/public_html/prettechcanada/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'tasteol3_prettech');

/** MySQL database username */
define('DB_USER', 'tasteol3_ddmktg');

/** MySQL database password */
define('DB_PASSWORD', 'Mocha1234');

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
define('AUTH_KEY',         'saI2mDN3eRUyrdwdNxu1530J10WtEdlw8grbEQg6ELfEZ6QVruKdi6I8cXKeXUbK');
define('SECURE_AUTH_KEY',  'ag5NNNONEfvmSjIoG1KUmD2tUDCaRqRTTkPxs3FXXtlr8gk0D2P9eHE55ypZ7EOG');
define('LOGGED_IN_KEY',    'B1gXuiHz7oIBq4ppGKs9iSMPsBiljC0Uehg0kwcwIFCvkxidVY0kMBFA6SlvJHXT');
define('NONCE_KEY',        'rhgMnPqFajZ5N2sGx1qwnnSGks6U7NPSjdPT2we1nLAO7COKWs98FCG4NgPzuVkR');
define('AUTH_SALT',        '4bkCRzpENnuMwoV5tUPRMRv7hLWtpHQhIgyZd3jvtTnJyELUc0vCKT0NnAuhpImk');
define('SECURE_AUTH_SALT', 'uZJ7PKgTJNaUfTWkoWuLxGgVOLyqWsr5dZpLIkMVYjgBgzYCZbkHj0bZ63BcC4kh');
define('LOGGED_IN_SALT',   '1x4QeN7i9URYl4V7p3rGflZaYGy4UbqxjdmVCjoBYGTMfRdgMD2a8uRbWdcVsEBj');
define('NONCE_SALT',       'LzJKZnhIMaJLnctXFDR2bOowyeuIlJobJmRqfsy9TW0XwscGXFnfrPlp7Anjju4n');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
