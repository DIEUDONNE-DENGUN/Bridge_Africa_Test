<?php
/**
 * Created by PhpStorm.
 * User: Dengun_Guru
 * Date: 11/17/2020
 * Time: 4:09 PM
 */

namespace App\Dtos;


class UserDTO
{
    public $name;
    public $email;
    public $phone_number;
    public $password;

    /**
     * UserDTO constructor.
     * @param $name
     * @param $email
     * @param $phone_number
     * @param $password
     */
    public function __construct($name, $email, $phone_number, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->password = $password;
    }
}