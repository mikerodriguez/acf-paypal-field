<?php
/*
Plugin Name: Advanced Custom Fields: PayPal Field
Plugin URI: http://mikerodriguez.me
Description: Add PayPal Single Items to your website with the use of WordPress and ACF
Version: 2.0.0
Author: Michael Rodriguez
Author URI: http://mikerodriguez.me
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


class acf_field_paypal_item_plugin
{
	/*
	*  Construct
	*
	*  @description: 
	*  @since: 3.6
	*  @created: 1/04/13
	*/
	
	function __construct()
	{
		// set text domain
		$domain = 'acf-paypal_item';
		$mofile = trailingslashit(dirname(__File__)) . 'lang/' . $domain . '-' . get_locale() . '.mo';
		load_textdomain( $domain, $mofile );
		
		// version 5 (ACF Pro)
		add_action('acf/include_field_types', array($this, 'include_field_types_paypal_item'));	

		// version 4
		add_action('acf/register_fields', array($this, 'register_fields'));	

		// version 3-
		add_action( 'init', array( $this, 'init' ));
	}
	
	
	/*
	*  Init
	*
	*  @description: 
	*  @since: 3.6
	*  @created: 1/04/13
	*/
	
	function init()
	{
		if(function_exists('register_field'))
		{ 
			register_field('acf_field_paypal_item', dirname(__File__) . '/paypal_item-v3.php');
		}
	}
	
	/*
	*  register_fields
	*
	*  @description: 
	*  @since: 3.6
	*  @created: 1/04/13
	*/
	
	function register_fields()
	{
		include_once('paypal_item-v4.php');
	}



	/**
	 *  include_field_types
	 */
	function include_field_types_paypal_item()
	{
		include_once('paypal_item-v5.php');
	}
	
}

new acf_field_paypal_item_plugin();
		
?>
