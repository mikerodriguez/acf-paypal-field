<?php

class acf_field_paypal_item extends acf_field
{
	// vars
	var $settings, // will hold info such as dir / path
		$defaults; // will hold default field options
		
		
	/*
	*  __construct
	*
	*  Set name / label needed for actions / filters
	*
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function __construct()
	{
		// vars
		$this->name = 'paypal_item';
		$this->label = __('PayPal Item');
		$this->category = __("Content",'acf'); // Basic, Content, Choice, etc
		$this->defaults = array(
			// add default here to merge into your field. 
			// This makes life easy when creating the field options as you don't need to use any if( isset('') ) logic. eg:
			//'preview_size' => 'thumbnail'
		);
		
		
		// do not delete!
    	parent::__construct();
    	
    	
    	// settings
		$this->settings = array(
			'path' => apply_filters('acf/helpers/get_path', __FILE__),
			'dir' => apply_filters('acf/helpers/get_dir', __FILE__),
			'version' => '1.1.0'
		);

	}
	
	
	/*
	*  create_options()
	*
	*  Create extra options for your field. This is rendered when editing a field.
	*  The value of $field['name'] can be used (like bellow) to save extra data to the $field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field	- an array holding all the field's data
	*/
	
	function create_options( $field )
	{
		// defaults?		
		$field = array_merge($this->defaults, $field);
		$field['paypal_email'] = isset($field['paypal_email']) ? $field['paypal_email'] : '';
        $button_label = ( isset($field['button_label']) && $field['button_label'] != "" ) ? $field['button_label'] : __("Pay Now",'acf');
        $field['enable_quantity']   = isset($field['enable_quantity']) ? $field['enable_quantity'] : '1';
        $field['currency']      = isset($field['currency']) ? $field['currency'] : 'USD';
        $field['country']      = isset($field['currency']) ? $field['currency'] : 'US';
		$field['button_label'] = ( isset($field['button_label']) && $field['button_label'] != "" ) ? $field['button_label'] : __("Pay Now",'acf');

		// key is needed in the field names to correctly save the data
		$key = $field['name'];
		
		
		// Create Field Options HTML
		?>

		<tr class="field_option field_option_<?php echo $this->name; ?>">
	<td class="label">
		<label><?php _e("PayPal Email Address",'acf'); ?></label>
		<p class="description"><?php _e("Please enter your PayPal Email Address",'acf'); ?></p>
	</td>
	<td>
		<?php 
		do_action('acf/create_field', array(
			'type'	=>	'text',
			'name'	=>	'fields[' .$key.'][paypal_email]',
			'value'	=>	 $field['paypal_email'],
		));
		?>
	</td>
</tr>



<tr class="field_option field_option_<?php echo $this->name; ?>">
	<td class="label">
		<label><?php _e("Button Label",'acf'); ?></label>
		<p class="description"><?php _e("Customize the label of your button. <em>Default: Pay Now</em> <br><br> Note: <em>Use the CSS class (.item-field_button) to customize look of your button.</em>",'acf'); ?></p>
	</td>
	<td>
		<?php 
		do_action('acf/create_field', array(
			'type'	=>	'text',
			'name'	=>	'fields[' .$key.'][button_label]',
			'value'	=>	$field['button_label'],
		));
		?>
	</td>
</tr>

<tr class="field_option field_option_<?php echo $this->name; ?>">
	<td class="label">
		<label><?php _e("Enable Quantity?",'acf'); ?></label>
		<p class="description"><?php _e("Allows user to change quantity on the front-end.",'acf'); ?></p>
	</td>
	<td>
		<?php 
		do_action('acf/create_field', array(
			'type'    => 'radio',
			'name'    => 'fields[' . $key . '][enable_quantity]',
			'value'   => $field['enable_quantity'],
			'layout'  => 'horizontal',
			'choices' => array(
							'1' => 'Yes',
							'0' => 'No',
						),
		));
		?>
	</td>
</tr>








<tr class="field_option field_option_<?php echo $this->name; ?>">
	<td class="label">
		<label><?php _e("Currency",'acf'); ?></label>
		<p class="description"><?php _e("Select Currency ",'acf'); ?></p>
	</td>
	<td>
		<?php 
		do_action('acf/create_field', array(
			'type'    => 'select',
            'name'    => 'fields[' . $key . '][currency]',
            'value'   => $field['currency'],
            'choices' => array(
                                'USD'  => 'USD - United States Dollars',
                                'AUD'  => 'AUD - Australian Dollars',
                                'CAD'  => 'CAD - Canadian Dollars',
                                'CHF'  => 'CHF - Swiss Franc',
                                'CZK'  => 'CZK - Czech Koruna',
                                'DKK'  => 'DKK - Danish Krone',
                                'EUR'  => 'EUR - Euros',
                                'GBP'  => 'GBP - Pounds Sterling',
                                'HDK'  => 'HDK - Hong Kong Dollar',
                                'HUF'  => 'HUF - Hungarian Forint',
                                'ILS'  => 'ILS - Israeli Shekel',
                                'JPY'  => 'JPY - Japanese Yen',
                                'MXN'  => 'MXN - Mexican Peso',
                                'NOK'  => 'NOK - Norwegian Krone',
                                'NZD'  => 'NZD - New Zealand Dollar',
                                'PLN'  => 'PLN - Polish Zloty',
                                'SEK'  => 'SEK - Swedish Krona',
                                'SGD'  => 'SGD - Singapore Dollar',
                                'USD'  => 'USD - United States Dollars'
                            )
		));
		?>
	</td>
</tr>









<tr class="field_option field_option_<?php echo $this->name; ?>">
	<td class="label">
		<label><?php _e("Country",'acf'); ?></label>
		<p class="description"><?php _e("Select Country <em>Default: (US) - United States</em> ",'acf'); ?></p>
	</td>
	<td>
		<?php 
		do_action('acf/create_field', array(
			'type'    => 'select',
            'name'    => 'fields[' . $key . '][country]',
            'value'   => $field['country'],
            'choices' => array(
                                                                        "US" => "United States ",
                                                                        "AX" => "Åland Islands",  
                                                                        "AL" => "Albania ",  
                                                                        "DZ" => "Algeria ",  
                                                                        "AS" => "American Samoa",  
                                                                        "AD" => "Andorra",  
                                                                        "AO" => "Angola ",
                                                                        "AI" => "Anguilla ",
                                                                        "AQ" => "Antarctica ",
                                                                        "AG" => "Antigua and Barbuda ",
                                                                        "AR" => "Argentina",
                                                                        "AU" => "Australia ",
                                                                        "AT" => "Austria ",
                                                                        "AZ" => "Azerbaijan",
                                                                        "BS" => "Bahamas ",
                                                                        "BH" => "Bahrain ",
                                                                        "BD" => "Bangladesh ",
                                                                        "BB" => "Barbados ",
                                                                        "BY" => "Belarus",
                                                                        "BE" => "Belgium ",
                                                                        "BZ" => "Belize ",
                                                                        "BJ" => "Benin ",
                                                                        "BM" => "Bermuda ",
                                                                        "BT" => "Bhutan",
                                                                        "BO" => "Bolivia ",
                                                                        "BA" => "Bosnia and Herzegovina ",
                                                                        "BW" => "Botswana ",
                                                                        "BV" => "Bouvet Island ",
                                                                        "BR" => "Brazil",
                                                                        "IO" => "British Indian Ocean Territory ",
                                                                        "BN" => "Brunei Darussalam ",
                                                                        "BG" => "Bulgaria ",
                                                                        "BF" => "Burkina Faso ",
                                                                        "BI" => "Burundi",
                                                                        "KH" => "Cambodia ",
                                                                        "CM" => "Cameroon ",
                                                                        "CA" => "Canada ",
                                                                        "CV" => "Cape Verde ",
                                                                        "KY" => "Cayman Islands ",
                                                                        "CF" => "Central African Republic ",
                                                                        "TD" => "Chad ",
                                                                        "CL" => "Chile ",
                                                                        "CN" => "China ",
                                                                        "CX" => "Christmas Island",
                                                                        "CC" => "Cocos (Keeling) Islands ",
                                                                        "CO" => "Colombia ",
                                                                        "KM" => "Comoros ",
                                                                        "CG" => "Congo ",
                                                                        "CD" => "Congo, the Democratic Republic of the",
                                                                        "CK" => "Cook Islands ",
                                                                        "CR" => "Costa Rica ",
                                                                        "CI" => "Côte D'Ivoire",
                                                                        "HR" => "Croatia ",
                                                                        "CU" => "Cuba ",
                                                                        "CY" => "Cyprus ",
                                                                        "CZ" => "Czech Republic ",
                                                                        "DK" => "Denmark",
                                                                        "DJ" => "Djibouti ",
                                                                        "DM" => "Dominica ",
                                                                        "DO" => "Dominican Republic ",
                                                                        "EC" => "Ecuador ",
                                                                        "EG" => "Egypt",
                                                                        "SV" => "El Salvador ",
                                                                        "GQ" => "Equatorial Guinea ",
                                                                        "ER" => "Eritrea ",
                                                                        "EE" => "Estonia ",
                                                                        "ET" => "Ethiopia ",
                                                                        "FK" => "Falkland Islands (Malvinas) ",
                                                                        "FO" => "Faroe Islands ",
                                                                        "FJ" => "Fiji ",
                                                                        "FI" => "Finland ",
                                                                        "FR" => "France",
                                                                        "GF" => "French Guiana ",
                                                                        "PF" => "French Polynesia ",
                                                                        "TF" => "French Southern Territories ",
                                                                        "GA" => "Gabon ",
                                                                        "GM" => "Gambia ",
                                                                        "GE" => "Georgia ",
                                                                        "DE" => "Germany ",
                                                                        "GH" => "Ghana ",
                                                                        "GI" => "Gibraltar ",
                                                                        "GR" => "Greece",
                                                                        "GL" => "Greenland ",
                                                                        "GD" => "Grenada ",
                                                                        "GP" => "Guadeloupe ",
                                                                        "GU" => "Guam ",
                                                                        "GT" => "Guatemala",
                                                                        "GG" => "Guernsey ",
                                                                        "GN" => "Guinea ",
                                                                        "GW" => "Guinea-Bissau ",
                                                                        "GY" => "Guyana ",
                                                                        "HT" => "Haiti",
                                                                        "HM" => "Heard Island and Mcdonald Islands ",
                                                                        "VA" => "Holy See (Vatican City State) ",
                                                                        "HN" => "Honduras ",
                                                                        "HK" => "Hong Kong ",
                                                                        "HU" => "Hungary",
                                                                        "IS" => "Iceland ",
                                                                        "IN" => "India ",
                                                                        "ID" => "Indonesia ",
                                                                        "IR" => "Iran, Islamic Republic of ",
                                                                        "IQ" => "Iraq ",
                                                                        "IE" => "Ireland ",
                                                                        "IM" => "Isle of Man ",
                                                                        "IL" => "Israel ",
                                                                        "IT" => "Italy ",
                                                                        "JM" => "Jamaica",
                                                                        "JP" => "Japan ",
                                                                        "JE" => "Jersey ",
                                                                        "JO" => "Jordan ",
                                                                        "KZ" => "Kazakhstan ",
                                                                        "KE" => "KENYA",
                                                                        "KI" => "Kiribati ",
                                                                        "KP" => "Korea, Democratic People's Republic of ",
                                                                        "KR" => "Korea, Republic of ",
                                                                        "KW" => "Kuwait ",
                                                                        "KG" => "Kyrgyzstan",
                                                                        "LA" => "Lao People's Democratic Republic ",
                                                                        "LV" => "Latvia ",
                                                                        "LB" => "Lebanon ",
                                                                        "LS" => "Lesotho ",
                                                                        "LR" => "Liberia",
                                                                        "LY" => "Libyan Arab Jamahiriya ",
                                                                        "LI" => "Liechtenstein ",
                                                                        "LT" => "Lithuania ",
                                                                        "LU" => "Luxembourg ",
                                                                        "MO" => "Macao",
                                                                        "MK" => "Macedonia, the Former Yugoslav Republic of ",
                                                                        "MG" => "Madagascar ",
                                                                        "MW" => "Malawi ",
                                                                        "MY" => "Malaysia ",
                                                                        "MV" => "Maldives",
                                                                        "ML" => "Mali ",
                                                                        "MT" => "Malta ",
                                                                        "MH" => "Marshall Islands ",
                                                                        "MQ" => "Martinique ",
                                                                        "MR" => "Mauritania",
                                                                        "MU" => "Mauritius ",
                                                                        "YT" => "Mayotte ",
                                                                        "MX" => "Mexico ",
                                                                        "FM" => "Micronesia, Federated States of ",
                                                                        "MD" => "Moldova, Republic of",
                                                                        "MC" => "Monaco ",
                                                                        "MN" => "Mongolia ",
                                                                        "ME" => "Montenegro ",
                                                                        "MS" => "Montserrat ",
                                                                        "MA" => "Morocco",
                                                                        "MZ" => "Mozambique ",
                                                                        "MM" => "Myanmar ",
                                                                        "NA" => "Namibia ",
                                                                        "NR" => "Nauru ",
                                                                        "NP" => "Nepal",
                                                                        "NL" => "Netherlands ",
                                                                        "AN" => "Netherlands Antilles ",
                                                                        "NC" => "New Caledonia ",
                                                                        "NZ" => "New Zealand ",
                                                                        "NI" => "Nicaragua",
                                                                        "NE" => "Niger ",
                                                                        "NG" => "Nigeria ",
                                                                        "NU" => "Niue ",
                                                                        "NF" => "Norfolk Island ",
                                                                        "MP" => "Northern Mariana Islands",
                                                                        "NO" => "Norway ",
                                                                        "OM" => "Oman ",
                                                                        "PK" => "Pakistan ",
                                                                        "PW" => "Palau ",
                                                                        "PS" => "Palestinian Territory, Occupied",
                                                                        "PA" => "Panama ",
                                                                        "PG" => "Papua New Guinea ",
                                                                        "PY" => "Paraguay ",
                                                                        "PE" => "Peru ",
                                                                        "PH" => "Philippines",
                                                                        "PN" => "Pitcairn ",
                                                                        "PL" => "Poland ",
                                                                        "PT" => "Portugal ",
                                                                        "PR" => "Puerto Rico ",
                                                                        "QA" => "Qatar",
                                                                        "RE" => "Réunion ",
                                                                        "RO" => "Romania ",
                                                                        "RU" => "Russian Federation ",
                                                                        "RW" => "Rwanda ",
                                                                        "SH" => "Saint Helena",
                                                                        "KN" => "Saint Kitts and Nevis ",
                                                                        "LC" => "Saint Lucia ",
                                                                        "PM" => "Saint Pierre and Miquelon ",
                                                                        "VC" => "Saint Vincent and the Grenadines ",
                                                                        "WS" => "Samoa",
                                                                        "SM" => "San Marino ",
                                                                        "ST" => "Sao Tome and Principe ",
                                                                        "SA" => "Saudi Arabia ",
                                                                        "SN" => "Senegal ",
                                                                        "RS" => "Serbia",
                                                                        "SC" => "Seychelles ",
                                                                        "SL" => "Sierra Leone ",
                                                                        "SG" => "Singapore ",
                                                                        "SK" => "Slovakia ",
                                                                        "SI" => "Slovenia",
                                                                        "SB" => "Solomon Islands ",
                                                                        "SO" => "Somalia ",
                                                                        "ZA" => "South Africa ",
                                                                        "GS" => "South Georgia and the South Sandwich Islands",
                                                                        "ES" => "Spain",
                                                                        "LK" => "Sri Lanka ",
                                                                        "SD" => "Sudan",
                                                                        "SR" => "Suriname ",
                                                                        "SJ" => "Svalbard and Jan Mayen ",
                                                                        "SZ" => "Swaziland",
                                                                        "SE" => "Sweden",
                                                                        "CH" => "Switzerland",
                                                                        "SY" => "Syrian Arab Republic ",
                                                                        "TW" => "Taiwan, Province of China ",
                                                                        "TJ" => "Tajikistan",
                                                                        "TZ" => "Tanzania, United Republic of ",
                                                                        "TH" => "Thailand ",
                                                                        "TL" => "Timor-Leste ",
                                                                        "TG" => "Togo ",
                                                                        "TK" => "Tokelau",
                                                                        "TO" => "Tonga ",
                                                                        "TT" => "Trinidad and Tobago ",
                                                                        "TN" => "Tunisia ",
                                                                        "TR" => "Turkey ",
                                                                        "TM" => "Turkmenistan",
                                                                        "TC" => "Turks and Caicos Islands ",
                                                                        "TV" => "Tuvalu ",
                                                                        "UG" => "Uganda ",
                                                                        "UA" => "Ukraine ",
                                                                        "AE" => "United Arab Emirates",
                                                                        "GB" => "United Kingdom ",
                                                                        "US" => "United States ",
                                                                        "UM" => "United States Minor Outlying Islands ",
                                                                        "UY" => "Uruguay ",
                                                                        "UZ" => "Uzbekistan",
                                                                        "VU" => "Vanuatu ",
                                                                        "VA" => "Vatican City State ",
                                                                        "VE" => "Venezuela ",
                                                                        "VN" => "Viet Nam ",
                                                                        "VG" => "Virgin Islands, British ",
                                                                        "VI" => "Virgin Islands, U.S. ",
                                                                        "WF" => "Wallis and Futuna",
                                                                        "EH" => "Western Sahara ",
                                                                        "YE" => "Yemen",
                                                                        "CD" => "Zaire",
                                                                        "ZM" => "Zambia",
                                                                        "ZW" => "Zimbabwe",
                                                                    )
		));
		?>
	</td>
</tr>









		<?php
		
	}
	
	
	/*
	*  create_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field - an array holding all the field's data
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function create_field( $field )
	{
		// defaults?
		/*
		$field = array_merge($this->defaults, $field);
		*/
		
		// perhaps use $field['preview_size'] to alter the markup?
		
		
		// create Field HTML


		echo '<div class="pp-item-inputs"><b>Item Name:</b><br> <input type="text" value="' . $field['value']['item_name'] . '" id="' . $field['name'] . '" class="' . $field['class'] . '" name="' . $field['name'] .'[item_name]" /></div>';

		echo '<div class="pp-item-inputs"><b>Item Description:</b><br><textarea id="' . $field['name'] . '" rows="4" class="' . $field['class'] . '" name="' . $field['name'] . '[item_description]" >' . $field['value']['item_description'] . '</textarea></div>';

		echo '<div class="pp-item-inputs"><b>Price:</b> <br><input type="text" value="' . $field['value']['price'] . '" id="' . $field['name'] . '" class="' . $field['class'] . '" name="' . $field['name'] .'[price]" /></div>';

		?>

		<?php
	}
	
	
	/*
	*  input_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
	*  Use this action to add css + javascript to assist your create_field() action.
	*
	*  $info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/

	function input_admin_enqueue_scripts()
	{
		// Note: This function can be removed if not used
		
		
		// register acf scripts
		wp_register_script( 'acf-input-paypal_item', $this->settings['dir'] . 'js/input.js', array('acf-input'), $this->settings['version'] );
		wp_register_style( 'acf-input-paypal_item', $this->settings['dir'] . 'css/input.css', array('acf-input'), $this->settings['version'] ); 
		
		
		// scripts
		wp_enqueue_script(array(
			'acf-input-paypal_item',	
		));

		// styles
		wp_enqueue_style(array(
			'acf-input-paypal_item',	
		));
		
		
	}
	
	
	/*
	*  input_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is created.
	*  Use this action to add css and javascript to assist your create_field() action.
	*
	*  @info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_head
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/

	function input_admin_head()
	{
		// Note: This function can be removed if not used
	}
	
	
	/*
	*  field_group_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
	*  Use this action to add css + javascript to assist your create_field_options() action.
	*
	*  $info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/

	function field_group_admin_enqueue_scripts()
	{
		// Note: This function can be removed if not used
	}

	
	/*
	*  field_group_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is edited.
	*  Use this action to add css and javascript to assist your create_field_options() action.
	*
	*  @info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_head
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/

	function field_group_admin_head()
	{
		// Note: This function can be removed if not used
	}


	/*
	*  load_value()
	*
	*  This filter is appied to the $value after it is loaded from the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value - the value found in the database
	*  @param	$post_id - the $post_id from which the value was loaded from
	*  @param	$field - the field array holding all the field options
	*
	*  @return	$value - the value to be saved in te database
	*/
	
	function load_value( $value, $post_id, $field )
	{
		// Note: This function can be removed if not used
		return $value;
	}
	
	
	/*
	*  update_value()
	*
	*  This filter is appied to the $value before it is updated in the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value - the value which will be saved in the database
	*  @param	$field - the field array holding all the field options
	*  @param	$post_id - the $post_id of which the value will be saved
	*
	*  @return	$value - the modified value
	*/
	
	function update_value( $value, $field, $post_id )
	{
		// Note: This function can be removed if not used

		// making sure value is a number / converting number with two decimal places at all times.
		$value['price'] = floatval($value['price']);
		$value['price'] = number_format($value['price'], 2, '.', '');

		return $value;
	}
	
	
	/*
	*  format_value()
	*
	*  This filter is appied to the $value after it is loaded from the db and before it is passed to the create_field action
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value	- the value which was loaded from the database
	*  @param	$post_id - the $post_id from which the value was loaded
	*  @param	$field	- the field array holding all the field options
	*
	*  @return	$value	- the modified value
	*/
	
	function format_value( $value, $post_id, $field )
	{
		// defaults?
		/*
		$field = array_merge($this->defaults, $field);
		*/
		
		// perhaps use $field['preview_size'] to alter the $value?
		
		
		// Note: This function can be removed if not used
		return $value;
	}
	
	
	/*
	*  format_value_for_api()
	*
	*  This filter is appied to the $value after it is loaded from the db and before it is passed back to the api functions such as the_field
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value	- the value which was loaded from the database
	*  @param	$post_id - the $post_id from which the value was loaded
	*  @param	$field	- the field array holding all the field options
	*
	*  @return	$value	- the modified value
	*/
	
	function format_value_for_api( $value, $post_id, $field )
	{
		// defaults?
		
		$field = array_merge($this->defaults, $field);
		$enable_qty   = isset($field['enable_quantity']) ? $field['enable_quantity'] : '1';
		$button_label = ( isset($field['button_label']) && $field['button_label'] != "" ) ? $field['button_label'] : __("Pay Now",'acf');

		
		?>

					<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
					    <input type="hidden" name="cmd" value="_xclick">
					    <input type="hidden" name="business" value="<?php echo $field['paypal_email'] ?>">
					    <div class="item-field_name"><?php echo $value['item_name'] ?></div>
					    <input type="hidden" name="item_name" value="<?php echo $value['item_name'] ?> ">
					    <div class="item-field_description"><?php echo $value['item_description'] ?></div>
					    <div class="item-field_price">Price: <?php echo $value['price'] ?> <?php echo $field['currency'] ?></div>
					    <input type="hidden" name="amount" value="<?php echo $value['price'] ?>">
					    <input type="hidden" name="no_shipping" value="2">
					    <input type="hidden" name="no_note" value="0">
					    <input type="hidden" name="currency_code" value="<?php echo $field['currency'] ?>">
					    <input type="hidden" name="country" value="<?php echo $field['country'] ?>">
						<?php if($enable_qty == 1): ?><div class="item-field_quantity">Qty: <input type="text" name="quantity" value=""></div><?php endif ?>
					    <input type="hidden" name="bn" value="PP-BuyNowBF">
					    <input type="submit" class="item-field_button" value="<?php echo $button_label ?>">  
					</form> 
		<?php
		
		
		// Note: This function can be removed if not used
		
	}
	
	
	/*
	*  load_field()
	*
	*  This filter is appied to the $field after it is loaded from the database
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field - the field array holding all the field options
	*
	*  @return	$field - the field array holding all the field options
	*/
	
	function load_field( $field )
	{
		// Note: This function can be removed if not used
		return $field;
	}
	
	
	/*
	*  update_field()
	*
	*  This filter is appied to the $field before it is saved to the database
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field - the field array holding all the field options
	*  @param	$post_id - the field group ID (post_type = acf)
	*
	*  @return	$field - the modified field
	*/

	function update_field( $field, $post_id )
	{
        // Note: This function can be removed if not used
		return $field;
	}

	
}


// create field
new acf_field_paypal_item();

?>