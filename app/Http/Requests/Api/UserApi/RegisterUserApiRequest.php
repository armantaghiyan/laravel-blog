<?php

namespace App\Http\Requests\Api\UserApi;

use Arman\LaravelHelper\Api\WithApiValidator;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserApiRequest extends FormRequest
{
    use WithApiValidator;

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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:40'],
            'username' => ['required', 'unique:users,username', 'min:3', 'max:40'],
            'email' => ['required', 'email', 'unique:users,email', 'max:40'],
            'password' => ['required', 'min:6', 'max:40']
        ];
    }
}
