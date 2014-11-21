<?php

class acf_field_paypal_item extends acf_field {
    
    // vars
    var $settings, // will hold info such as dir / path
        $defaults; // will hold default field options
        
    /*
    *  __construct
    *
    *  This function will setup the field type data
    *
    *  @type    function
    *  @date    5/03/2014
    *  @since   5.0.0
    *
    *  @param   n/a
    *  @return  n/a
    */
    
    function __construct() {
        
        /*
        *  name (string) Single word, no spaces. Underscores allowed
        */
        
        $this->name = 'paypal_item';
        
        
        /*
        *  label (string) Multiple words, can include spaces, visible when selecting a field type
        */
        
        $this->label = __('PayPal Item', 'acf-paypal_item');
        
        
        /*
        *  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
        */
        
        $this->category = 'content';
        
        
        /*
        *  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
        */
        
        $this->defaults = array(
            'font_size' => 14,
        );
        
        
        /*
        *  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
        *  var message = acf._e('paypal_item', 'error');
        */
        
        $this->l10n = array(
            'error' => __('Error! Please enter a higher value', 'acf-paypal_item'),
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
    *  render_field_settings()
    *
    *  Create extra settings for your field. These are visible when editing a field
    *
    *  @type    action
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   $field (array) the $field being edited
    *  @return  n/a
    */
    
    function render_field_settings( $field ) {
        
        /*
        *  acf_render_field_setting
        *
        *  This function will create a setting for your field. Simply pass the $field parameter and an array of field settings.
        *  The array of settings does not require a `value` or `prefix`; These settings are found from the $field array.
        *
        *  More than one setting can be added by copy/paste the above code.
        *  Please note that you must also have a matching $defaults value for the field name (font_size)
        */
        

        acf_render_field_setting( $field, array(
            'label'         => __('Paypal Email','acf-paypal_item'),
            'instructions'  => __('Enter your PayPal email address.','acf-paypal_item'),
            'type'          => 'text',
            'name'          => 'paypal_email',
        ));

        acf_render_field_setting( $field, array(
            'label'         => __('Button Label','acf-paypal_item'),
            'instructions'  => __('Customize the label of your button. <em>Default: Pay Now</em> <br><br> Note: <em>Use the CSS class (.item-field_button) to customize look of your button.</em>','acf-paypal_item'),
            'type'          => 'text',
            'name'          => 'button_label',
        ));

        acf_render_field_setting( $field, array(
            'label'         => __('Enable Quantity','acf-paypal_item'),
            'instructions'  => __('Allows user to change quantity on the front-end.','acf-paypal_item'),
            'type'          => 'radio',
            'name'          => 'enable_quantity',
            'layout'        => 'horizontal',
            'choices'       => array(
                                '1' => 'Yes',
                                '0' => 'No',
                                ),
        ));


        acf_render_field_setting( $field, array(
            'label'         => __('Currency','acf-paypal_item'),
            'instructions'  => __('ESelect Currency.','acf-paypal_item'),
            'type'          => 'select',
            'name'          => 'currency',
            'choices'       => array(
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
                        ),
        ));

        acf_render_field_setting( $field, array(
            'label'         => __('Country','acf-paypal_item'),
            'instructions'  => __('Select Country <em>Default: (US) - United States</em>.','acf-paypal_item'),
            'type'          => 'select',
            'name'          => 'country',
            'choices'       => array(
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
                        ),
        ));

        
       



    }
    
    
    
    /*
    *  render_field()
    *
    *  Create the HTML interface for your field
    *
    *  @param   $field (array) the $field being rendered
    *
    *  @type    action
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   $field (array) the $field being edited
    *  @return  n/a
    */
    
    function render_field( $field ) {
        
        
        /*
        *  Review the data of $field.
        *  This will show what data is available
        */
        


        echo '<div class="pp-item-inputs"><b>Item Name:</b><br> <input type="text" value="' . $field['value']['item_name'] . '" id="' . $field['name'] . '" class="' . $field['class'] . '" name="' . $field['name'] .'[item_name]" /></div>';

        echo '<div class="pp-item-inputs"><b>Item Description:</b><br><textarea id="' . $field['name'] . '" rows="4" class="' . $field['class'] . '" name="' . $field['name'] . '[item_description]" >' . $field['value']['item_description'] . '</textarea></div>';

        echo '<div class="pp-item-inputs"><b>Price:</b> <br><input type="text" value="' . $field['value']['price'] . '" id="' . $field['name'] . '" class="' . $field['class'] . '" name="' . $field['name'] .'[price]" /></div>';


    }
    
        
    /*
    *  input_admin_enqueue_scripts()
    *
    *  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
    *  Use this action to add CSS + JavaScript to assist your render_field() action.
    *
    *  @type    action (admin_enqueue_scripts)
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   n/a
    *  @return  n/a
    */

    
    
    function input_admin_enqueue_scripts() {
        
        $dir = plugin_dir_url( __FILE__ );
        
        
        // register & include JS
        wp_register_script( 'acf-input-paypal_item', "{$dir}js/input.js" );
        wp_enqueue_script('acf-input-paypal_item');
        
        
        // register & include CSS
        wp_register_style( 'acf-input-paypal_item', "{$dir}css/input.css" ); 
        wp_enqueue_style('acf-input-paypal_item');
        
        
    }
    
    
    
    
    /*
    *  input_admin_head()
    *
    *  This action is called in the admin_head action on the edit screen where your field is created.
    *  Use this action to add CSS and JavaScript to assist your render_field() action.
    *
    *  @type    action (admin_head)
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   n/a
    *  @return  n/a
    */

    /*
        
    function input_admin_head() {
    
        
        
    }
    
    */
    
    
    /*
    *  input_form_data()
    *
    *  This function is called once on the 'input' page between the head and footer
    *  There are 2 situations where ACF did not load during the 'acf/input_admin_enqueue_scripts' and 
    *  'acf/input_admin_head' actions because ACF did not know it was going to be used. These situations are
    *  seen on comments / user edit forms on the front end. This function will always be called, and includes
    *  $args that related to the current screen such as $args['post_id']
    *
    *  @type    function
    *  @date    6/03/2014
    *  @since   5.0.0
    *
    *  @param   $args (array)
    *  @return  n/a
    */
    
    /*
    
    function input_form_data( $args ) {
        
        
    
    }
    
    */
    
    
    /*
    *  input_admin_footer()
    *
    *  This action is called in the admin_footer action on the edit screen where your field is created.
    *  Use this action to add CSS and JavaScript to assist your render_field() action.
    *
    *  @type    action (admin_footer)
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   n/a
    *  @return  n/a
    */

    /*
        
    function input_admin_footer() {
    
        
        
    }
    
    */
    
    
    /*
    *  field_group_admin_enqueue_scripts()
    *
    *  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
    *  Use this action to add CSS + JavaScript to assist your render_field_options() action.
    *
    *  @type    action (admin_enqueue_scripts)
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   n/a
    *  @return  n/a
    */

    /*
    
    function field_group_admin_enqueue_scripts() {
        
    }
    
    */

    
    /*
    *  field_group_admin_head()
    *
    *  This action is called in the admin_head action on the edit screen where your field is edited.
    *  Use this action to add CSS and JavaScript to assist your render_field_options() action.
    *
    *  @type    action (admin_head)
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   n/a
    *  @return  n/a
    */

    /*
    
    function field_group_admin_head() {
    
    }
    
    */


    /*
    *  load_value()
    *
    *  This filter is applied to the $value after it is loaded from the db
    *
    *  @type    filter
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   $value (mixed) the value found in the database
    *  @param   $post_id (mixed) the $post_id from which the value was loaded
    *  @param   $field (array) the field array holding all the field options
    *  @return  $value
    */
    
    
    
    function load_value( $value, $post_id, $field ) {
        
        return $value;
        
    }
    
    
    
    
    /*
    *  update_value()
    *
    *  This filter is applied to the $value before it is saved in the db
    *
    *  @type    filter
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   $value (mixed) the value found in the database
    *  @param   $post_id (mixed) the $post_id from which the value was loaded
    *  @param   $field (array) the field array holding all the field options
    *  @return  $value
    */
    
    
    
    function update_value( $value, $post_id, $field ) {

        // making sure value is a number / converting number with two decimal places at all times.
        $value['price'] = floatval($value['price']);
        $value['price'] = number_format($value['price'], 2, '.', '');
        
        return $value;
        
    }
    
    
    
    
    /*
    *  format_value()
    *
    *  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
    *
    *  @type    filter
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   $value (mixed) the value which was loaded from the database
    *  @param   $post_id (mixed) the $post_id from which the value was loaded
    *  @param   $field (array) the field array holding all the field options
    *
    *  @return  $value (mixed) the modified value
    */
        
    
    
    function format_value( $value, $post_id, $field ) {
        
        // bail early if no value
        if( empty($value) ) {
        
            return $value;
            
        }

        $field = array_merge($this->defaults, $field);
        $enable_qty   = isset($field['enable_quantity']) ? $field['enable_quantity'] : '1';
        $button_label = ( isset($field['button_label']) && $field['button_label'] != "" ) ? $field['button_label'] : __("Pay Now",'acf');

                    $output='<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">';
                    $output.='<div class="item-field_name">'.$value['item_name'].'</div>';
                    $output.='<div class="item-field_description">'.nl2br($value['item_description']).'</div>';
                    
                    $output.='<div class="item-field_price">Price: '. $value['price'] .' '.$field['currency'].'</div>';
                        
                    $output.=' <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="business" value="'.$field['paypal_email'].'">
                        <input type="hidden" name="item_name" value="'.$value['item_name'].' ">
                        <input type="hidden" name="amount" value="'.$value['price'].'">
                        <input type="hidden" name="no_shipping" value="2">
                        <input type="hidden" name="no_note" value="0">
                        <input type="hidden" name="currency_code" value="'.$field['currency'].'">
                        <input type="hidden" name="country" value="'.$field['country'].'">';

                        if($enable_qty == 1){

                        $output.='<div class="item-field_quantity">Qty: <input type="text" name="quantity" value="1"></div>';
                        }

                        $output.='<input type="hidden" name="bn" value="PP-BuyNowBF">
                        <input type="submit" class="item-field_button" value="'.$button_label.'">
                    </form>';

        return $output;
        
    }
    
    
    
    
    /*
    *  validate_value()
    *
    *  This filter is used to perform validation on the value prior to saving.
    *  All values are validated regardless of the field's required setting. This allows you to validate and return
    *  messages to the user if the value is not correct
    *
    *  @type    filter
    *  @date    11/02/2014
    *  @since   5.0.0
    *
    *  @param   $valid (boolean) validation status based on the value and the field's required setting
    *  @param   $value (mixed) the $_POST value
    *  @param   $field (array) the field array holding all the field options
    *  @param   $input (string) the corresponding input name for $_POST value
    *  @return  $valid
    */
    
    /*
    
    function validate_value( $valid, $value, $field, $input ){
        
        // Basic usage
        if( $value < $field['custom_minimum_setting'] )
        {
            $valid = false;
        }
        
        
        // Advanced usage
        if( $value < $field['custom_minimum_setting'] )
        {
            $valid = __('The value is too little!','acf-paypal_item'),
        }
        
        
        // return
        return $valid;
        
    }
    
    */
    
    
    /*
    *  delete_value()
    *
    *  This action is fired after a value has been deleted from the db.
    *  Please note that saving a blank value is treated as an update, not a delete
    *
    *  @type    action
    *  @date    6/03/2014
    *  @since   5.0.0
    *
    *  @param   $post_id (mixed) the $post_id from which the value was deleted
    *  @param   $key (string) the $meta_key which the value was deleted
    *  @return  n/a
    */
    
    /*
    
    function delete_value( $post_id, $key ) {
        
        
        
    }
    
    */


    
    /*
    *  load_field()
    *
    *  This filter is applied to the $field after it is loaded from the database
    *
    *  @type    filter
    *  @date    23/01/2013
    *  @since   3.6.0   
    *
    *  @param   $field (array) the field array holding all the field options
    *  @return  $field
    */
    
    
    
    function load_field( $field ) {
        

        return $field;
        
    }   
    
    
    
    
    /*
    *  update_field()
    *
    *  This filter is applied to the $field before it is saved to the database
    *
    *  @type    filter
    *  @date    23/01/2013
    *  @since   3.6.0
    *
    *  @param   $field (array) the field array holding all the field options
    *  @return  $field
    */
    
    /*
    
    function update_field( $field ) {
        
        return $field;
        
    }   
    
    */
    
    
    /*
    *  delete_field()
    *
    *  This action is fired after a field is deleted from the database
    *
    *  @type    action
    *  @date    11/02/2014
    *  @since   5.0.0
    *
    *  @param   $field (array) the field array holding all the field options
    *  @return  n/a
    */
    
    /*
    
    function delete_field( $field ) {
        
        
        
    }   
    
    */
    
    
}


// create field
new acf_field_paypal_item();

?>
