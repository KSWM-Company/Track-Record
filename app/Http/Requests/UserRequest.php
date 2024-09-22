<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|string',
            // 'email'=>'required|email|unique:users',
            "password"=>"required|min:6",
            'confirmation_password' => 'required:password|same:password',
            // 'branch_id'=>'required|array',
            'role_id'=>'required',
            'date_of_birth'=>'required',
            'sex'=>'required',
        ];
    }
}
