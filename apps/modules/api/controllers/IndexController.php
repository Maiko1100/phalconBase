<?php

namespace Backend\Api\Controllers;
use Backend\Source\Models\AppUser;
use Backend\Source\Components\ResponseUtils;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $users = AppUser::find();

        $this->responseUtil->sendResponse(ResponseUtils::STATUS_OK, $users->toArray());
    }

}

