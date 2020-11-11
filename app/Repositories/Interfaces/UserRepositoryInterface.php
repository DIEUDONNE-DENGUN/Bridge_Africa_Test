<?php
/**
 * User: Dieudonne Takougang
 * Date: 11/10/2020
 * @Description: Handle all user related communicated with database
 */

namespace App\Repositories\Interfaces;


interface UserRepositoryInterface
{
    public function create(array $user);

    public function findUserById($user_id);

    public function findUserByEmail($email);

    public function update(array $user, $user_id);

    public function getUserProducts($user_id);

    public function delete($user_id);
}