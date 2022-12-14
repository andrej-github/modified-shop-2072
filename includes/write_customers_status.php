<?php
/* -----------------------------------------------------------------------------------------
   $Id: write_customers_status.php 13738 2021-09-20 13:54:13Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2003	 nextcommerce (write_customers_status.php,v 1.8 2003/08/1); www.nextcommerce.org
   (c) 2006 xtCommerce (write_customers_status.php)

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------

   based on Third Party contribution:
   Customers Status v3.x  (c) 2002-2003 Copyright Elari elari@free.fr | www.unlockgsm.com/dload-osc/ | CVS : http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/elari/?sortby=date#dirlist

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

  // include needed function
  require_once(DIR_FS_INC.'get_customers_status_by_id.inc.php');
  
  // write customers status in session
  if (isset($_SESSION['customer_id'])) {
    $customer_status_query = xtc_db_query("SELECT *
                                             FROM " . TABLE_CUSTOMERS . "
                                            WHERE customers_id = '" . (int)$_SESSION['customer_id'] . "'");

    if (xtc_db_num_rows($customer_status_query) == 1) {
      $customer_status = xtc_db_fetch_array($customer_status_query);
      
      if ($_SESSION['customer_time'] != $customer_status['customers_password_time']) {
        xtc_session_destroy();
        $link = xtc_href_link(FILENAME_LOGIN, 'action=relogin', 'SSL');
        if (defined('RUN_MODE_ADMIN')) {
          $link = xtc_catalog_href_link(FILENAME_LOGIN, 'action=relogin', 'SSL');
        }
        xtc_redirect($link);
      }
      
      if ($customer_status['customers_status'] == '0' && !defined('RUN_MODE_ADMIN')) {
        $_SESSION['customers_status'] = get_customers_status_by_id(DEFAULT_CUSTOMERS_STATUS_ID_ADMIN);
        
        // additional 
        $_SESSION['customers_status']['customers_status_id'] = DEFAULT_CUSTOMERS_STATUS_ID_ADMIN;
        $_SESSION['customers_status']['customers_status'] = $customer_status['customers_status'];
      } else {
        $_SESSION['customers_status'] = get_customers_status_by_id($customer_status['customers_status']);
        
        // additional 
        $_SESSION['customers_status']['customers_status_id'] = $customer_status['customers_status'];
        $_SESSION['customers_status']['customers_status'] = $customer_status['customers_status'];
      }
    } else {
      unset($_SESSION['customer_id']);
      if (defined('RUN_MODE_ADMIN')) {
        xtc_redirect(xtc_catalog_href_link(FILENAME_LOGOFF));
      }
      xtc_redirect(xtc_href_link(FILENAME_LOGOFF, '', 'SSL'));
    }
  } else {
    $_SESSION['customers_status'] = get_customers_status_by_id(DEFAULT_CUSTOMERS_STATUS_ID_GUEST);
    
    // additional 
    $_SESSION['customers_status']['customers_status_id'] = DEFAULT_CUSTOMERS_STATUS_ID_GUEST;
    $_SESSION['customers_status']['customers_status'] = DEFAULT_CUSTOMERS_STATUS_ID_GUEST;
  }
?>