<?php

class PayPalItem_field extends acf_Field
{

	/*--------------------------------------------------------------------------------------
	*
	*	Constructor
	*	- This function is called when the field class is initalized on each page.
	*	- Here you can add filters / actions and setup any other functionality for your field
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function __construct($parent)
	{
            // do not delete!
            parent::__construct($parent);
    	
            // set name / title
            $this->name = 'paypalitem_field'; // variable name (no spaces / special characters / etc)
            $this->title = __("PayPal Item",'acf'); // field label (Displayed in edit screens)
		
   	}

	
	/*--------------------------------------------------------------------------------------
	*
	*	create_options
	*	- this function is called from core/field_meta_box.php to create extra options
	*	for your field
	*
	*	@params
	*	- $key (int) - the $_POST obejct key required to save the options to the field
	*	- $field (array) - the field object
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function create_options($key, $field)
	{
		// default variables
		$field['paypal_email'] = isset($field['paypal_email']) ? $field['paypal_email'] : '';
		$button_label = ( isset($field['button_label']) && $field['button_label'] != "" ) ? $field['button_label'] : __("Pay Now",'acf');
		$field['enable_quantity']   = isset($field['enable_quantity']) ? $field['enable_quantity'] : '1';
		$field['currency']      = isset($field['currency']) ? $field['currency'] : 'USD';
		$field['country']      = isset($field['currency']) ? $field['currency'] : 'US';

		?>

		<?php // PayPal Email Address Option ?>
		<tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("PayPal Email Address",'acf'); ?></label>
				<p class="description"><?php _e("Enter your PayPal Account Email Address",'acf'); ?></p>
			</td>
			<td>
				<?php 
				$this->parent->create_field(array(
					'type'	=>	'text',
					'name'	=>	'fields['.$key.'][paypal_email]',
					'value'	=>	$field['paypal_email'],
				));
				?>
			</td>
		</tr>


		<?php // Custom Button Label ?>
		<tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Button Label",'acf'); ?></label>
				<p class="description"><?php _e("Customize the label of your button. <em>Default: Pay Now</em> <br><br> Note: <em>Use the CSS class (.item-field_button) to customize look of your button.</em>",'acf'); ?></p>
			</td>
			<td>
				<?php 
				$this->parent->create_field(array(
					'type'	=>	'text',
					'name'	=>	'fields['.$key.'][button_label]',
					'value'	=>	$field['button_label'],
				));
				?>
			</td>
		</tr>



		<?php // Enable Quantity ?>
		<tr class="field_option field_option_<?php echo $this->name;?>">
			<td class="label">
				<label><?php _e("Enable Quantity?", 'acf');?></label>
				<p class="description"> Allows user to change quantity on the front-end.</p>
			</td>
			<td>
				<?php $this->parent->create_field(array(
													   'type'    => 'radio',
													   'name'    => 'fields[' . $key . '][enable_quantity]',
													   'value'   => $field['enable_quantity'],
													   'choices' => array(
														   '1' => 'Yes',
														   '0' => 'No',
													   ),
													   'layout'  => 'horizontal',
												  ));
				?>
			</td>
		</tr>


		<?php // Country ?>
		<tr class="field_option field_option_<?php echo $this->name;?>">
			<td class="label">
				<label><?php _e("Country", 'acf');?></label>
				<p class="description"> Select Country <em>Default: (US) - United States</em> </p>
			</td>
			<td>
				<?php $this->parent->create_field(array(
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


		<?php // Currency ?>
		<tr class="field_option field_option_<?php echo $this->name;?>">
			<td class="label">
				<label><?php _e("Currency", 'acf');?></label>
				<p class="description"> Select Currency </p>
			</td>
			<td>
				<?php $this->parent->create_field(array(
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

		<?php
	}

	
	/*--------------------------------------------------------------------------------------
	*
	*	create_field
	*	- this function is called on edit screens to produce the html for this field
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function create_field($field)
	{
	
		
		echo '<div class="pp-item-inputs"><b>Item Name:</b><br> <input type="text" value="' . $field['value']['item_name'] . '" id="' . $field['name'] . '" class="' . $field['class'] . '" name="' . $field['name'] .'[item_name]" /></div>';

		echo '<div class="pp-item-inputs"><b>Item Description:</b><br><textarea id="' . $field['name'] . '" rows="4" class="' . $field['class'] . '" name="' . $field['name'] . '[item_description]" >' . $field['value']['item_description'] . '</textarea></div>';

		echo '<div class="pp-item-inputs"><b>Price:</b> <br><input type="text" value="' . $field['value']['price'] . '" id="' . $field['name'] . '" class="' . $field['class'] . '" name="' . $field['name'] .'[price]" /></div>';

	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	admin_head
	*	- this function is called in the admin_head of the edit screen where your field
	*	is created. Use this function to create css and javascript to assist your 
	*	create_field() function.
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function admin_head()
	{
		?>
		<style type="text/css">
			.pp-item-inputs {
				margin-bottom: 10px;
			}
		</style>
		<?php
		
	}

	
	/*--------------------------------------------------------------------------------------
	*
	*	update_value
	*	- this function is called when saving a post object that your field is assigned to.
	*	the function will pass through the 3 parameters for you to use.
	*
	*	@params
	*	- $post_id (int) - usefull if you need to save extra data or manipulate the current
	*	post object
	*	- $field (array) - usefull if you need to manipulate the $value based on a field option
	*	- $value (mixed) - the new value of your field.
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function update_value($post_id, $field, $value)
	{
		// making sure value is a number / converting number with two decimal places at all times.
		$value['price'] = floatval($value['price']);
		$value['price'] = number_format($value['price'], 2, '.', '');
		
		// save value
		parent::update_value($post_id, $field, $value);
	}
	
	
	
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	get_value
	*	- called from the edit page to get the value of your field. This function is useful
	*	if your field needs to collect extra data for your create_field() function.
	*
	*	@params
	*	- $post_id (int) - the post ID which your value is attached to
	*	- $field (array) - the field object.
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function get_value($post_id, $field)
	{
		// get value
		$value = parent::get_value($post_id, $field);
		
		// return value
		return $value;		
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	get_value_for_api
	*	- called from your template file when using the API functions (get_field, etc). 
	*	This function is useful if your field needs to format the returned value
	*
	*	@params
	*	- $post_id (int) - the post ID which your value is attached to
	*	- $field (array) - the field object.
	*
	*	@author Elliot Condon
	*	@since 3.0.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function get_value_for_api($post_id, $field)
	{
		// get value
		$value = $this->get_value($post_id, $field);

		// default variables
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
		

	}
	
}

?>