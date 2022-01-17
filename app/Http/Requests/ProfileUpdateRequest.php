<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @bodyParam last_name string  The user first name.
 * @bodyParam first_name string  The user last name.
 * @bodyParam phone string  The user phone number,this is a unique field.
 * @bodyParam username string  The user username ,and it must be unique.
 * @bodyParam latitude string  The user latitude coordinate.
 * @bodyParam longitude string  The user latitude coordinate.
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
            'latitude' => ['sometimes', 'required', 'numeric', 'between:-90,90'],
            'longitude' => ['sometimes', 'required', 'numeric', 'between:-180,180'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.max' => 'The first name can not be more than 30 characters',
            'last_name.max' => 'The last name can not be more than 30 characters',
            'latitude.between' => 'The latitude must be in range between -90 and 90',
            'longitude.between' => 'The longitude mus be in range between -180 and 180'
        ];
    }
}
