<?php
/* -----------------------------------------------------------------------------------------
   $Id: gv_mail.php 14135 2022-02-23 12:54:32Z Tomcraft $

   XT-Commerce - community made shopping
   http://www.xt-commerce.com

   Copyright (c) 2003 XT-Commerce
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(gv_mail.php,v 1.5.2.2 2003/04/27); www.oscommerce.com

   Released under the GNU General Public License
   -----------------------------------------------------------------------------------------
   Third Party contributions:

   Credit Class/Gift Vouchers/Discount Coupons (Version 5.10)
   http://www.oscommerce.com/community/contributions,282
   Copyright (c) Strider | Strider@oscworks.com
   Copyright (c  Nick Stanko of UkiDev.com, nick@ukidev.com
   Copyright (c) Andre ambidex@gmx.net
   Copyright (c) 2001,2002 Ian C Wilson http://www.phesis.org

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

define('HEADING_TITLE', 'Gutschein an Kunden versenden');
define('HEADING_COUPON_TITLE', 'Coupon an Kunden versenden');

define('TEXT_CUSTOMER_GROUP', 'Kundengruppe:');
define('TEXT_SUBJECT', 'Betreff:');
define('TEXT_FROM', 'Absender:');
define('TEXT_TO', 'E-Mail an:');
define('TEXT_AMOUNT', 'Wert:');
define('TEXT_MESSAGE', 'Nachricht:');
define('TEXT_SINGLE_EMAIL', '<span class="smallText">Benutzen Sie dieses Feld nur f&uuml;r einzelne oder mehrere, durch Komma getrennte E-Mailadressen. Ansonsten bitte das Feld Kundengruppe benutzen.</span>');
define('TEXT_SELECT_CUSTOMER_GROUP', 'Kundengruppe ausw&auml;hlen');
define('TEXT_CUSTOMERS_GROUP_EMAIL', '<span class="smallText">Soll ein Gutschein an alle Kunden der gew&auml;hlten Kundengruppe gesendet werden? Ansonsten nichts ausw&auml;hlen und das Feld "E-Mail an:" f&uuml;llen. Vorsicht: Beim wiederholten, gleichzeitigen Versand vieler E-Mails kann die Shop E-Mailadresse auf sogenannten Blacklists landen und als Spam gewertet werden. Es empfiehlt sich dies &uuml;ber einen Newsletteranbieter abzuwickeln.</span>');
define('TEXT_ALL_CUSTOMERS', 'Alle Kunden');
define('TEXT_NEWSLETTER_CUSTOMERS', 'An alle Newsletter-Abonnenten');

define('NOTICE_EMAIL_SENT_TO', 'Hinweis: E-Mail wurde versandt an: %s');
define('ERROR_NO_CUSTOMER_SELECTED', 'Fehler: Es wurde kein Kunde ausgew&auml;hlt.');
define('ERROR_NO_AMOUNT_SELECTED', 'Fehler: Sie haben keinen Betrag f&uuml;r den Gutschein eingegeben.');

define('TEXT_GV_WORTH', 'Der Gutscheinwert betr&auml;gt ');
define('TEXT_TO_REDEEM', 'Um Ihren Gutschein zu verbuchen, klicken Sie auf den unten stehenden Link. Bitte notieren Sie sich zur Sicherheit Ihren pers&ouml;nlichen Gutschein-Code.');
define('TEXT_WHICH_IS', 'Ihr Gutscheincode lautet: ');
define('TEXT_IN_CASE', ' Falls es wider Erwarten zu Problemen beim verbuchen kommen sollte.');
define('TEXT_OR_VISIT', 'besuchen Sie unsere Webseite ');
define('TEXT_ENTER_CODE', ' und geben den Gutschein-Code bitte manuell ein ');

define ('TEXT_REDEEM_COUPON_MESSAGE_HEADER', 'Sie haben k&uuml;rzlich in unserem Online-Shop einen Gutschein gekauft, welcher aus Sicherheitsgr&uuml;nden nicht sofort freigeschaltet wurde. Dieses Guthaben steht Ihnen nun zur Verf&uuml;gung.');
define ('TEXT_REDEEM_COUPON_MESSAGE_AMOUNT', "\n\n" . 'Der Wert Ihres Gutscheines betr&auml;gt %s');
define ('TEXT_REDEEM_COUPON_MESSAGE_BODY', "\n\n" . 'Sie k&ouml;nnen nun &uuml;ber Ihr pers&ouml;nliches Konto den Gutschein an jemanden versenden.');
define ('TEXT_REDEEM_COUPON_MESSAGE_FOOTER', "\n\n");

define('COUPON_INFO', "\nCouponwert: ");
define('COUPON_FREE_SHIPPING', 'Versandkostenfrei');
define('COUPON_MINORDER_INFO', "\nMindestbestellwert: ");
define('COUPON_RESTRICT_INFO', "\nDieser Coupon ist nur f&uuml;r bestimmte Artikel g&uuml;ltig!");
?>