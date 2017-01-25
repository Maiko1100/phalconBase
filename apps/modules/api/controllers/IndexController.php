<?php

namespace Backend\Api\Controllers;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $user = $this->appUser;

        $this->responseUtil->sendOk($user->getRelated('Role'));
    }

}

