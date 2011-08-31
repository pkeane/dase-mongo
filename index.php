
<?php

//PHP ERROR REPORTING -- turn off for production
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

define('BASE_PATH',dirname(__FILE__));

include 'inc/bootstrap.php';

$r = new Dase_Http_Request();
$r->init($config);
$r->getHandlerObject()->dispatch($r);
