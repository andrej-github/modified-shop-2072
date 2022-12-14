<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_expire_specials.inc.php 13552 2021-05-11 07:31:35Z GTB $   

   XT-Commerce - community made shopping
   http://www.xt-commerce.com

   Copyright (c) 2003 XT-Commerce
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(specials.php,v 1.5 2003/02/11); www.oscommerce.com 
   (c) 2003	 nextcommerce (xtc_expire_specials.inc.php,v 1.5 2003/08/13); www.nextcommerce.org

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/


  // Auto expire products on special
  function xtc_expire_specials() {
    $specials_query = xtc_db_query("SELECT specials_id  
                                      FROM ".TABLE_SPECIALS."  
                                     WHERE status = '1'  
                                       AND expires_date <= now() 
                                       AND expires_date > 0"); 
    if (xtc_db_num_rows($specials_query)) { 
      xtc_db_query("UPDATE ".TABLE_SPECIALS." 
                       SET status = '0', 
                           date_status_change = now() 
                     WHERE expires_date <= now() 
                       AND expires_date > 0");
    } 
  }
?>