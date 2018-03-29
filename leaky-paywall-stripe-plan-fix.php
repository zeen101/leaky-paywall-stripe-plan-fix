<?php
/**
 * Plugin Name: Leaky Paywall - Stripe Plan Fix
 * Plugin URI: https://zeen101.com
 * Description: This is a fix for Stripe accounts that are using an API version greater than 2018-02-01.
 * Version: 1.0.0
 * Author: Zeen101
 * Author URI: https://zeen101.com
 * Text Domain: mytextdomain
 * License: GPL2
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Create a plan with the product field 
// https://stripe.com/docs/api#create_plan
add_filter( 'leaky_paywall_create_stripe_plan', 'lp_create_product_for_stripe_plan', 10, 3 );

function lp_create_product_for_stripe_plan( $args, $level, $level_id ) {

	$args['product'] = array(
		'name' => esc_js( $level['label'] ) . ' ' . time(),
	);

	unset( $args['name'] );

	return $args;

}