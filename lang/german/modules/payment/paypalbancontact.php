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
  'MODULE_PAYMENT_PAYPALBANCONTACT_TEXT_DESCRIPTION' => 'Sie werden nach dem "Best&auml;tigen" zu Bancontact geleitet, um hier Ihre Bestellung zu bezahlen.<br />Danach gelangen Sie zur&uuml;ck in den Shop und erhalten Ihre Bestell-Best&auml;tigung.<br />Jetzt schneller bezahlen mit unbegrenztem PayPal-K&auml;uferschutz - nat&uuml;rlich kostenlos.',
  'MODULE_PAYMENT_PAYPALBANCONTACT_ALLOWED_TITLE' => 'Erlaubte Zonen',
  'MODULE_PAYMENT_PAYPALBANCONTACT_ALLOWED_DESC' => 'Geben Sie <b>einzeln</b> die Zonen an, welche f&uuml;r dieses Modul erlaubt sein sollen. (z.B. AT,DE (wenn leer, werden alle Zonen erlaubt))',
  'MODULE_PAYMENT_PAYPALBANCONTACT_STATUS_TITLE' => 'Bancontact via PayPal aktivieren',
  'MODULE_PAYMENT_PAYPALBANCONTACT_STATUS_DESC' => 'M&ouml;chten Sie Zahlungen per PayPal Bancontact akzeptieren?',
  'MODULE_PAYMENT_PAYPALBANCONTACT_SORT_ORDER_TITLE' => 'Anzeigereihenfolge',
  'MODULE_PAYMENT_PAYPALBANCONTACT_SORT_ORDER_DESC' => 'Reihenfolge der Anzeige. Kleinste Ziffer wird zuerst angezeigt',
  'MODULE_PAYMENT_PAYPALBANCONTACT_ZONE_TITLE' => 'Zahlungszone',
  'MODULE_PAYMENT_PAYPALBANCONTACT_ZONE_DESC' => 'Wenn eine Zone ausgew&auml;hlt ist, gilt die Zahlungsmethode nur f&uuml;r diese Zone.',
  'MODULE_PAYMENT_PAYPALBANCONTACT_LP' => '<br /><br /><a target="_blank" href="http://www.paypal.com/de/webapps/mpp/referral/paypal-business-account2?partner_id=EHALBVD4M2RQS"><strong>Jetzt PayPal Konto hier erstellen.</strong></a>',

  'MODULE_PAYMENT_PAYPALBANCONTACT_TEXT_EXTENDED_DESCRIPTION' => '<strong><font color="red">ACHTUNG:</font></strong> Bitte nehmen Sie noch die Einstellungen unter "Partner Module" -> "PayPal" -> <a href="'.xtc_href_link('paypal_config.php').'"><strong>"PayPal Konfiguration"</strong></a> vor!',

  'MODULE_PAYMENT_PAYPALBANCONTACT_TEXT_ERROR_HEADING' => 'Hinweis',
  'MODULE_PAYMENT_PAYPALBANCONTACT_TEXT_ERROR_MESSAGE' => 'Die Zahlung mit Bancontact via PayPal wurde abgebrochen',  
);


foreach ($lang_array as $key => $val) {
  defined($key) or define($key, $val);
}
?>