<?php
namespace Backend\Api\Controllers;


use Backend\Source\Components\ResponseUtils;
use Backend\Source\Models\User;

class UserController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $users = User::find();
        ResponseUtils::sendResponse(ResponseUtils::STATUS_OK, $users);


    }
}
