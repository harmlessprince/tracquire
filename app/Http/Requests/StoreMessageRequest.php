<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


/**
 * @bodyParam receiver integer required The user receiving the message ID.
 * @bodyParam message string required The message been sent to the user.
 * @bodyParam data array  This will hold extra data later on(not needed for now).
 */

class StoreMessageRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'receiver' => ['required','exists:users,id'],
            'message' => ['required', 'string'],
            'data' => ['sometimes', 'required']
        ];
    }
}
