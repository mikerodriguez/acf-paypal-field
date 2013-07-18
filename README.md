# ACF { PayPal Field


### Overview

The PayPal Item Field is a simple, yet useful field that can help you integrate PayPal forms onto your WP site with the use of ACF. It's a faster way of adding PayPal Items to your site without having to login to your PayPal Account and create it yourself. Using the native ACF function the_field(), you can display a simple form that includes Item Name, Item Description, Price, and you can enable/disable user Quantity input.

The PayPal Item field currently supports 343 countries and 18 different currencies. 

### Compatibility

This add-on will work with:

* version 4 and up
* version 3 and below


### Installation

This add-on can be treated as both a WP plugin and a theme include.

**Install as Plugin**

1. Copy the 'acf-paypal-field' folder into your plugins folder
2. Activate the plugin via the Plugins admin page

**Include within theme**

1.	Copy the 'acf-paypal-field' folder into your theme folder (can use sub folders). You can place the folder anywhere inside the 'wp-content' directory
2.	Edit your functions.php file and add the code below (Make sure the path is correct to include the acf-paypal.php file)

```php
include_once('acf-paypal-field/acf-paypal.php');
```

### More Information

Please read the readme.txt file for more information

https://github.com/mikerodriguez/acf-paypal-field/blob/master/readme.txt
