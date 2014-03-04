<?php 
// bootstrap.php
require_once 'core/config.php';
require_once 'core/loader.php';

$autoloader = new Loader();

// Setup ORM Doctrine Framework
require_once 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("/app/entities/");
$isDevMode = true;

// database configuration parameters
$dbParams = array(
    'driver'   => DB_DRIVER,
    'user'     => DB_USER,
    'password' => DB_PASSWORD,
    'dbname'   => DB_NAME,
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

// bootstrap.php
// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);

// obtaining the entity manager
$entityManager = EntityManager::create($dbParams, $config);

?>