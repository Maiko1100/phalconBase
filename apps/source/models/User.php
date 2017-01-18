<?php
namespace Backend\Source\Models;

class User extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $userId;

    /**
     *
     * @var string
     */
    public $role;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $email;

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
//        $this->hasMany('userId', '\Backend\Source\Models\Claimed', 'userId', ['alias' => 'Claimed']);
//        $this->hasMany('userId', '\Backend\Source\Models\Device', 'userId', ['alias' => 'Device']);
//        $this->hasMany('userId', '\Backend\Source\Models\Favoriteestablishment', 'userId',
//            ['alias' => 'Favoriteestablishment']);
//        $this->hasMany('userId', '\Backend\Source\Models\Usercompany', 'userId', ['alias' => 'Usercompany']);
//        $this->hasOne('role', '\Backend\Source\Models\Role', 'id', ['alias' => 'Role']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user';
    }

}
