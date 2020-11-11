<?php

namespace Tests\Unit;

use App\Repositories\UserRepository;
use App\Services\UserService;
use App\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    //add user account test
    public function testSignUpUserAccount()
    {
        $userRepository = new UserRepository(new User());
        $userService = new UserService($userRepository);
        $create_account_dto = ["name" => "Test User Dieudonne", "email" => "test@test.com",
            "phone_number" => "67208967", "password" => Hash::make('test')];
        $user_account = $userService->saveUserAccount($create_account_dto);

        $this->assertInstanceOf(User::class, $user_account);
        $this->assertEquals($create_account_dto['name'], $user_account->name);
        $this->assertEquals($create_account_dto['email'], $user_account->email);
    }

    //update user account test
    public function testUpdateUserAccount()
    {
        $userRepository = new UserRepository(new User());
        $userService = new UserService($userRepository);
        $create_account_dto = ["name" => "Update User Dieudonne", "email" => "test@test.com",
            "phone_number" => "672088969"];
        $user_account = $userService->updateUserAccount($create_account_dto, 1);

        $this->assertEquals(1, $user_account); //means user account was updated
    }

    //can login into account test
    public function testLoginUserAccount()
    {
        $userRepository = new UserRepository(new User());
        $userService = new UserService($userRepository);
        $isValidLogin = $userService->isValidUsernamePassword('test@test.com', 'test');
        $this->assertEquals(true, $isValidLogin);
    }
}
