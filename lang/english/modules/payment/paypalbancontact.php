<?php
/* -----------------------------------------------------------------------------------------
   $Id: paypalbancontact.php 14303 2022-04-13 08:17:35Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/


$lang_array = array(
  'MODULE_PAYMENT_PAYPALBANCONTACT_TEXT_TITLE' => 'Bancontact via PayPal',
  'MODULE_PAYMENT_PAYPALBANCONTACT_TEXT_ADMIN_TITLE' => 'Bancontact via PayPal',
  'MODULE_PAYMENT_PAYPALBANCONTACT_TEXT_INFO' => '<img src="https://www.paypalobjects.com/images/checkout/alternative_payments/paypal_bancontact_color.svg" />',
  'MODULE_PAYMENT_PAYPALBANCONTACT_TEXT_DESCRIPTION' => 'After "confirm" your will be routet to Bancontact to pay your order.<br />Back in shop you will get your order-mail.<br />PayPal is the safer way to pay online. We keep your details safe from others and can help you get your money back if something ever goes wrong.',
  'MODULE_PAYMENT_PAYPALBANCONTACT_ALLOWED_TITLE' => 'Allowed zones',
  'MODULE_PAYMENT_PAYPALBANCONTACT_ALLOWED_DESC' => 'Please enter the zones <b>separately</b> which should be allowed to use this module (e.g. AT,DE (leave empty if you want to allow all zones))',
  'MODULE_PAYMENT_PAYPALBANCONTACT_STATUS_TITLE' => 'Enable Bancontact via PayPal',
  'MODULE_PAYMENT_PAYPALBANCONTACT_STATUS_DESC' => 'Do you want to accept PayPal Bancontact payments?',
  'MODULE_PAYMENT_PAYPALBANCONTACT_SORT_ORDER_TITLE' => 'Sort order',
  'MODULE_PAYMENT_PAYPALBANCONTACT_SORT_ORDER_DESC' => 'Sort order of the view. Lowest numeral will be displayed first',
  'MODULE_PAYMENT_PAYPALBANCONTACT_ZONE_TITLE' => 'Payment zone',
  'MODULE_PAYMENT_PAYPALBANCONTACT_ZONE_DESC' => 'If a zone is choosen, the payment method will be valid for this zone only.',
  'MODULE_PAYMENT_PAYPALBANCONTACT_LP' => '<br /><br /><a target="_blank" href="http://www.paypal.com/de/webapps/mpp/referral/paypal-business-account2?partner_id=EHALBVD4M2RQS"><strong>Create PayPal account now.</strong></a>',

  'MODULE_PAYMENT_PAYPALBANCONTACT_TEXT_EXTENDED_DESCRIPTION' => '<strong><font color="red">ATTENTION:</font></strong> Please setup PayPal configuration under "Partner Modules" -> "PayPal" -> <a href="'.xtc_href_link('paypal_config.php').'"><strong>"PayPal Configuration"</strong></a>!',

  'MODULE_PAYMENT_PAYPALBANCONTACT_TEXT_ERROR_HEADING' => 'Note',
  'MODULE_PAYMENT_PAYPALBANCONTACT_TEXT_ERROR_MESSAGE' => 'The payment with Bancontact via PayPal was cancelled',
);


foreach ($lang_array as $key => $val) {
  defined($key) or define($key, $val);
}
?>