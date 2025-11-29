<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListingItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'image_url' =>['required'],
            'category' => ['required'],
            'condition'=>['required'],
            'name' => ['required'],
            'brand' => ['required'],
            'description' => ['required'],
            'price' =>['required'],
            'status' =>['required'],
        ];
    }
}
