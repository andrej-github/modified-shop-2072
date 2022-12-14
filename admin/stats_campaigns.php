<?php
  /* --------------------------------------------------------------
   $Id: stats_campaigns.php 14517 2022-06-11 08:49:23Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   --------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce coding standards; www.oscommerce.com
   (c) 2006 xt:Commerce (stats_sales_report.php 1311 2005-10-18)

   Released under the GNU General Public License
   --------------------------------------------------------------
   Third Party contribution:
     stats_sales_report (c) Charly Wilhelm  charly@yoshi.ch

   Released under the GNU General Public License
   --------------------------------------------------------------*/

require ('includes/application_top.php');

// include needed functions
require_once(DIR_FS_INC . 'formatter_date.inc.php');

require (DIR_WS_CLASSES.'currencies.php');
$currencies = new currencies();

require (DIR_WS_CLASSES.'campaigns.php');

// default view (monthly)
$srDefaultView = 2;

$srExp = 0;

$orders_statuses = array();
$orders_status_array = array();
$orders_status_query = xtc_db_query("SELECT orders_status_id,
                                            orders_status_name,
                                            sort_order
                                       FROM ".TABLE_ORDERS_STATUS."
                                      WHERE language_id = '".(int)$_SESSION['languages_id']."'
                                   ORDER BY sort_order");
while ($orders_status = xtc_db_fetch_array($orders_status_query)) {
  $orders_statuses[] = array ('id' => $orders_status['orders_status_id'], 'text' => $orders_status['orders_status_name']);
  $orders_status_array[$orders_status['orders_status_id']] = $orders_status['orders_status_name'];
}

$campaigns = array ();
$campaign_query = "SELECT * FROM ".TABLE_CAMPAIGNS." ORDER BY campaigns_name";
$campaign_query = xtc_db_query($campaign_query);
while ($campaign_data = xtc_db_fetch_array($campaign_query)) {
	$campaigns[] = array ('id' => $campaign_data['campaigns_refID'], 'text' => $campaign_data['campaigns_name']);
}

// report views (1: yearly 2: monthly 3: weekly 4: daily)
if (isset($_GET['report']) && (xtc_not_null($_GET['report'])) ) {
  $srView = $_GET['report'];
}
if (!isset($srView) || $srView < 1 || $srView > 4) {
  $srView = $srDefaultView;
}

// check start and end Date
if (isset($_GET['startD']) && (xtc_not_null($_GET['startD'])) ) {
  $sDay = $_GET['startD'];
} else {
  $sDay = 1;
}
if (isset($_GET['startM']) && (xtc_not_null($_GET['startM'])) ) {
  $sMon = $_GET['startM'];
} else {
  switch ($srDefaultView) {
    case 1:
      $sMon = 1;
      break;
    default:
      $sMon = date("n");
      break;
  }
}
if (isset($_GET['startY']) && (xtc_not_null($_GET['startY'])) ) {
  $sYear = $_GET['startY'];
} else {
  $sYear = date("Y");
}
$startDate = mktime(0, 0, 0, $sMon, $sDay, $sYear);

if (isset($_GET['endD']) && (xtc_not_null($_GET['endD'])) ) {
  $eDay = $_GET['endD'];
} else {
  $eDay = date("j");
}
if (isset($_GET['endM']) && (xtc_not_null($_GET['endM'])) ) {
  $eMon = $_GET['endM'];
} else {
  $eMon = date("n");
}
if (isset($_GET['endY']) && (xtc_not_null($_GET['endY'])) ) {
  $eYear = $_GET['endY'];
} else {
  $eYear = date("Y");
}
$endDate = mktime(0, 0, 0, $eMon, $eDay + 1, $eYear);

$campaign_array = array(
  'report' => $srView,
  'startD' => $sDay,
  'startM' => $sMon,
  'startY' => $sYear,
  'endD' => $eDay,
  'endM' => $eMon,
  'endY' => $eYear,
  'status' => ((isset($_GET['status']) && $_GET['status'] != '') ? $_GET['status'] : 0),
  'campaign' => ((isset($_GET['campaign']) && $_GET['campaign'] != '') ? $_GET['campaign'] : 0),
);
$campaign = new campaigns($campaign_array);

$day_array = array();
for ($i = 1; $i < 32; $i++) {
  $day_array[] = array('id' => $i, 'text' => $i);
}

$month_array = array();
for ($i = 1; $i < 13; $i++) {
  $month_array[] = array('id' => $i, 'text' => formatter_date('MMMM', 'M', mktime(0, 0, 0, $i, 1)));  
}

$year_array = array();
for ($i = 10; $i >= 0; $i--) {
  $year_array[] = array('id' => date("Y") - $i, 'text' => date("Y") - $i);
}

require (DIR_WS_INCLUDES.'head.php');
?>
</head>
  <body>
    <?php
    require(DIR_WS_INCLUDES . 'header.php');
    ?>
    <!-- header_eof //-->
    <!-- body //-->
    <table class="tableBody">
      <tr>
        <?php
        if ($srExp < 1) {
          ?>
          <?php //left_navigation
          if (USE_ADMIN_TOP_MENU == 'false') {
            echo '<td class="columnLeft2">'.PHP_EOL;
            echo '<!-- left_navigation //-->'.PHP_EOL;       
            require_once(DIR_WS_INCLUDES . 'column_left.php');
            echo '<!-- left_navigation eof //-->'.PHP_EOL; 
            echo '</td>'.PHP_EOL;      
          }
          ?>
          <!-- body_text //-->
          <?php
        } // end sr_exp
        ?>
        <td class="boxCenter">
          <div class="pageHeadingImage"><?php echo xtc_image(DIR_WS_ICONS.'heading/icon_statistic.png'); ?></div>
          <div class="pageHeading"><?php echo HEADING_TITLE; ?></div>              
          <div class="main pdg2">Statistics</div>
          <div class="clear"></div>
          <table class="tableCenter">      
            <tr>
              <td class="boxCenterFull">
                <?php
                  if ($srExp < 1) {
                    echo xtc_draw_form('campaigns_report', FILENAME_CAMPAIGNS_REPORT, '', 'get').xtc_draw_hidden_field(xtc_session_name(), xtc_session_id());
                    ?>
                    <table style="border: 1px solid #cccccc; width:100%; padding:5px; background:#f1f1f1;">
                      <tr>
                        <td rowspan="2" class="menuBoxHeading txta-l">
                          <input type="radio" name="report" value="1" <?php if ($srView == 1) echo "checked"; ?>><?php echo REPORT_TYPE_YEARLY; ?><br />
                          <input type="radio" name="report" value="2" <?php if ($srView == 2) echo "checked"; ?>><?php echo REPORT_TYPE_MONTHLY; ?><br />
                          <input type="radio" name="report" value="3" <?php if ($srView == 3) echo "checked"; ?>><?php echo REPORT_TYPE_WEEKLY; ?><br />
                          <input type="radio" name="report" value="4" <?php if ($srView == 4) echo "checked"; ?>><?php echo REPORT_TYPE_DAILY; ?><br />
                        </td>
                        <td class="menuBoxHeading">
                          <?php 
                            echo '<p class="pdg2 mrg0"><b>'.REPORT_START_DATE.'</b></p>';
                            echo xtc_draw_pull_down_menu('startD', $day_array, $sDay);
                            echo xtc_draw_pull_down_menu('startM', $month_array, $sMon);
                            echo xtc_draw_pull_down_menu('startY', $year_array, $sYear);
                          ?>
                        </td>
                        <td class="menuBoxHeading">
                          <?php 
                            echo '<p class="pdg2 mrg0"><b>'.REPORT_STATUS_FILTER.'</b></p>';
                            echo xtc_draw_pull_down_menu('status', array_merge(array(array('id' => '0', 'text' => REPORT_ALL)), $orders_statuses), ((isset($_GET['status']) && $_GET['status'] != '') ? $_GET['status'] : 0)); 
                          ?> 
                        </td>
                      </tr>
                      <tr>
                        <td class="menuBoxHeading">
                          <?php 
                            echo '<p class="pdg2 mrg0"><b>'.REPORT_END_DATE.'</b></p>';
                            echo xtc_draw_pull_down_menu('endD', $day_array, $eDay);
                            echo xtc_draw_pull_down_menu('endM', $month_array, $eMon);
                            echo xtc_draw_pull_down_menu('endY', $year_array, $eYear);
                          ?>
                        </td>
                        <td class="menuBoxHeading">
                          <?php 
                            echo '<p class="pdg2 mrg0"><b>'.REPORT_CAMPAIGN_FILTER.'</b></p>';
                            echo xtc_draw_pull_down_menu('campaign', array_merge(array(array('id' => '0', 'text' => REPORT_ALL)), $campaigns), ((isset($_GET['campaign']) && $_GET['campaign'] != '') ? $_GET['campaign'] : 0)); 
                          ?> 
                        </td>
                      </tr>
                    </table>  
                    <div class="main mrg5 txta-r">
                      <?php echo '<input type="submit" class="button" onclick="this.blur();" value="' . BUTTON_UPDATE . '"/>'; ?>
                    </div>                         
                    </form>
                    <?php
                  } // end of ($srExp < 1)

                  if (count($campaign->result)) {
                  ?>
                <table class="tableCenter collapse"> 
                  <tr class="dataTableHeadingRow"> 
                    <td class="dataTableHeadingContent" colspan="2" width="25%"><?php echo HEADING_TOTAL; ?></td>
                    <td class="dataTableHeadingContent txta-r" width="10%">&nbsp;</td>
                    <td class="dataTableHeadingContent txta-r" width="15%"><?php echo $campaign->total['leads']; ?></td>
                    <td class="dataTableHeadingContent txta-r" colspan="2" width="30%"><?php echo $campaign->total['sells']; ?></td>
                    <td class="dataTableHeadingContent txta-r" width="20%"><?php echo $campaign->total['sum']; ?></td>
                  </tr>
                  <tr class="dataTableHeadingRow"> 
                    <td class="dataTableHeadingContent" colspan="2" width="25%">&nbsp;</td>
                    <td class="dataTableHeadingContent txta-r" width="10%"><?php echo HEADING_HITS; ?></td>
                    <td class="dataTableHeadingContent txta-r" width="15%"><?php echo HEADING_LEADS; ?></td>
                    <td class="dataTableHeadingContent txta-r" width="15%"><?php echo HEADING_SELLS; ?></td>
                    <td class="dataTableHeadingContent txta-r" width="15%"><?php echo HEADING_LATESELLS; ?></td>
                    <td class="dataTableHeadingContent txta-r" width="20%"><?php echo HEADING_SUM; ?></td>
                  </tr>
                  <?php
                  // show campaigns
                  for ($n = 0; $n < count($campaign->result); $n ++) {
                  ?>
                    <tr class="dataTableRow"> 
                      <td class="main" colspan="7" style="border-bottom: 2px solid;"><br /><?php echo $campaign->result[$n]['text'].' '.TEXT_REFERER .' ('.$campaign->result[$n]['id'].')'; ?></td>
                    </tr>
                    <?php
                    // show values
                    for ($nn = 0; $nn < count($campaign->result[$n]['result']); $nn ++) {
                      ?>
                      <tr class="dataTableRow"> 
                        <td class="dataTableContent">&nbsp;</td>
                        <td class="dataTableContent"><?php echo $campaign->result[$n]['result'][$nn]['range']; ?></td>
                        <td class="dataTableContent txta-r"><?php echo $campaign->result[$n]['result'][$nn]['hits']; ?></td>
                        <td class="dataTableContent txta-r"><?php echo $campaign->result[$n]['result'][$nn]['leads'].' ('.round($campaign->result[$n]['result'][$nn]['leads_p'],2).'%)'; ?></td>
                        <td class="dataTableContent txta-r"><?php echo $campaign->result[$n]['result'][$nn]['sells'].' ('.round($campaign->result[$n]['result'][$nn]['sells_p'],2).'%)'; ?></td>
                        <td class="dataTableContent txta-r"><?php echo $campaign->result[$n]['result'][$nn]['late_sells'].' ('.round($campaign->result[$n]['result'][$nn]['late_sells_p'],2).'%)'; ?></td>
                        <td class="dataTableContent txta-r"><?php echo $campaign->result[$n]['result'][$nn]['sum'].' ('.round($campaign->result[$n]['result'][$nn]['sum_p'],2).'%)'; ?></td>
                      </tr>
                      <?php
                    }
                    ?>
                    <tr class="dataTableHeadingRow"> 
                      <td class="dataTableHeadingContent" colspan="2"><strong><?php echo HEADING_SUM; ?></strong></td>
                      <td class="dataTableHeadingContent txta-r"><strong><?php echo $campaign->result[$n]['hits_s']; ?></strong></td>
                      <td class="dataTableHeadingContent txta-r"><strong><?php echo $campaign->result[$n]['leads_s'].' ('.($campaign->total['leads']> 0 ? round(($campaign->result[$n]['leads_s']/$campaign->total['leads']*100),2):'0').'%)'; ?></strong></td>
                      <td class="dataTableHeadingContent txta-r"><strong><?php echo $campaign->result[$n]['sells_s'].' ('.($campaign->total['sells']> 0 ? round(($campaign->result[$n]['sells_s']/$campaign->total['sells']*100),2):'0').'%)'; ?></strong></td>
                      <td class="dataTableHeadingContent txta-r"><strong><?php echo $campaign->result[$n]['late_sells_s'].' ('.($campaign->total['sells']> 0 ? round(($campaign->result[$n]['late_sells_s']/$campaign->total['sells']*100),2):'0').'%)'; ?></strong></td>
                      <td class="dataTableHeadingContent txta-r"><strong><?php echo $campaign->result[$n]['sum_s'].' ('.($campaign->total['sum_plain']> 0 ? round(($campaign->result[$n]['sum_s']/$campaign->total['sum_plain']*100),2):'0').'%)'; ?></strong></td>
                    </tr>
                    <?php
                  }
                  ?>
                </table>
              </td>
            </tr>
          </table>
            <?php 
          } 
          ?>
        </td>
        <!-- body_text_eof //-->
      </tr>
    </table>
    <!-- body_eof //-->
    <!-- footer //-->
    <?php
    require(DIR_WS_INCLUDES . 'footer.php');
    ?>
    <!-- footer_eof //-->
  </body>
</html>
<?php
require(DIR_WS_INCLUDES . 'application_bottom.php');