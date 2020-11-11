<?php
/**
 * Author: Dieudonne Takougang
 * Date: 11/10/2020
 * @Description: Handle all user business logic exposed as an interface
 */

namespace App\Services\Interfaces;


interface UserServiceInterface
{
    public function saveUserAccount(array $user);

    public function findUserByID($user_id);

    public function emailExist($email);

    public function getUserProducts($user_id);

    public function isValidUsernamePassword($username, $password);

    public function updateUserAccount(array $user, $user_id);

    public function deleteUserAccount($user_id);
}