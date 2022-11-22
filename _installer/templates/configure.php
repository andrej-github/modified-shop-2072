<?php
$file_contents = 
'<?php' . PHP_EOL .
'/* --------------------------------------------------------------' . PHP_EOL .
'   $Id: configure.php 14609 2022-07-04 14:01:01Z GTB $' . PHP_EOL .
'' . PHP_EOL .
'   modified eCommerce Shopsoftware' . PHP_EOL .
'   http://www.modified-shop.org' . PHP_EOL .
'' . PHP_EOL .
'   Copyright (c) 2009 - 2013 [www.modified-shop.org]' . PHP_EOL .
'   --------------------------------------------------------------' . PHP_EOL .
'   based on:' . PHP_EOL .
'   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)' . PHP_EOL .
'   (c) 2002-2003 osCommerce (configure.php,v 1.13 2003/02/10); www.oscommerce.com' . PHP_EOL .
'   (c) 2003 XT-Commerce (configure.php)' . PHP_EOL .
'' . PHP_EOL .
'   Released under the GNU General Public License' . PHP_EOL .
'   --------------------------------------------------------------*/' . PHP_EOL .
'' . PHP_EOL .
'  // Define the webserver and path parameters' . PHP_EOL .
'  // * DIR_FS_* = Filesystem directories (local/physical)' . PHP_EOL .
'  // * DIR_WS_* = Webserver directories (virtual/URL)' . PHP_EOL .
'' . PHP_EOL .
'  // global defines' . PHP_EOL .
'  defined(\'DIR_FS_DOCUMENT_ROOT\') or define(\'DIR_FS_DOCUMENT_ROOT\', \'' . DIR_FS_DOCUMENT_ROOT . '\'); // absolut path' . PHP_EOL .
'  defined(\'DIR_FS_CATALOG\') or define(\'DIR_FS_CATALOG\', DIR_FS_DOCUMENT_ROOT); // absolut path' . PHP_EOL .
'  defined(\'DIR_WS_CATALOG\') or define(\'DIR_WS_CATALOG\', \'' . DIR_WS_CATALOG . '\'); // relative path' . PHP_EOL .
'' . PHP_EOL .
'  if (is_file(DIR_FS_CATALOG.\'inc/auto_include.inc.php\')' . PHP_EOL . 
'      && is_dir(DIR_FS_CATALOG.\'includes/extra/configure/\')' . PHP_EOL . 
'      )' . PHP_EOL . 
'  {' . PHP_EOL . 
'    // auto include' . PHP_EOL .
'    require_once (DIR_FS_CATALOG.\'inc/auto_include.inc.php\');' . PHP_EOL .
'' . PHP_EOL .
'    foreach(auto_include(DIR_FS_CATALOG.\'includes/extra/configure/\',\'php\') as $file) require_once ($file);' . PHP_EOL .
'  }'. PHP_EOL .
'' . PHP_EOL .
'  // define our database connection' . PHP_EOL .
'  defined(\'DB_MYSQL_TYPE\') or define(\'DB_MYSQL_TYPE\', \'' . $db_type . '\'); // define mysql type set to \'mysql\' or \'mysqli\'' . PHP_EOL .
'  defined(\'DB_SERVER\') or define(\'DB_SERVER\', \'' . $db_server . '\'); // eg, localhost - should not be empty for productive servers' . PHP_EOL .
'  defined(\'DB_SERVER_USERNAME\') or define(\'DB_SERVER_USERNAME\', \'' . $db_username . '\');' . PHP_EOL .
'  defined(\'DB_SERVER_PASSWORD\') or define(\'DB_SERVER_PASSWORD\', \'' . $db_password. '\');' . PHP_EOL .
'  defined(\'DB_DATABASE\') or define(\'DB_DATABASE\', \'' . $db_database. '\');' . PHP_EOL .
'  defined(\'DB_SERVER_CHARSET\') or define(\'DB_SERVER_CHARSET\', \'' . $db_charset . '\'); // set db charset \'utf8\' or \'latin1\'' . PHP_EOL .
'  defined(\'USE_PCONNECT\') or define(\'USE_PCONNECT\', \'' . $db_pconnect . '\'); // use persistent connections?' . PHP_EOL .
'' . PHP_EOL .
'  // server' . PHP_EOL .
'  defined(\'HTTP_SERVER\') or define(\'HTTP_SERVER\', \'' . $http_server . '\'); // eg, http://localhost - should not be empty for productive servers' . PHP_EOL .
'  defined(\'HTTPS_SERVER\') or define(\'HTTPS_SERVER\', \'' . $https_server . '\'); // eg, https://localhost - should not be empty for productive servers' . PHP_EOL .
'' . PHP_EOL .
'  // secure SSL' . PHP_EOL .
'  defined(\'ENABLE_SSL\') or define(\'ENABLE_SSL\', ' . $use_ssl . '); // secure webserver for checkout procedure?' . PHP_EOL .
'' . PHP_EOL .
'  // session handling' . PHP_EOL .
'  defined(\'STORE_SESSIONS\') or define(\'STORE_SESSIONS\', \'' . (($session == 'files') ? '' : 'mysql') . '\'); // leave empty \'\' for default handler or set to \'mysql\'' . PHP_EOL .                     
'' . PHP_EOL .
'  if (DB_DATABASE != \'\') {' . PHP_EOL . 
'    // set admin directory DIR_ADMIN' . PHP_EOL . 
'    require_once(DIR_FS_CATALOG.\'inc/set_admin_directory.inc.php\');' . PHP_EOL .
'' . PHP_EOL .
'    // include standard settings' . PHP_EOL .
'    require_once(DIR_FS_CATALOG.(defined(\'RUN_MODE_ADMIN\')? DIR_ADMIN : \'\').\'includes/paths.php\');'. PHP_EOL .
'  }'. PHP_EOL .
'?>';
?>