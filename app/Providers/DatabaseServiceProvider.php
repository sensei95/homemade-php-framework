<?php

namespace App\Providers;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class DatabaseServiceProvider extends \League\Container\ServiceProvider\AbstractServiceProvider
{

    public function provides(string $id): bool
    {
        $services = [
            EntityManager::class
        ];

        return in_array($id, $services, true);
    }

    public function register(): void
    {
        $container = $this->getContainer();
        $container->addShared(EntityManager::class, function (){
            // Create a simple "default" Doctrine ORM configuration for Annotations
            $isDevMode = true;

            $config = Setup::createAttributeMetadataConfiguration(array(__DIR__."/../Entities"), $isDevMode);

            // database configuration parameters
            $connectionParams = array(
                'driver'   => 'pdo_mysql',
                'user'     => 'root',
                'password' => 'root',
                'dbname'   => 'php_framework',
            );


            // obtaining the entity manager
            return  EntityManager::create($connectionParams, $config);
        });
    }
}