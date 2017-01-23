<?php
namespace Backend\Source\Models;

class AppUserToken extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $app_user_id;

    /**
     *
     * @var string
     */
    public $token;

    /**
     *
     * @var string
     */
    public $token_expire_date;



    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     *
     * @return User[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     *
     * @return User
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasOne('app_user_id', '\Backend\Source\Models\AppUser', 'app_user_id', ['alias' => 'User']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'app_user_token';
    }

}
