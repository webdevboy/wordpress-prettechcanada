<?php

namespace PixelYourSite\FacebookPixelPro;

use PixelYourSite;

function is_facebook_standard_event( $event_name ) {

	$facebook_standard_events = array(
		'PageView',
		'ViewContent',
		'Search',
		'AddToCart',
		'AddToWishlist',
		'InitiateCheckout',
		'AddPaymentInfo',
		'Purchase',
		'Lead'
	);

	return in_array( $event_name, $facebook_standard_events );

}

function get_custom_audiences_optimization_params( $post_id, $taxonomy ) {
	
	$post = get_post( $post_id );
	
	if ( ! $post ) {
		return array(
			'content_name'  => '',
			'category_name' => ''
		);
	}
	
	return array(
		'content_name'  => $post->post_title,
		'category_name' => PixelYourSite\get_object_terms( $taxonomy, $post_id )
	);
	
}

/**
 * @param Event $event
 *
 * @return string
 */
function get_event_code_preview( $event ) {
	
	if ( $event->getFacebookEventType() == 'CustomCode' ) {
		return trim( $event->getFacebookCustomCode() );
	}

	$event_params = array();
	foreach ( $event->getFacebookEventParams() as $name => $value ) {
		$event_params[] = esc_js( $name ) . ": '" . $value . "'";
	}

	$event_type   = $event->isFacebookStandardEvent() ? 'track' : 'trackCustom';
	$event_name   = $event->getFacebookEventType();
	$event_params = implode( ', ', $event_params );

	return "fbq('{$event_type}', '{$event_name}', {{$event_params}});";
	
}

/**
 * @param Event $event
 *
 * @return string
 */
function render_custom_event_trigger_conditions( $event ) {

	$html = '<div class="trigger_conditions">';

	// collect event triggers
	$pages_to_visit = array();

	foreach ( $event->getOnPageTriggers() as $trigger_value ) {
		$pages_to_visit[] = "<code>{$trigger_value}</code>";
	}

	foreach ( $event->getDynamicUrlFilters() as $trigger_value ) {
		$pages_to_visit[] = "<code>{$trigger_value}</code>";
	}

	if( ! empty( $pages_to_visit ) ) {

		$title = count( $pages_to_visit ) == 1 ? 'Page visited:' : 'One of pages visited:';
		$html .= "<p><strong>{$title}</strong>&nbsp;" . implode( ', ', $pages_to_visit ) . "</p>";

	}

	$dynamic_triggers = array();

	foreach ( $event->getDynamicTriggers() as $trigger_options ) {
		$dynamic_triggers[ $trigger_options['type'] ][] = "<code>{$trigger_options['value']}</code>";
	}

	if( ! empty( $pages_to_visit ) && ! empty( $dynamic_triggers ) ) {
		$html .= '<p class="and_rule"><strong>AND</strong></p>';
	}

	$dynamic_condition_rendered = false;
	foreach ( $dynamic_triggers as $type => $values ) {

		switch ( $type ) {
			case 'url_click':
				$title = 'An URL clicked:';
				break;

			case 'css_click':
				$title = 'A CSS selector clicked:';
				break;

			case 'css_mouseover':
				$title = 'Mouse over on CSS a selector:';
				break;

			case 'scroll_pos':
				$title = 'Page scrolled (%) to a:';
				break;

			default:
				$title = '';
				continue;
		}

		if( $dynamic_condition_rendered ) {
			//$html .= '<p class="or_rule"><strong>OR</strong></p>';
		}

		$dynamic_condition_rendered = true;
		$class = ! empty( $pages_to_visit ) ? 'sub_rule' : '';

		$html .= "<p class='{$class}'><strong>{$title}</strong>&nbsp;" . implode( ', ', $values ) . "</p>";

	}

	$html .= "</div>";
	
	return $html;

}

function render_ecommerce_plugins_notice() {

	if( is_woocommerce_active() && is_edd_active() ) {
		include 'views/html-ecommerce-notice-woo-edd.php';
	} elseif ( is_woocommerce_active() ) {
		include 'views/html-ecommerce-notice-woo.php';
	} elseif ( is_edd_active() ) {
		include 'views/html-ecommerce-notice-edd.php';
	} else {
		include 'views/html-ecommerce-notice-no-woo-no-edd.php';
	}

}

