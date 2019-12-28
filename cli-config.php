<?php

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . "/boot.php";

$entityManager = $container->get(EntityManagerInterface::class);
return ConsoleRunner::createHelperSet($entityManager);

