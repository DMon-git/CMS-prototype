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
            'id'        =>  'required|integer|min:1|max:99999',
            'title'     =>  'required|String|min:3|max:255',
            'content'   =>  'required|String|min:3|max:1510',
            'publish'   =>  'required|integer|min:0|max:1',
        ];
    }
}
