<?php
namespace Backend\Api\Controllers;

use Backend\Source\Models\AppUser;
use Backend\Source\Models\Role;
use Backend\Source\Facade\TokenFacade;
use Backend\Source\Components\ResponseUtils;

class AuthController extends ControllerBase
{

    public function initialize()
    {
        // Disable the view to avoid rendering
        $this->view->disable();
    }


    /**
     * Function handle the registeration of a new user
     */
    public function registerAction()
    {
        $request = $this->request->getBasicAuth();

        $username = $request['username'];
        $password = $request['password'];

        $this->checkRequiredParameter($username, $password);

        if (AppUser::findFirstByemail_address($username)) {
            $this->responseUtil->sendError(ResponseUtils::STATUS_CONFLICT, "Emailaddress already registered");
        }

        $user = $this->registerAppUser($username, $password);

        if(!$user){
            $this->responseUtil->sendError(ResponseUtils::STATUS_INTERNAL_ERROR, "Error creating user");
        }

        $tokenFacade = new TokenFacade();
        $token = $tokenFacade->registerNewToken($user);

        $this->responseUtil->sendOk($token);

    }

    public function loginAction()
    {
        $request = $this->request->getBasicAuth();

        $username = $request['username'];
        $password = $request['password'];

        $this->checkRequiredParameter($username, $password);

        $user = AppUser::findFirstByemail_address($username);

        if (!$user) {
            $this->responseUtil->sendError(ResponseUtils::STATUS_NOT_FOUND, "User was not found");
        }
        $tokenFacade = new TokenFacade();
        $token = $tokenFacade->registerNewToken($user);

        $this->responseUtil->sendOk($token);

    }

    /**
     * Function to register an app user
     * @param $emailAddress
     * @param $password
     * @return AppUser|bool
     */
    private function registerAppUser($emailAddress, $password)
    {

        $user = new AppUser();
        $user->email_address = $emailAddress;
        $user->password = $this->security->hash($password);
        $user->role_id = Role::USER_APP;

        if (!$user->save()) {
            return false;
        }

        return $user;

    }

    private function checkRequiredParameter($emailAddress, $password)
    {
        if (empty($emailAddress) || empty($password)) {
            $this->responseUtil->sendResponse(ResponseUtils::STATUS_BAD_REQUEST, "Parameters not found");
        }
    }

}
