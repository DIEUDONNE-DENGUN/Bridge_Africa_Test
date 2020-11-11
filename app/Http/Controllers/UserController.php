<?php
/*
   @Author:Dieudonne Takougang
   @Date: 10/11/2020
   @Description: handle all user related actions
   *
   */

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Services\Interfaces\UtilityServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $userService;
    private $utilityService;

    public function __construct(UserServiceInterface $userService, UtilityServiceInterface $utilityService)
    {
        $this->userService = $userService;
        $this->utilityService = $utilityService;
    }

    public function showLoginPage()
    {
        //method level authentication
        if ($this->utilityService->hasSessionValue('isLoggedIn')) {
            return redirect('user/account');
        }
        return view('login');
    }

    //login user if username and password match
    public function login(LoginRequest $request)
    {
        $username = $request->get('email');
        $password = $request->get('password');
        //authenticate user
        if (!$this->userService->isValidUsernamePassword($username, $password)) {
            return redirect()->back()->withErrors(['Invalid Username/Passwowrd commbination']);
        }
        //login user into the system
        $this->utilityService->addSessionData("isLoggedIn", true);
        return redirect("user/account");
    }

    public function showSignUpPage()
    {
        //method level authentication
        if ($this->utilityService->hasSessionValue('isLoggedIn')) {
            return redirect('user/account');
        }
        return view('sign_up');
    }

    //create a new user account
    public function signUp(SignUpRequest $request)
    {
        $email = $request->get('email');
        $phone_number = $request->get('phone_number');
        $name = $request->get('name');
        $password = $request->get("password");
        $create_account_dto = ["name" => $name, "email" => $email,
            "phone_number" => $phone_number, "password" => Hash::make($password)
        ];
        //save user account details
        $user_account = $this->userService->saveUserAccount($create_account_dto);
        if ($user_account) {
            $request->session()->flash('message', 'User account created successfully!');
            return redirect("/login");
        } else {
            return redirect()->back()->withErrors(['Whoops!, an error was encountered!. Please refresh and try again']);
        }
    }

    public function showUserAccount()
    {
        //method level authentication
        if (!$this->utilityService->hasSessionValue('isLoggedIn')) {
            return redirect('login');
        }
        $user = Auth::user();
        $data['user'] = $user;
        return view("dashboard")->with($data);
    }

    public function deleteUserAccount()
    {
        //method level authentication
        if (!$this->utilityService->hasSessionValue('isLoggedIn')) {
            return redirect('login');
        }
        $user = Auth::user();
        //check if user has any products
        $user_products = $this->userService->getUserProducts($user->id);
        if (!$user_products->isEmpty()) {
            return redirect()->back()->withErrors(['Sorry! cannot drop account. Please consider deleting your products to delete account']);
        }

        //drop account
        $this->userService->deleteUserAccount($user->id);
        //clear all session data
        $this->utilityService->clearSession();
        session()->flash('message', 'User account deleted successfully!');
        return redirect('login');
    }

    public function logout()
    {
        if (!$this->utilityService->hasSessionValue('isLoggedIn')) {
            return redirect('login');
        }
        //clear all session data
        $this->utilityService->clearSession();
        session()->flash('message', 'logout of account successfully!');
        return redirect('login');
    }
}
