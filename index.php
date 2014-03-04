<?php
/** Set Location Vars */
date_default_timezone_set('America/Sao_Paulo');
/*
 * This file is Index for framework
 */
//Require error handler 
require_once 'include/classes/ErrorHandler.php';
//Setting up error handler
set_error_handler("errorHandler");

//Include Controller
require_once 'core/config.php';
require_once 'core/system.php';
require_once 'core/controller.php';
require_once 'core/loader.php';

//Include Model
require_once 'core/classes/class.mysqli.php';
require_once 'core/model.php';

//Include Smarty Framework
require('core/libs/Smarty/Smarty.class.php');

$autoloader = new Loader();

// Setup ORM Doctrine Framework
require_once 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("/core/ORM");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => DB_DRIVER,
    'user'     => DB_USER,
    'password' => DB_PASSWORD,
    'dbname'   => DB_NAME,
);

//$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
//$entityManager = EntityManager::create($dbParams, $config);

//Call Controller Class
session_start();
$start = new System();
$start->run();

?>
