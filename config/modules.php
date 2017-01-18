<?php

/**
 * Register application modules
 */
$application->registerModules([

    'api'      => [
        'className' => 'Backend\Api\Module',
        'path'      => __DIR__ . '/../apps/modules/api/Module.php',
    ]

]);
