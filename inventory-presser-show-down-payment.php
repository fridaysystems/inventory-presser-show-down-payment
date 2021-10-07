<?php
defined( 'ABSPATH' ) or exit;

/**
 * Plugin Name: Inventory Presser Show Down Payment
 * Plugin URI: https://github.com/fridaysystems/inventory-presser-show-down-payment
 * Description: An add-on for Inventory Presser that adds down payments to the vehicle attributes table.
 * Version: 1.0.0
 * Author: Corey Salzano
 * Author URI: https://profiles.wordpress.org/salzano
 * Text Domain: invp-show-down-payment
 * Domain Path: /languages
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

add_filter( 'invp_vehicle_attribute_table_items', 'invp_add_down_payment_to_attribute_table', 10, 2 );
function invp_add_down_payment_to_attribute_table( $labels_and_values )
{
	$down_payment = invp_get_the_down_payment();
	if( empty( $down_payment ) )
	{
		return $labels_and_values;
	}

	$item = array(
		'member' => 'down_payment',
		'label'  => __( 'Down Payment', 'invp-show-down-payment' ),
		'value'  => $down_payment,
	);

	return $item + $labels_and_values;
}
