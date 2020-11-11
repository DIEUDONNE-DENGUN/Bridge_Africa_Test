<?php
/**
 * Author:Dieudonne Takougang
 * Date: 11/10/2020
 * Description: User service implementation
 */

namespace App\Services;


use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Facades\Auth;

class UserService implements UserServiceInterface
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->userRepository = $repository;
    }

    public function saveUserAccount(array $user)
    {
        return $this->userRepository->create($user);
    }

    public function findUserByID($user_id)
    {
        return $this->userRepository->findUserById($user_id);
    }

    public function emailExist($email)
    {
        $emailExist = $this->userRepository->findUserByEmail($email);
        return $emailExist->isEmpty() ? false : true;
    }

    public function getUserProducts($user_id)
    {
        return collect($this->userRepository->getUserProducts($user_id));
    }

    public function isValidUsernamePassword($username, $password)
    {
        $credentials = ["email" => $username, "password" => $password];
        return Auth::attempt($credentials) ? true : false;
    }

    public function updateUserAccount(array $user, $user_id)
    {
        return $this->userRepository->update($user, $user_id);
    }

    public function deleteUserAccount($user_id)
    {
        return $this->userRepository->delete($user_id);
    }

}