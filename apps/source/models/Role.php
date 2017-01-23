<?php
namespace Backend\Source\Models;

class Role extends \Phalcon\Mvc\Model
{

    Const USER_APP = 1;
    Const USER_BANNED = 2;

    /**
     *
     * @var integer
     */
    public $role_id;

    /**
     *
     * @var string
     */
    public $title;


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
        $this->hasMany('role_id', '\Backend\Source\Models\AppUser', 'role_id', ['alias' => 'User']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'role';
    }

}
