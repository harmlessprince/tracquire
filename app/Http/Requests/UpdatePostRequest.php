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
            'category' => ['sometimes', 'required', 'exists:categories,slug'],
            'description' => ['string', 'required', 'max:255'],
            'condition' => ['nullable', 'string', 'max:255'],
            'images' => ['nullable', 'array', 'max:6'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,bmp', 'max:2048'],
            'wishlist' => ['nullable', 'array', 'max:4'],
            'portfolio' => ['nullable', 'url'],
            'shoot_able' => ['sometimes', 'boolean'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
            'location' => ['nullable', 'string'],
            'publish' => ['sometimes', 'required', 'string']
        ];
    }
    public function messages()
    {
        return [
            'images.*.image' => 'must be of type image',
            'images.*.mimes' => 'only jpg, jpeg, png and bmp images are allowed',
            'images.*.max' => 'Sorry! Maximum allowed size for an image is 2MB'
        ];
    }
}
