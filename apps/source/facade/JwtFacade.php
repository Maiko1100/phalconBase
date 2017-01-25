<?php

namespace Backend\Source\Facade;

use Phalcon\Mvc\User\Plugin;
use \Firebase\JWT\JWT;

class JwtFacade extends Plugin
{
    // source code: https://github.com/firebase/php-jwt

    Const JWT_KEY = "secret_key";

    public static function buildToken(){

        $token = array(
            "iss" => "phalconBase",
            "aud" => "app_user",
            "iat" => self::dateNow(),
            "nbf" => self::createExpireDate()
        );

        return self::encodeToken($token);
    }


    private function encodeToken($token){
        return JWT::encode($token, self::JWT_KEY);
    }

    public static function decodeToken($token){
        $decoded = JWT::decode($token, self::JWT_KEY, array('HS256'));

        return $decoded_array = (array) $decoded;
    }

    /**
     * @return false|string
     */
    private static function dateNow(){
        return date('Y-m-d H:i:s');
    }

    /**
     * @return false|string
     */
    private static function createExpireDate(){
        return date('Y-m-d H:i:s', strtotime('+1 week'));
    }






}
