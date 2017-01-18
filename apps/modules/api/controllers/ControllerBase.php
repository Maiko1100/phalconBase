<?php

namespace Backend\Api\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {
        // Disable the view to avoid rendering
        $this->view->disable();
    }
}
