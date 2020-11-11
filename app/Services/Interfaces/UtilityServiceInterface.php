<?php
/**
 * User: Dieudonnne Takougang
 * Date: 9/28/2020
 */

namespace App\Services\Interfaces;


interface UtilityServiceInterface
{
    public function addSessionData($key, $data);

    public function getSessionDataByKey($key);

    public function hasSessionValue($key);

    public function forgetSessionByKey($key);

    public function clearSession();
}