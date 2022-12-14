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

define('HEADING_TITLE', 'Send Gift Voucher To Customers');
define('HEADING_COUPON_TITLE', 'Send Coupon To Customers');

define('TEXT_CUSTOMER_GROUP', 'Customers Group:');
define('TEXT_SUBJECT', 'Subject:');
define('TEXT_FROM', 'From:');
define('TEXT_TO', 'E-Mail to:');
define('TEXT_AMOUNT', 'Amount');
define('TEXT_MESSAGE', 'Message:');
define('TEXT_SINGLE_EMAIL', '<span class="smallText">Use this field only for single or multiple comma-separated email addresses. Otherwise use Customers Group above.</span>');
define('TEXT_SELECT_CUSTOMER_GROUP', 'Select Customers Group');
define('TEXT_CUSTOMERS_GROUP_EMAIL', '<span class="smallText">Should a voucher be sent to all customers of the selected customer group? Otherwise, do not select anything and fill in the "E-Mail to:" field. Caution: If many E-Mails are sent repeatedly at the same time, the store E-Mail address may end up on so-called blacklists and be considered spam. It is recommended to handle this via a newsletter provider.</span>');
define('TEXT_ALL_CUSTOMERS', 'All Customers');
define('TEXT_NEWSLETTER_CUSTOMERS', 'To All Newsletter Subscribers');

define('NOTICE_EMAIL_SENT_TO', 'Notice: E-Mail sent to: %s');
define('ERROR_NO_CUSTOMER_SELECTED', 'Error: No customer has been selected.');
define('ERROR_NO_AMOUNT_SELECTED', 'Error: No amount has been selected.');

define('TEXT_GV_WORTH', 'The Gift Voucher is worth ');
define('TEXT_TO_REDEEM', 'To redeem this Gift Voucher, please click on the link below. Please also write down the redemption code');
define('TEXT_WHICH_IS', ' which is ');
define('TEXT_IN_CASE', ' in case you have any problems.');
define('TEXT_OR_VISIT', 'or visit ');
define('TEXT_ENTER_CODE', ' and enter the code during the checkout process');

define ('TEXT_REDEEM_COUPON_MESSAGE_HEADER', 'You recently purchasd a Gift Voucher from our site, for security reasons, the amount of the Gift Voucher was not immediatley credited to you. The shop owner has now released this amount.');
define ('TEXT_REDEEM_COUPON_MESSAGE_AMOUNT', "\n\n" . 'The value of the Gift Voucher was %s');
define ('TEXT_REDEEM_COUPON_MESSAGE_BODY', "\n\n" . 'You can now visit our site, login and send the Gift Voucher amount to anyone you want.');
define ('TEXT_REDEEM_COUPON_MESSAGE_FOOTER', "\n\n");

define('COUPON_INFO', "\nCoupon Amount: "); 
define('COUPON_FREE_SHIPPING', 'Free Shipping');
define('COUPON_MINORDER_INFO', "\nCoupon Minimum Order: ");
define('COUPON_RESTRICT_INFO', "\nThis coupon is only valid for certain products!"); 
?>