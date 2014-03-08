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
require 'core/libs/Smarty/Smarty.class.php';

$autoloader = new Loader();

//Configuring PHP Active Record Framework
require_once 'core/libs/phpactiverecord/ActiveRecord.php';

# must issue a "use" statement in your closure if passing variables
ActiveRecord\Config::initialize(function($cfg) use ($connections)
{
	$cfg->set_model_directory('app/model/');
	$cfg->set_connections($connections);

	# default connection is now production
	$cfg->set_default_connection(ENVIRONMENT);
});

//$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
//$entityManager = EntityManager::create($dbParams, $config);

//Call Controller Class
session_start();
$start = new System();
$start->run();
?>
