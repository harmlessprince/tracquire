<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @bodyParam last_name string required The user first name.
 * @bodyParam first_name string required The user last name.
 * @bodyParam phone string required The the user phone number,this is a unique field.
 * @bodyParam username string required The the user username and it must be unique.
 */
class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        dd('kks');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => ['sometimes', 'max:30', 'required'],
            'last_name' => ['sometimes', 'max:30', 'required'],
            'phone' => ['sometimes', 'required', Rule::unique('users')->ignore($this->user->id ?? '')],
            'username' => ['sometimes', 'required', Rule::unique('users')->ignore($this->user->id ?? '')],
        ];
    }
}
