<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category' => ['sometimes', 'required', 'exists:categories,slug'],
            'description' => ['string', 'required', 'max:255'],
            'condition' => ['nullable', 'string', 'max:255'],
            'images' => ['sometimes', 'array', 'max:6'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,gif'],
            'wishlist' => ['nullable', 'array', 'max:4'],
            'portfolio' => ['nullable', 'url'],
            'shoot_able' => ['sometimes', 'boolean'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
            'location' => ['nullable', 'string'],
            'publish' => ['sometimes', 'required', 'string']
        ];
    }
}
