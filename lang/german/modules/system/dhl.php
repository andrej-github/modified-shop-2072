<?php
/* -----------------------------------------------------------------------------------------
   $Id: dhl.php 14308 2022-04-13 11:43:36Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

  define('MODULE_DHL_TEXT_TITLE', 'DHL Anbindung');
  define('MODULE_DHL_TEXT_DESCRIPTION', 'Bequem DHL Paketscheine aus dem Shop heraus drucken.');

  define('MODULE_DHL_STATUS_TITLE', 'Status');
  define('MODULE_DHL_STATUS_DESC', 'Modul aktivieren');
  define('MODULE_DHL_USER_TITLE', '<hr noshade>Benutzer');
  define('MODULE_DHL_USER_DESC', 'Benutzername vom DHL Gesch&auml;ftskundenportal');
  define('MODULE_DHL_SIGNATURE_TITLE', 'Passwort');
  define('MODULE_DHL_SIGNATURE_DESC', 'Passwort vom DHL Gesch&auml;ftskundenportal');
  define('MODULE_DHL_EKP_TITLE', 'EKP');
  define('MODULE_DHL_EKP_DESC', 'DHL Kundennummer');
  define('MODULE_DHL_ACCOUNT_TITLE', 'Account');
  define('MODULE_DHL_ACCOUNT_DESC', 'Account ID im Format ISO2:ID getrennt durch Komma (standard WORLD:01).<br>Sollte die Warenpost eine abweichende ID haben, dann mit Zusatz PK (Paket) oder WP (Warenpost). Beispiel: WORLD:01PK,WORLD:02WP');
  define('MODULE_DHL_PREFIX_TITLE', 'Absenderreferenz Prefix');
  define('MODULE_DHL_PREFIX_DESC', 'Geben Sie ein Prefix f&uuml;r die Absenderreferenz an. Die Bestellnummer wird automatisch mit angeh&auml;ngt.');
  define('MODULE_DHL_WEIGHT_CN23_TITLE', 'Gewicht CN23');
  define('MODULE_DHL_WEIGHT_CN23_DESC', 'Geben Sie das Artikelgewicht f&uuml;r die Zollerkl&auml;rung an, sofern keines beim Artikel hinterlegt ist.');
  
  define('MODULE_DHL_NOTIFICATION_TITLE', '<hr noshade>Benachrichtigung');
  define('MODULE_DHL_NOTIFICATION_DESC', 'Soll als Standard Benachrichtigung via DHL vorausgew&auml;hlt werden?<br>Der Kunde wird von DHL per eMail &uuml;ber den Versand benachrichtigt.<br><b>Hinweis:</b> daf&uuml;r muss eine Einverst&auml;ndniserkl&auml;rung zur Weitergabe der E-Mail Adresse vom Kunden vorhanden sein.');
  define('MODULE_DHL_STATUS_UPDATE_TITLE', 'Benachrichtigung &amp; Status aktualisieren');
  define('MODULE_DHL_STATUS_UPDATE_DESC', 'Der Kunde wird per Mail inkl. Trackinginformation benachrichtigt und die Bestellung auf diesen Status gesetzt.');
  define('MODULE_DHL_CODING_TITLE', 'Leitcodierung');
  define('MODULE_DHL_CODING_DESC', 'Soll als Standard die Leitcodierung vorausgew&auml;hlt werden?');
  define('MODULE_DHL_PRODUCT_TITLE', 'Produkt');
  define('MODULE_DHL_PRODUCT_DESC', 'Welches Produkt soll als Standard vorausgew&auml;hlt sein?');
  define('MODULE_DHL_DISPLAY_LABEL_TITLE', 'Label anzeigen');
  define('MODULE_DHL_DISPLAY_LABEL_DESC', 'Soll das DHL Label nach Erzeugung angezeigt (Popup) werden?');
  define('MODULE_DHL_RETOURE_TITLE', 'Retouren Label');
  define('MODULE_DHL_RETOURE_DESC', 'Soll zus&auml;tzlich noch ein Retourenlabel erzeugt werden?');
  define('MODULE_DHL_PERSONAL_TITLE', 'Eigenh&auml;ndig');
  define('MODULE_DHL_PERSONAL_DESC', 'Soll als Standard Eigenh&auml;ndig vorausgew&auml;hlt werden?');
  define('MODULE_DHL_BULKY_TITLE', 'Sperrgut');
  define('MODULE_DHL_BULKY_DESC', 'Soll als Standard Sperrgut vorausgew&auml;hlt werden?');
  define('MODULE_DHL_NO_NEIGHBOUR_TITLE', 'Keine Nachbarschaftszustellung');
  define('MODULE_DHL_NO_NEIGHBOUR_DESC', 'Soll als Standard keine Nachbarschaftszustellung vorausgew&auml;hlt werden?');
  define('MODULE_DHL_PARCEL_OUTLET_TITLE', 'Filialrouting');
  define('MODULE_DHL_PARCEL_OUTLET_DESC', 'Soll als Standard Filialrouting vorausgew&auml;hlt werden?');
  define('MODULE_DHL_AVS_TITLE', 'Alterssichtpr&uuml;fung');
  define('MODULE_DHL_AVS_DESC', 'Was soll als Standard f&uuml;r die Alterssichtpr&uuml;fung vorausgew&auml;hlt werden (0 ist deaktiviert)?');
  define('MODULE_DHL_IDENT_TITLE', 'Alterspr&uuml;fung');
  define('MODULE_DHL_IDENT_DESC', 'Was soll als Standard f&uuml;r die Alterspr&uuml;fung vorausgew&auml;hlt werden (0 ist deaktiviert)?');
  define('MODULE_DHL_PREMIUM_TITLE', 'Premium');
  define('MODULE_DHL_PREMIUM_DESC', 'Soll als Standard Premium vorausgew&auml;hlt werden?');
  define('MODULE_DHL_ENDORSEMENT_TITLE', 'Vorausverf&uuml;gung');
  define('MODULE_DHL_ENDORSEMENT_DESC', 'Wie sollen internationale Pakete behandelt werden, wenn sie nicht zugestellt werden k&ouml;nnen?');

  define('MODULE_DHL_COMPANY_TITLE', '<hr noshade>Kundendetails<br/>');
  define('MODULE_DHL_COMPANY_DESC', 'Firma:');
  define('MODULE_DHL_FIRSTNAME_TITLE', '');
  define('MODULE_DHL_FIRSTNAME_DESC', 'Vorname:');
  define('MODULE_DHL_LASTNAME_TITLE', '');
  define('MODULE_DHL_LASTNAME_DESC', 'Nachname:');
  define('MODULE_DHL_ADDRESS_TITLE', '');
  define('MODULE_DHL_ADDRESS_DESC', 'Adresse:');
  define('MODULE_DHL_POSTCODE_TITLE', '');
  define('MODULE_DHL_POSTCODE_DESC', 'PLZ:');
  define('MODULE_DHL_CITY_TITLE', '');
  define('MODULE_DHL_CITY_DESC', 'Stadt:');
  define('MODULE_DHL_TELEPHONE_TITLE', '');
  define('MODULE_DHL_TELEPHONE_DESC', 'Telefon:');
  
  define('MODULE_DHL_ACCOUNT_OWNER_TITLE', '<hr noshade>Bankdaten<br/>');
  define('MODULE_DHL_ACCOUNT_OWNER_DESC', 'Kontoinhaber:');
  define('MODULE_DHL_ACCOUNT_NUMBER_TITLE', '');
  define('MODULE_DHL_ACCOUNT_NUMBER_DESC', 'Kontonummer:');
  define('MODULE_DHL_BANK_CODE_TITLE', '');
  define('MODULE_DHL_BANK_CODE_DESC', 'Bankleitzahl:');
  define('MODULE_DHL_BANK_NAME_TITLE', '');
  define('MODULE_DHL_BANK_NAME_DESC', 'Bankname:');
  define('MODULE_DHL_IBAN_TITLE', '');
  define('MODULE_DHL_IBAN_DESC', 'IBAN:');
  define('MODULE_DHL_BIC_TITLE', '');
  define('MODULE_DHL_BIC_DESC', 'BIC:');
