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
use App\Http\Requests\UpdateProfileRequest;
use App\Services\Interfaces\UtilityServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
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
        $login_dto = $request->getLoginDto();
        //authenticate user
        if (!$this->userService->isValidUsernamePassword($login_dto->email, $login_dto->password)) {
            return redirect()->back()->withErrors(['Invalid username/password combination']);
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
        $create_account_dto = $request->getUserDTO();
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
        $data['user'] = $this->utilityService->getCurrentLoggedUser();;
        return view("dashboard")->with($data);
    }

    public function showEditProfilePage()
    {
        if (!$this->utilityService->hasSessionValue('isLoggedIn')) {
            return redirect('login');
        }
        $data['user'] = $this->utilityService->getCurrentLoggedUser();
        return view("update_profile")->with($data);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        if (!$this->utilityService->hasSessionValue('isLoggedIn')) {
            return redirect('login');
        }
        $user = $this->utilityService->getCurrentLoggedUser();
        $update_account_dto = $request->getUserDto();
        //update profile
        $user_account = $this->userService->updateUserAccount($update_account_dto, $user->id);
        if ($user_account) {
            $request->session()->flash('message', 'User account updated successfully!');
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withErrors(['Unable to update profile details. Please try again']);
        }
    }

    public function deleteUserAccount()
    {
        //method level authentication
        if (!$this->utilityService->hasSessionValue('isLoggedIn')) {
            return redirect('login');
        }
        $user = $this->utilityService->getCurrentLoggedUser();
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
