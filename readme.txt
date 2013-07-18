=== Advanced Custom Fields: PayPal Field ===
Contributors: Mike Rodriguez
Tags: custom, field, custom field, advanced, admin, paypal, item, edit
Requires at least: 3.4
Tested up to: 3.3.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==

The PayPal Item Field is a simple, yet useful field that can help you integrate PayPal forms onto your WP site with the use of ACF. It's a faster way of adding PayPal Items to your site without having to login to your PayPal Account and create it yourself. Using the native ACF function the_field(), you can display a simple form that includes Item Name, Item Description, Price, and you can enable/disable user Quantity input.

The PayPal Item field currently supports 343 countries and 18 different currencies.


= Compatibility =

This add-on will work with:

* version 4 and up
* version 3 and bellow


== Installation ==

This add-on can be treated as both a WP plugin and a theme include.

= Plugin =
1. Copy the 'acf-paypal-field' folder into your plugins folder
2. Activate the plugin via the Plugins admin page

= Include =
1.	Copy the 'acf-paypal-field' folder into your theme folder (can use sub folders). You can place the folder anywhere inside the 'wp-content' directory
2.	Edit your functions.php file and add the code below (Make sure the path is correct to include the acf-paypal.php file)

`
include_once('acf-paypal-field/acf-paypal.php');
`

== Changelog ==


= 2.0.0 =
* Bug Fixes
* ACF V4 Compatibility, Updated CSS
* Updated CSS

= 1.0.0 =
* Initial Release.
