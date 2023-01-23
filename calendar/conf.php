<?php
// *** You should define PEC_PATH manually when use Apache alias directive or IIS virtual directory ***
define('PEC_PATH', str_replace(str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'])),'', str_replace('\\', '/',dirname(__FILE__))));
//============Generatl Settings
define('DEBUG',false);


//============DB Settings
define('PEC_DB_HOST','db4free.net:3307');
define('PEC_DB_USER','lawyers');
define('PEC_DB_PASS','love4india');
define('PEC_DB_TYPE','mysql');
define('PEC_DB_NAME','lawyerdb');
define('PEC_DB_CHARSET','');
/******** DO NOT MODIFY ***********/
require_once('pec.php');
/**********************************/
?>
