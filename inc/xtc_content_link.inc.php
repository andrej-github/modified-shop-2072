<?php
  /* --------------------------------------------------------------
   $Id: xtc_content_link.inc.php 13764 2021-10-07 15:47:48Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   --------------------------------------------------------------
   Released under the GNU General Public License
   --------------------------------------------------------------*/

  function xtc_content_link($coID, $name = '') {
    $params = 'coID='.$coID;
    if (SEARCH_ENGINE_FRIENDLY_URLS == 'true' && $name != '') {
      $params .= '&name='.base64_encode($name);
    }

    return $params;
  }
