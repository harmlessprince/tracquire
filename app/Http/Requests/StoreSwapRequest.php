<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam post_id integer required The post id.
 * @bodyParam  username string The username of the user accepting poster item or swapping poster item.
 */

class StoreSwapRequest extends FormRequest
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
            'post_id' => ['required', 'integer', 'exists:posts,id'],
            'receiver_username' => ['required', 'string', 'exists:users,username'],
        ];
    }
}
