<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAddressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'post_code' => ['required', 'digits:7'],
            'address' => ['required'],
            'building' => ['nullable'],
        ];
    }
}
