<?php
/**
 * 888888ba                 dP  .88888.                    dP                
 * 88    `8b                88 d8'   `88                   88                
 * 88aaaa8P' .d8888b. .d888b88 88        .d8888b. .d8888b. 88  .dP  .d8888b. 
 * 88   `8b. 88ooood8 88'  `88 88   YP88 88ooood8 88'  `"" 88888"   88'  `88 
 * 88     88 88.  ... 88.  .88 Y8.   .88 88.  ... 88.  ... 88  `8b. 88.  .88 
 * dP     dP `88888P' `88888P8  `88888'  `88888P' `88888P' dP   `YP `88888P' 
 *
 *                          m a g n a l i s t e r
 *                                      boost your Online-Shop
 *
 * -----------------------------------------------------------------------------
 * $Id: checkin.php 1 2011-01-05 00:25:01Z MaW $
 *
 * (c) 2010 RedGecko GmbH -- http://www.redgecko.de
 *     Released under the MIT License (Expat)
 * -----------------------------------------------------------------------------
 */

defined('_VALID_XTC') or die('Direct Access to this location is not allowed.');

require_once(DIR_MAGNALISTER_INCLUDES.'lib/classes/CheckinManager.php');
if (defined('MAGNA_DEV_PRODUCTLIST') && MAGNA_DEV_PRODUCTLIST === true ) {
	require_once(DIR_MAGNALISTER_MODULES.'ebay/checkin/EbayCheckinProductList.php');
	$sView = 'EbayCheckinProductList';
} else {
	require_once(DIR_MAGNALISTER_MODULES.'ebay/classes/CheckinCategoryView.php');
	$sView = 'eBayCheckinCategoryView';
}
require_once(DIR_MAGNALISTER_MODULES.'ebay/classes/eBaySummaryView.php');
require_once(DIR_MAGNALISTER_MODULES.'ebay/classes/eBayCheckinSubmit.php');
require_once(DIR_MAGNALISTER_MODULES.'ebay/ebayFunctions.php');


$cm = new CheckinManager(array(
        'summaryView'   => 'eBaySummaryView',
	'checkinView'   => $sView,
	'checkinSubmit' => 'eBayCheckinSubmit'),
	array(
	'marketplace' => 'ebay')
);

eBayRemoveDoublePrepareEntries();
echo $cm->mainRoutine();