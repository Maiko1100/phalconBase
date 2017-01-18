<?php

use Phalcon\Mvc\Application;

error_reporting(E_ALL);

define('APP_PATH', realpath('..'));
define('UPLOADS_PATH', realpath('uploads'));
//define('UPLOADS_URL',
//    'http' . ($_SERVER['HTTPS']) ? 's' : '' . '://' . $_SERVER['SERVER_NAME'] . DIRECTORY_SEPARATOR . 'uploads');

try {
//    include_once '../vendor/autoload.php';
    /**ßß
     */
    // $config = include APP_PATH . "/apps/modules/frontend/config/config.php";
    if (file_exists(APP_PATH . "/apps/modules/api/config/config.local.php")) {
        $config = include APP_PATH . "/apps/modules/api/config/config.local.php";
    } else {
        $config = include APP_PATH . "/apps/modules/api/config/config.live.php";
    }

    /**
     * Include services
     */
    require __DIR__ . '/../config/services.php';

    /**
     * Handle the request
     */
    $application = new Application($di);

    /**
     * Include modules
     */
    require __DIR__ . '/../config/modules.php';

    /**
     * Include routes
     */
    require __DIR__ . '/../config/routes.php';

    echo $application->handle()
        ->getContent();

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
