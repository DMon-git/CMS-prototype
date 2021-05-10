<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCommentRequest extends FormRequest
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
            'id_post'   =>  'required|integer|min:0|max:99999',
            'comment'   =>  'required|String|min:3|max:255|regex:/^[a-zA-Z А-Яа-я ,.\-?]+$/ui',
        ];
    }
}
