<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam description string required The shot description.
 * @bodyParam condition string The the shot or item condition.
 * @bodyParam images array The shot images.
 */

class StoreShotRequest extends FormRequest
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
            'description' => ['required', 'max:255'],
            'condition' => ['required', 'max:255'],
            'images' => ['required', 'array', 'max:6'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,gif'],
        ];
    }
}
