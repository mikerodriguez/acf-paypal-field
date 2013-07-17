acf-paypal-field
================

PayPal Field for the Advanced Custom Fields WordPress plugin.



The PayPal Item Field is a simple, yet useful field that can help you integrate PayPal forms onto your WP site with the use of ACF. It's a faster way of adding PayPal Items to your site without having to login to your PayPal Account and create it yourself. Using the native ACF function the_field(), you can display a simple form that includes Item Name, Item Description, Price, and you can enable/disable user Quantity input.

The PayPal Item field currently supports 343 countries and 18 different currencies.

Notes:

You can use CSS in your template stylesheet to edit each field with the classes below.


.item-field_name{} /* Targets the div containing the name of your item */

.item-field_description{} /* Targets the div containing your item's description */

.item-field_price{} /* Targets the div containing your item's price */

.item-field_quantity{} /* Targets the div containing your item's quantity (if enabled) */

.item-field_button{} /* Targets the checkout button */



On the edit screen (post/pages) you can add the follow classes to your admin CSS:


.pp-item-inputs{} /* Targets div of inputs on the edit screen*/




Installation


To use the PayPal Item Field in your theme just create "/fields" folder inside your theme’s folder and copy the PayPal Item Field file (paypal_item.php) into it. In your functions.php paste the following:


register_field('PayPalItem_field', dirname(__File__) . '/fields/paypal_item.php');





Further Development

Development of this ACF add-on will continue. In the future I'm looking to add the following:

- Custom User Options (Ability to add text, select, radio inputs to the front-end form via ACF)

- Add more countries/currencies as PayPal makes them available.

- Support for Paypal Pro and PayPal Express




You can download the PayPal Item Field add-on for ACF by clicking here
