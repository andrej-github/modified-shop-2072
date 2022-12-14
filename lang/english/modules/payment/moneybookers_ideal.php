<?php
/* -----------------------------------------------------------------------------------------
   $Id: moneybookers_ideal.php 3598 2012-09-06 06:22:36Z dokuman $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_TEXT_TITLE', 'iDEAL');
$_var = 'iDEAL via Skrill';
if (_PAYMENT_MONEYBOOKERS_EMAILID=='') {
  $_var.='<br /><br /><b><font color="red">Please setup skrill.com configuration first! (Adv. Configuration -> Partner -> Skrill.com)!</font></b>';
}
define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_TEXT_DESCRIPTION', $_var);
define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_NOCURRENCY_ERROR', 'There\'s no Skrill accepted currency installed!');
define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_ERRORTEXT1', 'payment_error=');
define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_TEXT_INFO','');
define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_ERRORTEXT2', '&error=There was an error during your payment at Skrill!');
define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_ORDER_TEXT', 'Date of the order: ');
define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_TEXT_ERROR', 'Payment error!');
define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_CONFIRMATION_TEXT', 'Thank you for your order!');
define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_TRANSACTION_FAILED_TEXT', 'Your payment transaction at Skrill has failed. Please try again, or select an other payment option!');


define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_STATUS_TITLE', 'Enable Skrill');
define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_STATUS_DESC', 'Do you want to accept payments through Skrill?');
define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_SORT_ORDER_TITLE', 'Sort order of display.');
define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_SORT_ORDER_DESC', 'Sort order of display. Lowest is displayed first.');
define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_ZONE_TITLE', 'Payment Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_ZONE_DESC', 'If a zone is selected, only enable this payment method for that zone.');
define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_ALLOWED_TITLE' , 'Allowed Zones');
define('MODULE_PAYMENT_MONEYBOOKERS_IDEAL_ALLOWED_DESC' , 'Please enter the zones <b>separately</b> which should be allowed to use this modul (e. g. AT,DE (leave empty if you want to allow all zones))');
?>