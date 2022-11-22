<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_manufacturer_link.inc.php 13764 2021-10-07 15:47:48Z GTB $

   XT-Commerce - community made shopping
   http://www.xt-commerce.com

   Copyright (c) 2005 XT-Commerce


   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

  function xtc_manufacturer_link($mID, $name = '') {
    $params = 'manufacturers_id='.$mID;
    if (SEARCH_ENGINE_FRIENDLY_URLS == 'true' && $name != '') {
      $params .= '&name='.base64_encode($name);
    }
  
    return $params;
  }
