<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'category' => ['required', 'exists:categories,slug'],
            'description' => ['string', 'required', 'max:255'],
            'condition' => ['sometimes', 'required', 'max:255'],
            'images' => ['required', 'array', 'max:6'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,gif'],
            'wishlist' => ['sometimes', 'required', 'string'],
            'portfolio' => ['sometimes', 'url'],
            'shoot_able' => ['sometimes','boolean']
        ];
    }
}
