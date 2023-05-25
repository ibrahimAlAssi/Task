<?php

namespace App\Http\Requests\users;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // return [
        //     'name' => 'required|string',
        //     'email' => 'required|unique:users,email,' . $this->id . '|string',
        //     'password' => 'nullable|required_with:confirm_password|same:confirm_password',
        //     'confirm_password' => 'nullable|required_with:password|min:6',
        // ];
        $userId = $this->route('user'); // Get the id from paramter request
        return [
            'name' => 'required|string',
            'email' => [
                'required',
                'string',
                Rule::unique('users')->ignore($userId),
            ],
            'password' => 'nullable|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'nullable|required_with:password|min:6',
        ];
    }
}
