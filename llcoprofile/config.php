<?php
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
ob_start();
session_start();

define('DB_DRIVER', 'mysql');
define('DB_SERVER', 'localhost');

define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'spawn');
//define('DB_SERVER_USERNAME', 'dbadmin');
//define('DB_SERVER_PASSWORD', 'p9zzW@');
//define('DB_DATABASE', 'llcoprofile');

define('SITE_NAME','Labor Inspectors Profile Information');
define('PROJECT_NAME', 'LI Profile Info');
define('AUTHOR', 'Jeanette Guevarra');
define('COPYRIGHT',"Copyright &copy; " . date('Y') . " " . AUTHOR);
define('LOGIN','http://localhost/llcoprofile/loginform.php');
define('LLCO','http://localhost/llcoprofile/index_llco.php');
define('SITE_URL','http://localhost/llcoprofile/index_admin.php');

define('NCR_ADMIN','http://localhost/llcoprofile/index_ncr.php');
define('NCR_BWC_ADMIN','http://localhost/llcoprofile/index_ncr.admin.php');

define('CAR_ADMIN','http://localhost/llcoprofile/index_car.php');

define('RO1_ADMIN','http://localhost/llcoprofile/index_ro1.php');
define('RO1_BWC_ADMIN','http://localhost/llcoprofile/index_ro1.admin.php');

define('RO2_ADMIN','http://localhost/llcoprofile/index_ro2.php');
define('RO3_ADMIN','http://localhost/llcoprofile/index_ro3.php');

define('RO4A_ADMIN','http://localhost/llcoprofile/index_ro4a.php');
define('RO4A_BWC_ADMIN','http://localhost/llcoprofile/index_ro4a.admin.php');

define('RO4B_ADMIN','http://localhost/llcoprofile/index_ro4b.php');
define('RO5_ADMIN','http://localhost/llcoprofile/index_ro5.php');

define('RO6_ADMIN','http://localhost/llcoprofile/index_ro6.php');
define('RO6_BWC_ADMIN','http://localhost/llcoprofile/index_ro6.admin.php');

define('RO7_ADMIN','http://localhost/llcoprofile/index_ro7.php');
define('RO8_ADMIN','http://localhost/llcoprofile/index_ro8.php');

define('RO9_ADMIN','http://localhost/llcoprofile/index_ro9.php');
define('RO9_BWC_ADMIN','http://localhost/llcoprofile/index_ro9.admin.php');

define('RO10_ADMIN','http://localhost/llcoprofile/index_ro10.php');

define('RO11_ADMIN','http://localhost/llcoprofile/index_ro11.php');
define('RO11_BWC_ADMIN','http://localhost/llcoprofile/index_ro11.admin.php');

define('RO12_ADMIN','http://localhost/llcoprofile/index_ro12.php');
define('RO13_ADMIN','http://localhost/llcoprofile/index_ro13.php');

$dboptions = array(
              PDO::ATTR_PERSISTENT => FALSE,
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            );

try {
  $DB = new PDO(DB_DRIVER.':host='.DB_SERVER.';dbname='.DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD , $dboptions);  
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}

//get error/success messages
if ($_SESSION["errorType"] != "" && $_SESSION["errorMsg"] != "" ) {
    $ERROR_TYPE = $_SESSION["errorType"];
    $ERROR_MSG = $_SESSION["errorMsg"];
    $_SESSION["errorType"] = "";
    $_SESSION["errorMsg"] = "";
}
?>