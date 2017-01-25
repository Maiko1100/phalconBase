<?php
namespace Backend\Api\Controllers;

use Backend\Source\Models\AppUser;
use Backend\Source\Components\ResponseUtils;

class UserController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $users = AppUser::find();


        $this->responseUtil->sendResponse(ResponseUtils::STATUS_OK, $users);

    }

    /**
     * Index action
     */
    public function getAction()
    {
           $this->responseUtil->sendResponse(ResponseUtils::STATUS_OK, $this->appUser->export());
    }

}
