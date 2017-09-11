<?php

/**
 * Plugin Name: PixelYourSite PRO
 * Plugin URI: http://www.pixelyoursite.com/
 * Description: With PixelYourSite Pro you can add the new Facebook Pixel with just a few clicks, create Standard Events, or use Dynamic Events. Complete WooCommerce integration with out of the box Facebook Dynamic Product Ads setup.
 * Version: 6.0.8
 * Author: PixelYourSite
 * Author URI: http://www.pixelyoursite.com
 * License URI: http://www.pixelyoursite.com/pixel-your-site-pro-license
 * Requires at least: 4.4
 * Tested up to: 4.7
 *
 * Text Domain: pys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'PYS_FB_PIXEL_VERSION', '6.0.8' );
define( 'PYS_FB_PIXEL_ITEM_NAME', 'PixelYourSite Pro' );
define( 'PYS_FB_PIXEL_STORE_URL', 'http://www.pixelyoursite.com' );
define( 'PYS_FB_PIXEL_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'PYS_FB_PIXEL_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'PYS_FB_PIXEL_PLUGIN_FILE', __FILE__ );

/** @noinspection PhpIncludeInspection */
require_once PYS_FB_PIXEL_PATH . "/vendor/autoload.php";

register_activation_hook( __FILE__, 'pys_fb_pixel_pro_activation' );
function pys_fb_pixel_pro_activation() {

	if ( ! function_exists( 'is_plugin_active' ) ) {
		/** @noinspection PhpIncludeInspection */
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}

	if ( is_plugin_active( 'pixelyoursite/facebook-pixel-master.php' ) ) {
		wp_die( 'You must first deactivate PixelYourSite free version.', 'Plugin Activation', array( 'back_link' => true ) );
	}

}

if( ! class_exists( 'PixelYourSite\PixelYourSite' ) ) {
	
	require_once 'api/pixelyoursite.php';
	require_once 'includes/integrations/facebook-for-woocommerce.php';

	// here we go...
	PixelYourSite\PYS();

}

function pys_fb_pixel_pro_register_post_type() {

	register_post_type( 'pys_fb_event', array(
		'label'      => 'Facebook Event',
		'public'     => false,
		'supports'   => array( 'title' ),
		'can_export' => false
	) );

}

add_action( 'init', 'pys_fb_pixel_pro_register_post_type' );

/**
 * Register plugin as PixelYourSite addon.
 *
 * @param array $registered_addons Array of registered addons instances.
 *
 * @return array
 */
function pys_fb_pixel_pro_register_addon( $registered_addons ) {

	require_once 'includes/class-addon.php';
	require_once 'includes/class-event.php';
	require_once 'includes/class-events-factory.php';
	require_once 'includes/functions-event.php';
	require_once 'includes/functions-helpers.php';
	require_once 'includes/functions-helpers-woo.php';
	require_once 'includes/functions-helpers-edd.php';
	require_once 'includes/functions-license.php';

	$registered_addons['fb_pixel_pro'] = new PixelYourSite\FacebookPixelPro\Addon();
	
	return $registered_addons;
	
}

add_filter( 'pys_registered_addons', 'pys_fb_pixel_pro_register_addon', 10, 1 );
