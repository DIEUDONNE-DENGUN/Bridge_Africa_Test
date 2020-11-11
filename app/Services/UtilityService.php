<?php
/**
 * User: Dieudonne Takougang
 * @Description: handle general utility for application
 */

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\Interfaces\UtilityServiceInterface;
use Illuminate\Support\Facades\Auth;

class UtilityService implements UtilityServiceInterface
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function addSessionData($key, $data)
    {
        $this->request->session()->put($key, $data);
    }

    public function getSessionDataByKey($key)
    {
        return $this->request->session()->get($key);
    }

    public function hasSessionValue($key)
    {
        return $this->request->session()->has($key);
    }

    public function forgetSessionByKey($key)
    {
        $this->request->session()->forget($key);
    }

    public function clearSession()
    {
        $this->request->session()->flush();
    }

    public function getCurrentLoggedUser()
    {
        return Auth::user();
    }


}