<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthValidation extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
        ];
    }

    public function messages() {
        return [
            'email.unique' => 'Failed! This email was taken from another user',
        ];
    }
}
