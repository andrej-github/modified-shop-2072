<?php
  /* --------------------------------------------------------------
   $Id: admin_search_bar.php 13858 2021-12-01 10:39:12Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   --------------------------------------------------------------
   based on:
   Admin Search Bar (ASB)

   Released under the GNU General Public License
   --------------------------------------------------------------*/
  defined( '_VALID_XTC' ) or die( 'Direct Access to this location is not allowed.' );

  $page_filename = basename($_SERVER['SCRIPT_FILENAME']);
  $search_cus = '';
  $search_ord = '';
  $search_oid = '';
  $search_cat = '';
  $search_id = '';
  if (strpos($page_filename, 'customers.php') !== false) {
    $search_cus = htmlentities(isset($_GET['search']) ? $_GET['search'] : '',ENT_COMPAT,strtoupper($_SESSION['language_charset'])); 
  }
  if (strpos($page_filename, 'orders.php') !== false) {
    $search_oid = htmlentities(isset($_GET['search']) ? $_GET['search'] : '',ENT_COMPAT,strtoupper($_SESSION['language_charset'])); 
    $search_ord = htmlentities(isset($_GET['customer']) ? $_GET['customer'] : '',ENT_COMPAT,strtoupper($_SESSION['language_charset'])); 
  }
  if (strpos($page_filename, 'categories.php') !== false){
    $search_cat = htmlentities(isset($_GET['search']) ? $_GET['search'] : '',ENT_COMPAT,strtoupper($_SESSION['language_charset'])); 
    $search_id = htmlentities(isset($_GET['search_id']) ? $_GET['search_id'] : '',ENT_COMPAT,strtoupper($_SESSION['language_charset'])); 
  }
  $placeholder_order = ASB_QUICK_SEARCH_ORDER_ID;
  if (defined('MODULE_INVOICE_NUMBER_STATUS') 
      && MODULE_INVOICE_NUMBER_STATUS == 'True'
      )
  {
    $placeholder_order = ASB_QUICK_SEARCH_ORDER_OR_INVOICE;
  }  
  if (!defined('NEW_ADMIN_STYLE')) {   
  ?>
  <link href="includes/searchbar_menu/searchbar_menu.css" rel="stylesheet" type="text/css" />
  <?php
  }
  ?>

  <div class="row2 cf" id="searchbar_new"<?php echo ((USE_ADMIN_FIXED_SEARCH == 'true') ? ' style="display:block;"' : ''); ?>>
    <div class="col25">
      <?php echo xtc_draw_form('search_customer', FILENAME_CUSTOMERS, '', 'get'); ?>
        <input name="search" type="text" value="<?php echo $search_cus;?>" size="15" placeholder="<?php echo ASB_QUICK_SEARCH_CUSTOMER; ?>" />
        <input name="asb" type="hidden" value="asb" />
      </form>
    </div>
    <div class="col25">
      <?php echo xtc_draw_form('search_order', FILENAME_ORDERS, '', 'get'); ?>
        <input name="customer" type="text" value="<?php echo $search_ord;?>" size="15" placeholder="<?php echo ASB_QUICK_SEARCH_ORDER; ?>" />
        <input type="hidden" name="action" value="search" />
      </form>
    </div>
    <div class="col25">
      <?php echo xtc_draw_form('search_order_id', FILENAME_ORDERS, '', 'get'); ?>
        <input name="search" type="text" value="<?php echo $search_oid;?>" size="7" placeholder="<?php echo $placeholder_order; ?>" />
        <input type="hidden" name="action" value="search" />
      </form>
    </div>
    <div class="col25">
      <?php echo xtc_draw_form('search_categorie', FILENAME_CATEGORIES, '', 'get'); ?>
        <input name="search" type="text" value="<?php echo $search_cat;?>" size="15" placeholder="<?php echo ASB_QUICK_SEARCH_ARTICLE; ?>" />
      </form>
    </div>
    <div class="col25">
      <?php echo xtc_draw_form('search_categorie_id', FILENAME_CATEGORIES, '', 'get'); ?>
        <input name="search_id" type="text" value="<?php echo $search_id;?>" size="15" placeholder="<?php echo ASB_QUICK_SEARCH_ARTICLE_ID; ?>" />
      </form>
    </div>
  </div>
