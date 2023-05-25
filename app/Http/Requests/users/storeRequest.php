<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|unique:users,email|string',
            'password' => 'required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6',
        ];
    }
}
