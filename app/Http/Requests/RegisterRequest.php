<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam token string required The token sent to the user.
 * @bodyParam password string required The user password.
 * @bodyParam email string required The the user email,this is a unique field.
 */
class RegisterRequest extends FormRequest
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
        return [
            'referrer' => ['exists:users,referrer_token', 'nullable'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'min:8']
        ];
    }

    public function messages(): array
    {
        return ['referrer.exists' => 'Invalid referral code supplied'];
    }
}
