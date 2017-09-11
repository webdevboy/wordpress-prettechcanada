<?php

namespace PixelYourSite\FacebookPixelPro;

use PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Check if Easy Digital Downloads plugin installed and activated.
 *
 * @return bool
 */
function is_edd_active() {
	return function_exists( 'EDD' );
}

function get_edd_custom_audiences_optimization_params( $post_id ) {
	return get_custom_audiences_optimization_params( $post_id, 'download_category' );
}

function get_edd_product_price( $download_id, $include_tax, $options = array() ) {
	
	$price = edd_get_download_price( $download_id );

	if ( edd_has_variable_prices( $download_id ) ) {
		
		$prices = edd_get_variable_prices( $download_id );
		
		if ( ! empty( $options ) ) {
			
			// get selected price option
			$price = isset( $prices[ $options['price_id'] ] ) ? $prices[ $options['price_id'] ]['amount'] : 0;
			
		} else {
			
			// get default price option				
			$default_option = edd_get_default_variable_price( $download_id );
			$price          = $prices[ $default_option ]['amount'];
			
		}
		
	}
	
	$price = floatval( $price );
	$tax   = edd_get_cart_item_tax( $download_id, array(), $price );
	
	if ( $include_tax == false && edd_prices_include_tax() ) {
		
		$price -= $tax;
		
	} elseif ( $include_tax == true && edd_prices_include_tax() == false ) {
		
		$price += $tax;
		
	}
	
	return floatval( $price );
	
}

function get_edd_product_price_to_display( $download_id, $options = array() ) {
	
	if ( edd_has_variable_prices( $download_id ) ) {
		
		$prices = edd_get_variable_prices( $download_id );
		
		if ( ! empty( $options ) ) {
			
			// get selected price option
			$price = isset( $prices[ $options['price_id'] ] ) ? $prices[ $options['price_id'] ]['amount'] : 0;
			
		} else {
			
			// get default price option				
			$default_option = edd_get_default_variable_price( $download_id );
			$price          = $prices[ $default_option ]['amount'];
			
		}
		
	} else {
		
		$price = edd_get_download_price( $download_id );
		
	}
	
	return floatval( $price );
	
}

function get_edd_event_value( $option, $amount, $global, $percent ) {
	
	switch ( $option ) {
		case 'global':
			$value = floatval( $global );
			break;
		
		case 'price':
			$value = floatval( $amount );
			break;
		
		case 'percent':
			$percents = floatval( $percent );
			$percents = str_replace( '%', null, $percents );
			$percents = floatval( $percents ) / 100;
			$value    = floatval( $amount ) * $percents;
			break;
		
		default:
			$value = 0;
	}
	
	return $value;
	
}

function get_edd_product_tags( $product_id, $implode = false ) {
	return PixelYourSite\get_object_terms( 'download_tag', $product_id, $implode );
}

function get_edd_product_license_data( $download_id ) {
	
	// license management disabled for product
	if ( false == get_post_meta( $download_id, '_edd_sl_enabled', true ) ) {
		return array();
	}
	
	$params = array();
	
	$limit      = get_post_meta( $download_id, '_edd_sl_limit', true );
	$exp_unit   = get_post_meta( $download_id, '_edd_sl_exp_unit', true );
	$exp_length = get_post_meta( $download_id, '_edd_sl_exp_length', true );
	$version    = get_post_meta( $download_id, '_edd_sl_version', true );
	
	$is_limited = get_post_meta( $download_id, 'edd_sl_download_lifetime', true );
	$is_limited = empty( $is_limited );
	
	$params['transaction_type']   = get_edd_product_price( $download_id, true ) == 0 ? 'free' : 'paid';
	$params['license_site_limit'] = $limit;
	$params['license_time_limit'] = $is_limited ? "{$exp_length} {$exp_unit}" : 'lifetime';
	$params['license_version']    = $version;
	
	return $params;
	
}