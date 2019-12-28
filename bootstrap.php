<?php
// bootstrap.php
use Doctrine\ORM\Mapping\UnderscoreNamingStrategy;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/Entity"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
$nameStrategy = new UnderscoreNamingStrategy();
$config->setNamingStrategy($nameStrategy);
// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
$conn = array(
    'driver' => 'pdo_mysql',
    'dbname' => 'dev',
    'user' => 'root',
    'password' => '123',
    'host' => 'db',
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);