<?php
/**
 * User: Dieudonne Takougang
 * Date: 11/10/202
 * Time: Implementation for user repository interface
 */

namespace App\Repositories;


use App\Repositories\Interfaces\UserRepositoryInterface;
use App\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $userModel;

    public function __construct(User $model)
    {
        $this->userModel = $model;
    }

    public function create(array $user)
    {
        return $this->userModel->create($user);
    }

    public function findUserById($user_id)
    {
        return $this->userModel->find($user_id);
    }

    public function findUserByEmail($email)
    {
        return $this->userModel->where('email', $email)->get();
    }

    public function update(array $user, $user_id)
    {
        return $this->userModel->find($user_id)->update($user);
    }

    public function getUserProducts($user_id)
    {
        return $this->userModel->find($user_id)->products;
    }

    public function delete($user_id)
    {
        return $this->userModel->find($user_id)->delete();
    }

}