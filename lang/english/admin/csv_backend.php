<?php
/* --------------------------------------------------------------
   $Id: csv_backend.php 14006 2022-01-31 15:41:54Z Tomcraft $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   --------------------------------------------------------------
   based on:
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License
   --------------------------------------------------------------*/


define('IMPORT','Import');
define('EXPORT','Export');
define('UPLOAD','Upload File');
define('SELECT','Select Import file (/import Folder)');
define('SAVE','Save file in /export Folder');
define('LOAD','Send file to browser');
define('CSV_TEXTSIGN_TITLE','Text qualifier');
define('CSV_TEXTSIGN_DESC','eg. " &nbsp; | &nbsp; <span style="color:#c00;">With semicolon as delimiter the text qualifier should be set to "!</span>');
define('CSV_SEPERATOR_TITLE','Delimiter');
define('CSV_SEPERATOR_DESC','eg. ; &nbsp; | &nbsp;<span Style="color:#c00;">If the input field is left empty, \\t (= tab) is used by default during export/import!</span> ');
define('COMPRESS_EXPORT_TITLE','Compression');
define('COMPRESS_EXPORT_DESC','Compress export file');
define('CSV_SETUP','Config');
define('TEXT_IMPORT','');
define('TEXT_PRODUCTS','Products');
define('TEXT_EXPORT','Create exportfile and save in /export Folder');
define('CSV_CATEGORY_DEFAULT_TITLE','Category for Import');
define('CSV_CATEGORY_DEFAULT_DESC','All products in the csv-importfile that do <b>not</b> have a category defined will be imported into this category.<br/><b>Attention:</b> If you do not want to import products which have no category defined, then select category "Top" as it is not possible to import into this category.');
define('CSV_CAT_DEPTH_TITLE','Category depth');
define('CSV_CAT_DEPTH_DESC','How deep shall the category tree go? (e.g. with default 4: main category plus 3 sub-categories)<br />This indication is important to get the in the CSV integrated categories imported well. Same applies to the export function.<br /><span style="color:#c00;">More than 4 may result in performance loss and is probably not user friendly!');
?>