<?php

use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\ORM\EntityManager;

// replace with file to your own project bootstrap
require_once __DIR__.'/../bootstrap/app.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = $container->get(EntityManager::class);

$config = new PhpFile('migrations.php');

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));
