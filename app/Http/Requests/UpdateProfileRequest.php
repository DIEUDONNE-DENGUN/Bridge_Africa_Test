<?php

namespace App\Http\Requests;

use App\Dtos\UserDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ['name' => 'required', 'phone_number' => 'required'];
    }

    public function getUserDto()
    {
        $data = (array)new UserDTO($this->input('name'), '',
            $this->input('phone_number'), '');
        unset($data['email']);
        unset($data['password']);
        return $data;
    }
}
