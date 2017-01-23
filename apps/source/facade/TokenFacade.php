<?php

namespace Backend\Source\Facade;

use Phalcon\Mvc\User\Plugin;
use Backend\Source\Models\AppUserToken;

class TokenFacade extends Plugin
{

    function __construct()
    {
    }

        /**
     * Function to register an app user
     * @param $emailAddress
     * @param $password
     * @return AppUserToken|bool
     */
    public function registerNewToken($user){

        $token = new AppUserToken();
        $token->app_user_id = $user->app_user_id;
        $token->token = $this->security->getTokenKey();
        $token->token_expire_date = $this->createExpireDate();

        if(!$token->save()){
            return false;
        }

        return $token->token;

    }

    /**
     * @param $token
     * @return bool
     */
    public function checkToken($token){
        $tokenObject = AppUserToken::findFirstBytoken($token);

        if(!$tokenObject){
            return false;
        }

        if($tokenObject->token_expire_date <= $this->dateNow()){
            return false;
        }

        return true;

    }

    /**
     * @return false|string
     */
    public function dateNow(){
        return date('Y-m-d H:i:s');
    }

    /**
     * @return false|string
     */
    public function createExpireDate(){
        return date('Y-m-d H:i:s', strtotime('+1 week'));
    }

}
