<?php

namespace Backend\Api;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\View;


class Module implements ModuleDefinitionInterface
{
    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Backend\Api\Controllers'   => __DIR__ . '/controllers/',
            'Backend\Source\Components' => APP_PATH . '/apps/source/components/',
            'Backend\Source\Models'     => APP_PATH . '/apps/source/models/',
            'Backend\Source\Forms'      => APP_PATH . '/apps/source/forms/',
            'Backend\Source\Facade'      => APP_PATH . '/apps/source/facade/',
        ]);

        $loader->register();
    }

    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        /**
         * Read configuration
         */

        if (file_exists(APP_PATH . "/apps/modules/api/config/config.local.php")) {
            $config = include APP_PATH . "/apps/modules/api/config/config.local.php";
        } else {
            $config = include APP_PATH . "/apps/modules/api/config/config.live.php";
        }
        // $config = include APP_PATH . "/apps/modules/api/config/config.local.php";


        /**
         * Setting up the view component
         */
        $di['view'] = function () {
            $view = new View();
            $view->setViewsDir(__DIR__ . '/views/');

            return $view;
        };

        /**
         * Database connection is created based in the parameters defined in the configuration file
         */
        $di['db'] = function () use ($config) {
            $config = $config->database->toArray();

            $dbAdapter = '\Phalcon\Db\Adapter\Pdo\\' . $config['adapter'];
            unset($config['adapter']);

            return new $dbAdapter($config);
        };
    }
}
