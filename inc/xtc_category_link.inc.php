<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_category_link.inc.php 13764 2021-10-07 15:47:48Z GTB $

   XT-Commerce - community made shopping
   http://www.xt-commerce.com

   Copyright (c) 2005 XT-Commerce


   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

  require_once(DIR_FS_INC . 'xtc_get_category_path.inc.php');

  function xtc_category_link($cID, $name = '') {
    $params = 'cPath='.xtc_get_category_path($cID);
    if (SEARCH_ENGINE_FRIENDLY_URLS == 'true' && $name != '') {
      $params .= '&name='.base64_encode($name);
    }

    return $params;
  }
