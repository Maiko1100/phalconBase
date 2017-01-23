<?php

namespace Backend\Api\Controllers;
use Backend\Source\Models\AppUser;
use Backend\Source\Components\ResponseUtils;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $user = $this->appUser;

        $this->responseUtil->sendResponse(ResponseUtils::STATUS_OK, $user->getRelated('Role'));
    }

}

