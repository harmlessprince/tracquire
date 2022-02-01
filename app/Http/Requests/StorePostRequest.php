<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam category string required The post category slug.
 * @bodyParam description string required The post description.
 * @bodyParam condition string The the post or item condition.
 * @bodyParam images array The post images.
 * @bodyParam wishlist array The post wishlist.
 * @bodyParam portfolio url The user posting profile
 * @bodyParam shoot_able boolean this is to indicate users can shoot the post
 * @bodyParam longitude float This is used to capture the user location longitude
 * @bodyParam latitude float  This is used to capture the user Location latitude
 * @bodyParam location string The post location.
 * @bodyParam publish string The is is used to state wether the post should be published. Example yes 
 */

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
            'condition' => ['nullable', 'string', 'max:255'],
            'images' => ['sometimes', 'array', 'max:6'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,gif'],
            'wishlist' => ['nullable', 'array', 'max:4'],
            'portfolio' => ['nullable', 'url'],
            'shoot_able' => ['sometimes','boolean'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
            'location' => ['nullable','string'],
            'publish' => ['required', 'string']
        ];
    }
}
