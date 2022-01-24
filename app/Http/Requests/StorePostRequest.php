<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam category integer required The post category ID.
 * @bodyParam description string required The post description.
 * @bodyParam condition string The the post or item condition.
 * @bodyParam images array The post images.
 * @bodyParam wishlist array The post wishlist.
 * @bodyParam portfolio url The user posting profile
 * @bodyParam shoot_able boolean this is to indicate users can shoot the post
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
            'condition' => ['sometimes', 'required', 'max:255'],
            'images' => ['sometimes', 'array', 'max:6'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,gif'],
            'wishlist' => ['sometimes', 'array', 'max:4'],
            'portfolio' => ['sometimes', 'url'],
            'shoot_able' => ['sometimes','boolean']
        ];
    }
}
