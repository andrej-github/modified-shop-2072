<?php
/* -----------------------------------------------------------------------------------------
   $Id: paypallink.php 13772 2021-10-15 13:53:19Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

chdir('../../');
include('includes/application_top.php');


// include needed classes
require_once(DIR_FS_EXTERNAL.'paypal/classes/PayPalPayment.php');                                      


if (isset($_GET['oID']) 
    && is_numeric($_GET['oID']) 
    && isset($_GET['key']) 
    && strlen($_GET['key']) == '32'
    ) 
{

  // include needed function
  require_once(DIR_FS_INC.'get_customers_status_by_id.inc.php');

  // include needed classes
  require_once (DIR_WS_CLASSES . 'order.php');

  $order = new order((int)$_GET['oID']);
  $hash = md5($order->customer['email_address']);
    
  if ($_GET['key'] == $hash) {

    if (!isset($_SESSION['customer_id'])) {
      $_SESSION['customers_status'] = get_customers_status_by_id($order->info['status']);
      $_SESSION['customers_status']['customers_status'] = $order->info['status'];
    }

    $paypal = new PayPalPayment('paypallink');
    include_once(DIR_WS_LANGUAGES . $order->info['language'] . '/modules/payment/paypallink.php');

		// confirmed
		if (isset($_GET['PayerID']) && $_GET['PayerID'] != '' 
		    && isset($_GET['token']) && $_GET['token'] != '' 
		    && isset($_GET['paymentId']) && $_GET['paymentId'] != '' 
		    && $_GET['paymentId'] == $_SESSION['paypal']['paymentId']		
		    ) 
		{
		  $_SESSION['paypal']['PayerID'] = $_GET['PayerID'];
		  $insert_id = (int)$_GET['oID'];
      $paypal->complete_cart();
      
      if (isset($_SESSION['customer_id'])) {
        $messageStack->add_session('paypallink', MODULE_PAYMENT_PAYPALLINK_TEXT_COMPLETED, 'success');
        xtc_redirect(xtc_href_link(FILENAME_ACCOUNT_HISTORY_INFO, 'order_id='.(int)$_GET['oID'], 'SSL'));
      } else {
        $messageStack->add_session('logoff', MODULE_PAYMENT_PAYPALLINK_TEXT_COMPLETED, 'success');
        xtc_redirect(xtc_href_link(FILENAME_LOGOFF, '', 'SSL'));
      }
    } else {
      $payment_data = $paypal->get_payment_data($_GET['oID']);
      
      if (!isset($_GET['payment_error'])
          && count($payment_data) < 1
          )
      {
        $redirect = $paypal->payment_redirect(false, true, true);
        xtc_redirect($redirect);
      } else {
        if (isset($_SESSION['customer_id'])) {
          if (count($payment_data) > 0) {
            $messageStack->add_session('paypallink', TEXT_PAYPAL_ERROR_ALREADY_PAID);          
          } else {
            $messageStack->add_session('paypallink', MODULE_PAYMENT_PAYPALLINK_TEXT_ERROR_MESSAGE);
          }
          xtc_redirect(xtc_href_link(FILENAME_ACCOUNT_HISTORY_INFO, 'order_id='.(int)$_GET['oID'], 'SSL'));
        } else {
          if (count($payment_data) > 0) {
            $messageStack->add_session('logoff', TEXT_PAYPAL_ERROR_ALREADY_PAID);          
          } else {
            $messageStack->add_session('logoff', MODULE_PAYMENT_PAYPALLINK_TEXT_ERROR_MESSAGE);
          }
          xtc_redirect(xtc_href_link(FILENAME_LOGOFF, '', 'SSL'));
        }      
      }
    }
  } else {
    die('Direct Access to this location is not allowed.');
  }
} else {
  die('Direct Access to this location is not allowed.');
}
?>