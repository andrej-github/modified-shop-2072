<?php
/* --------------------------------------------------------------
   $Id: currencies.php 14419 2022-05-04 15:48:35Z GTB $   

   XT-Commerce - community made shopping
   http://www.xt-commerce.com

   Copyright (c) 2003 XT-Commerce
   --------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(currencies.php,v 1.2 2002/09/01); www.oscommerce.com 
   (c) 2003	 nextcommerce (currencies.php,v 1.5 2003/08/18); www.nextcommerce.org

   Released under the GNU General Public License 
   --------------------------------------------------------------*/
   
  defined( '_VALID_XTC' ) or die( 'Direct Access to this location is not allowed.' );
  
  class currencies {
    var $currencies;

    function __construct() {
      $this->currencies = array();
      $currencies_query = xtc_db_query("SELECT * FROM " . TABLE_CURRENCIES);
      while ($currencies = xtc_db_fetch_array($currencies_query)) {
        $this->currencies[$currencies['code']] = array(
          'title' => $currencies['title'],
          'symbol_left' => $currencies['symbol_left'],
          'symbol_right' => $currencies['symbol_right'],
          'decimal_point' => $currencies['decimal_point'],
          'thousands_point' => $currencies['thousands_point'],
          'decimal_places' => $currencies['decimal_places'],
          'value' => $currencies['value']
        );
      }
    }

    function format($number, $calculate_currency_value = true, $currency_type = DEFAULT_CURRENCY, $currency_value = '') {
      if ($calculate_currency_value) {
        $rate = ($currency_value) ? $currency_value : $this->currencies[$currency_type]['value'];
        $format_string = $this->currencies[$currency_type]['symbol_left'] . number_format((double)$number * (double)$rate, (int)$this->currencies[$currency_type]['decimal_places'], $this->currencies[$currency_type]['decimal_point'], $this->currencies[$currency_type]['thousands_point']) . '&nbsp;' . $this->currencies[$currency_type]['symbol_right'];
        // if the selected currency is in the european euro-conversion and the default currency is euro,
        // the currency will displayed in the national currency and euro currency
        if ( (DEFAULT_CURRENCY == 'EUR') && ($currency_type == 'DEM' || $currency_type == 'BEF' || $currency_type == 'LUF' || $currency_type == 'ESP' || $currency_type == 'FRF' || $currency_type == 'IEP' || $currency_type == 'ITL' || $currency_type == 'NLG' || $currency_type == 'ATS' || $currency_type == 'PTE' || $currency_type == 'FIM' || $currency_type == 'GRD') ) {
          $format_string .= ' <small>[' . $this->format($number, true, 'EUR') . ']</small>';
        }
      } else {
        $format_string = $this->currencies[$currency_type]['symbol_left'] . number_format($number, (int)$this->currencies[$currency_type]['decimal_places'], $this->currencies[$currency_type]['decimal_point'], $this->currencies[$currency_type]['thousands_point']) . '&nbsp;' . $this->currencies[$currency_type]['symbol_right'];
      }

      return $format_string;
    }

    function get_value($code) {
      return $this->currencies[$code]['value'];
    }

    function display_price($products_price, $products_tax, $quantity = 1) {
      $products_price = $products_price + $products_price / 100 * $products_tax;
      return $this->format($products_price * $quantity);
    }
  }
