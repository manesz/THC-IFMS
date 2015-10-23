<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 23/8/2558
 * Time: 14:12 น.
 */
 define("_DB_HOST","localhost");
 define("_DB_USER","root");
 define("_DB_PASS","012300");
 define("_DB_NAME","thc");
 
 
define("_SITENAME", "THC management system");
define("_SITEURL","http://localhost/web/THC-IFMS-master");

//Table in database
define("_TB_MEMBER","member");
define("_TB_DEPARTMENT","department");
define("_TB_POSITION","position");
define("_TB_PERMISSION","permission");

define("_TB_CUSTOMER","customer");
define("_TB_ITEM","item");
define("_TB_ITEM_ACCESSORIES","item_accessories");
define("_TB_ITEM_IMAGE","item_image");

define("_TB_QUOTATION","quotation");
define("_TB_QUOTATION_ITEM","quotation_item");


define("_UPLOAD_FOLDER","uploads");
define("_IMG_PROFILE_PATH",_UPLOAD_FOLDER."/profile");
define("_IMG_ITEM_PATH",_UPLOAD_FOLDER."/items/images");
define("_PDF_ITEM_PATH",_UPLOAD_FOLDER."/items/pdf");



?>