<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


/**
 * @bodyParam username string required The user username.
 * @bodyParam email string required The user email address.
 * @bodyParam phone string required The the user phone number.
 */
class GenerateOtpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            // 'username' => ['unique:users'],
            // 'phone' => ['unique:users'],
        ];
    }
}
