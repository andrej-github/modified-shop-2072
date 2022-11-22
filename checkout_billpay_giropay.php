<?php
include ('includes/application_top.php');
require_once(DIR_FS_CATALOG."includes/external/billpay/base/billpayBase.php");
/** @var BillpayPayLater $billpay */
$billpay = billpayBase::PaymentInstance('BILLPAYPAYLATER');
$billpay->requireLang();
$billpay->_logDebug('Giropay campaign: Start');

if (empty($_SESSION['billpay_onAfterProcess']))
{
    $messageStack->add_session('checkout_payment', MODULE_PAYMENT_BILLPAY_TEXT_ERROR_DEFAULT);
    xtc_redirect(xtc_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'));
    exit();
}

$billpay->_logDebug('Giropay campaign: No error');
if (!empty($_GET['continue']))
{
    header('Location: '.$_SESSION['billpay_onAfterProcess']['externalRedirect']);
    exit();
}

$billpay->_logDebug('Giropay campaign: No continue');
if (!empty($_GET['abort']))
{
    $orderId = $_SESSION['tmp_oID'];
    $billpay->setOrderBillpayState(billpayBase::STATE_CANCELLED, $orderId);
    xtc_redirect(xtc_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'));
    exit();
}

$billpay->_logDebug('Giropay campaign: No abort');
require_once(DIR_FS_CATALOG . 'includes/external/billpay/base/Config.php');
$oBillpayConfig = new Billpay_Base_Config();

// create smarty elements
$smarty = new Smarty;
$smarty->caching = 0;
$smarty->assign('language', $_SESSION['language']);

// some hacking to fit the normal checkout layout (commerce::SEO):
$_SERVER['REQUEST_URI'] = FILENAME_CHECKOUT_PAYMENT;

// include boxes and header
// Warning: Gambio executes boxes.php in class context (uses $this)
if(!$billpay->isGambio()) {
    $billpay->_logDebug('Giropay campaign: No Gambio');

    require (DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/boxes.php');
    require (DIR_WS_INCLUDES.'header.php');
}

$billpaySmarty = new Smarty();
$billpaySmarty->caching = 0;

$billpaySmarty->assign('campaignText', billpayBase::EnsureUTF8($_SESSION['billpay_onAfterProcess']['campaignText']));
$billpaySmarty->assign('campaignImg', $_SESSION['billpay_onAfterProcess']['campaignImg'] );
$billpaySmarty->assign('externalRedirect', $_SESSION['billpay_onAfterProcess']['externalRedirect'] );
$billpaySmarty->assign('rateLink', $_SESSION['billpay_onAfterProcess']['rateLink'] );
$billpaySmarty->assign('language', $_SESSION['language']);
$billpay->_logDebug('Giropay campaign: Assigned billpay smarty values');

$logoSrc = 'data:image/png;base64,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';
$billpaySmarty->assign('logoSrc', $logoSrc);

if (defined('RM') === false) {
    if (isset($billpaySmarty->_version) === true && version_compare($billpaySmarty->_version, '3.0.0', '<')) {
        $billpaySmarty->load_filter('output', 'note');
    } else {
        $billpaySmarty->loadFilter('output', 'note');
    }
}

if(!$billpay->isGambio()) {
    $billpay->_logDebug('Giropay campaign: No Gambio - creating view with own .tpl file');

    $smarty->assign('language', $_SESSION['language']); // intended duplicate
    $smarty->assign('main_content', $billpaySmarty->fetch('../includes/external/billpay/templates/checkout_billpay_giropay.tpl'));
    $smarty->display(CURRENT_TEMPLATE . '/index.html');

    include ('includes/application_bottom.php');
} else {
    $billpay->_logDebug('Giropay campaign: Gambio - creating view with a layout content control');
    $mainContent = $billpaySmarty->fetch('../includes/external/billpay/templates/checkout_billpay_giropay.tpl');

    /** @var LayoutContentControl $coo_layout_control */
    $coo_layout_control = MainFactory::create_object('LayoutContentControl');
    $coo_layout_control->set_data('GET', $_GET);
    $coo_layout_control->set_data('POST', $_POST);
    $t_category_id = 0;

    $coo_layout_control->set_('coo_breadcrumb', $GLOBALS['breadcrumb']);
    $coo_layout_control->set_('coo_product', $GLOBALS['product']);
    $coo_layout_control->set_('coo_xtc_price', $GLOBALS['xtPrice']);
    $coo_layout_control->set_('c_path', $GLOBALS['cPath']);
    $coo_layout_control->set_('main_content', $mainContent);
    $coo_layout_control->set_('request_type', $GLOBALS['request_type']);
    $coo_layout_control->proceed();

    echo $coo_layout_control->get_response();
}