<?php
namespace Backend\Source\Models;

class AppUser extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $app_user_id;

    /**
     *
     * @var integer
     */
    public $role_id;

    /**
     *
     * @var string
     */
    public $first_name;

    /**
     *
     * @var string
     */
    public $last_name;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $email_address;

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

        $this->hasOne('role_id', '\Backend\Source\Models\Role', 'role_id', ['alias' => 'Role']);
        $this->hasOne('app_user_id', '\Backend\Source\Models\AppUserToken', 'app_user_id', ['alias' => 'Token']);
//        $this->hasMany('app_user_id', '\Backend\Source\Models\Device', 'app_user_id', ['alias' => 'Device']);
    }

    public function export(){
        $user = $this->toArray();
        unset($user['password']);

        return $user;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'app_user';
    }

}
