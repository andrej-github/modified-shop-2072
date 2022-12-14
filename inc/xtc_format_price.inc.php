<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_format_price.inc.php 14242 2022-03-28 16:18:25Z GTB $   

   XT-Commerce - community made shopping
   http://www.xt-commerce.com

   Copyright (c) 2003 XT-Commerce
   -----------------------------------------------------------------------------------------
   by Mario Zanier for XTcommerce
   
   based on:
   (c) 2003	 nextcommerce (xtc_format_price.inc.php,v 1.7 2003/08/19); www.nextcommerce.org

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

  // include needed functions
  require_once(DIR_FS_INC . 'xtc_precision.inc.php');

  function xtc_format_price($price_string, $price_special, $currency, $show_currencies = 1) { 

    // calculate currencies
    $currencies_query = xtDBquery("SELECT *
                                     FROM ". TABLE_CURRENCIES ." 
                                    WHERE code = '".xtc_db_input($currency)."'");
    $currencies_value = xtc_db_fetch_array($currencies_query, true);
    
    $currencies_data = array();
    foreach ($currencies_value as $k => $v) {
      $currencies_data[strtoupper($k)] = $v;
    }
    
    // round price
    $price_string = xtc_precision($price_string, $currencies_data['DECIMAL_PLACES']);

    if ($price_special == '1') {
      $price_string = number_format($price_string, $currencies_data['DECIMAL_PLACES'], $currencies_data['DECIMAL_POINT'], $currencies_data['THOUSANDS_POINT']);
      if ($show_currencies == 1) {
        $price_string = $currencies_data['SYMBOL_LEFT']. ' '.$price_string.' '.$currencies_data['SYMBOL_RIGHT'];
      }
    }
  
    return $price_string;
  }
