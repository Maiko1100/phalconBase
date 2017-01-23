<?php

namespace Backend\Api\Controllers;

use Backend\Source\Components\ResponseUtils;
use Phalcon\Mvc\Controller;
use Backend\Source\Facade\TokenFacade;

class ControllerBase extends Controller
{
    public function initialize()
    {
        // Disable the view to avoid rendering
        $this->view->disable();
        $this->authAppUser();
    }


    /**
     * Function to check if the token send by the user is expired.
     * If the token is expired the user can't use any of the other API calls
     *
     */
    private function authAppUser(){

        $token = $this->request->get("token");

        if(empty($token)){
            $this->responseUtil->sendResponse(ResponseUtils::STATUS_BAD_REQUEST, "No token send");
        }

        $tokenFacade = new TokenFacade();
        $tokenObject = $tokenFacade->checkToken($token);
        if(!$tokenObject) {
            $this->responseUtil->sendResponse(ResponseUtils::STATUS_UNAUTHORIZED, "Token expired or not found.");
        }

        $this->appUser = $tokenObject->getRelated('User');

    }
}
